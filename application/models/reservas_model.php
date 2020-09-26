<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas_model extends CI_Model {
	#estado = confirmacion de reservas=
	#confirmado = Reserva convertida en venta
	function buscar_clientes($ci, $tipo){
		$datestring = " %Y-%m-%d";
        $now = time() - 16300;
        $fecha =  mdate($datestring, $now);
		$this->db->where('estado', True);
		$this->db->where('confirmacion', False);
		$this->db->where('fecha_registro', $fecha);
		$rv = $this->db->get('reserva');

		$cliente_id = array('0');
		foreach ($rv->result() as $fila) {
			$a = array($fila->cliente_id );
			$cliente_id = array_merge($cliente_id, $a);
		}

		$this->db->where_not_in('id', $cliente_id);
		if($tipo != ''){
			$this->db->where('tipo', $tipo);
		}
		$this->db->order_by('ci', 'asc');
		$this->db->like('ci', $ci);
		$query = $this->db->get('cliente');
		return $query->result();
	}
	function almacen_producto($id){
		$this->db->where('productos_id', $id);
		$query = $this->db->get('almacen');
		return $query->result();
	}
	function create_reserva($fecha, $cliente_id){
		$data = array(
			'fecha_registro' => $fecha,
			'monto_total' => 0,
			'cliente_id' =>$cliente_id,
	 		);
		$query = $this->db->insert('reserva', $data);
		if($query){
			return $this->db->insert_id();
		}
		else{
			return False;
		}
	}
	function get_reserva($id){
		$this->db->where('id', $id);
		$query = $this->db->get('reserva');
		return $query->result();
	}
	function create_detalle($reserva_id, $productos_id, $cliente_id, $cantidad){
		$this->db->where('id', $cliente_id);
		$c = $this->db->get('cliente')->result();
		$tipo = $c[0]->tipo;
		
		$this->db->where('id', $productos_id);
		$p = $this->db->get('productos')->result();

		if ($tipo == 'Normal') {
			$precio = $p[0]->precio_normal;
		}
		if ($tipo == 'Agencia') {
			$precio = $p[0]->precio_agencia;
		}
		if ($tipo == 'Tienda') {
			$precio = $p[0]->precio_tienda;
		}
		$data = array(
			'producto_id' => $productos_id,
			'cantidad' => $cantidad,
			'monto' =>$cantidad * $precio,
			'reserva_id'=>$reserva_id,
		);
		$this->db->insert('detalle_reserva', $data);

		$this->db->where('id', $reserva_id);
		$r = $this->db->get('reserva')->result();
		$monto = $r[0]->monto_total;

		$reserva = array(
			'monto_total' => $monto + ($precio * $cantidad),
		);
		$this->db->where('id', $reserva_id);
		$this->db->update('reserva', $reserva);

		$this->db->where('productos_id', $productos_id);
		$almacen = $this->db->get('almacen')->result();

		$salida = $almacen[0]->salida;
		$stock = $almacen[0]->stock;

		$alm = array(
			'salida' =>$salida + $cantidad,
			'stock' =>$stock - $cantidad,
		);
		$this->db->where('productos_id', $productos_id);
		$this->db->update('almacen', $alm);

		return True;
	}
	function productos_a_reservar($id_reserva){
		$this->db->where('reserva_id', $id_reserva);
		$p = $this->db->get('detalle_reserva');
		$producto_id = array('0');
		foreach ($p->result() as $fila) {
			$a = array($fila->producto_id );
			$producto_id = array_merge($producto_id, $a);
		}
		$this->db->where_not_in('id', $producto_id);
		$query = $this->db->get('productos');
		return $query->result();
	}
	function productos_reservados($id_reserva){
		$this->db->where('reserva_id', $id_reserva);
		$p = $this->db->get('detalle_reserva');
		$producto_id = array('0');
		foreach ($p->result() as $fila) {
			$a = array($fila->producto_id );
			$producto_id = array_merge($producto_id, $a);
		}
		$this->db->where_in('id', $producto_id);
		$query = $this->db->get('productos');
		return $query->result();
	}
	function detalle_reserva_producto($producto_id, $reserva_id){
		$this->db->where('reserva_id', $reserva_id);
		$this->db->where('producto_id', $producto_id);
		$query = $this->db->get('detalle_reserva');
		return $query->result();
	}
	function cancelar_reserva($reserva_id){
		$this->db->where('reserva_id', $reserva_id);
		$detalle = $this->db->get('detalle_reserva')->result();
		foreach ($detalle as $d) {
			$producto_id = $d->producto_id;
			$cantidad = $d->cantidad;

			$this->db->where('productos_id', $producto_id);
			$almacen = $this->db->get('almacen')->result();
			$salida = $almacen[0]->salida;
			$stock = $almacen[0]->stock;

			$data = array(
				'salida' => $salida - $cantidad,
				'stock' => $stock + $cantidad,
			);
			$this->db->where('productos_id', $producto_id);
			$almacen = $this->db->update('almacen', $data);
		}
		$this->db->where('reserva_id', $reserva_id);
		$this->db->delete('detalle_reserva');

		$this->db->where('id', $reserva_id);
		$this->db->delete('reserva');
	}
	function confirmar_reserva($reserva_id){
		$data = array(
			'estado' => True,
		);
		$this->db->where('id', $reserva_id);
		return $this->db->update('reserva', $data);
	}
	function get_detalle_reserva($reserva_id){
		$this->db->where('reserva_id', $reserva_id);
		$query = $this->db->get('detalle_reserva');
		return $query->result();
	}
	function quitar_producto($reserva_id, $producto_id){
		$this->db->where('reserva_id', $reserva_id);
		$this->db->where('producto_id', $producto_id);
		$detalle = $this->db->get('detalle_reserva')->result();
		$cantidad =$detalle[0]->cantidad;
		$monto = $detalle[0]->monto;

		$this->db->where('productos_id', $producto_id);
		$almacen = $this->db->get('almacen')->result();
		$salida = $almacen[0]->salida;
		$stock = $almacen[0]->stock;

		$data = array(
			'salida' => $salida - $cantidad,
			'stock' => $stock + $cantidad,
		);
		$this->db->where('productos_id', $producto_id);
		$almacen = $this->db->update('almacen', $data);

		$this->db->where('id', $reserva_id);
		$reserva = $this->db->get('reserva')->result();
		$monto_total = $reserva[0]->monto_total;
		$data1 = array(
			'monto_total' =>$monto_total - $monto,
		);
		$this->db->where('id', $reserva_id);
		$this->db->update('reserva', $data1);


		$this->db->where('reserva_id', $reserva_id);
		$this->db->where('producto_id', $producto_id);
		$this->db->delete('detalle_reserva');

	}
	function get_detalle_reserva_id($detalle_id){
		$this->db->where('id', $detalle_id);
		$query = $this->db->get('detalle_reserva');
		return $query->result();
	}
	function clientes_con_reserva_confirmada($fecha){
		
		$this->db->where('estado', True);
		$this->db->where('confirmacion', False);
		$this->db->where('fecha_registro', $fecha);
		$rv = $this->db->get('reserva');

		$cliente_id = array('0');
		foreach ($rv->result() as $fila) {
			$a = array($fila->cliente_id );
			$cliente_id = array_merge($cliente_id, $a);
		}
		$this->db->where_in('id', $cliente_id);
		$cliente = $this->db->get('cliente');
		return $cliente->result();
	}
    function get_reserva_fecha_cliente($cliente_id, $fecha){
        /*$datestring = "%Y-%m-%d";
        $now = time() - 16300;
        $fecha =  mdate($datestring, $fecha);*/
		//$this->db->where('estado', True);
		//$this->db->where('confirmacion', False);
        $this->db->where('fecha_registro', $fecha);
        $this->db->where('cliente_id', $cliente_id);
        $query = $this->db->get('reserva');
        return $query->result();
    }
    function clientes_con_reserva_noconfirmada($fecha){
		
		$this->db->where('estado', False);
		$this->db->where('confirmacion', False);
		$this->db->where('fecha_registro', $fecha);
		$rv = $this->db->get('reserva');

		$cliente_id = array('0');
		foreach ($rv->result() as $fila) {
			$a = array($fila->cliente_id );
			$cliente_id = array_merge($cliente_id, $a);
		}
		$this->db->where_in('id', $cliente_id);
		$cliente = $this->db->get('cliente');
		return $cliente->result();
	}
    function create_venta_reserva($reserva_id, $fecha, $user_id, $hora){
    	$this->db->where('id', $reserva_id);
    	$reserva = $this->db->get('reserva')->result();
    	$data = array(
    		'fecha_venta' => $fecha,
    		'monto_total' => $reserva[0]->monto_total,
    		'cliente_id' => $reserva[0]->cliente_id,
    		'usuario_id' => $user_id,
    		'estado' => 1,
		);
    	$this->db->insert('ventas', $data);
    	$venta_id = $this->db->insert_id();
    	
    	$this->db->where('reserva_id', $reserva_id);
    	$detalle = $this->db->get('detalle_reserva')->result();
    	foreach ($detalle as $fila) {
    		$detalle = array(
    			'ventas_id' => $venta_id,
    			'productos_id'=>$fila->producto_id,
    			'cantidad'=>$fila->cantidad,
    			'precio_venta'=>$fila->monto,
			);
			$this->db->insert('detalle_venta', $detalle);
    	}
    	$data = array(
            'confirmacion' => True,
            'hora_entrega' => $hora,
        );
    	$this->db->where('id', $reserva_id);
    	$this->db->update('reserva', $data);
    	return $venta_id;
    }
    function get_asignacion($id){
    	$this->db->where('id', $id);
    	$query = $this->db->get('empleado_camion');
    	return $query->result();

    }
    function clientes_con_reserva($zona_id){
    	$this->db->where('zona_id', $zona_id);
    	$clientes = $this->db->get('cliente');

    	$cliente_id = array('0');
		foreach ($clientes->result() as $fila) {
			$a = array($fila->id );
			$cliente_id = array_merge($cliente_id, $a);
		}

		if ($zona_id != '') {
			$this->db->where_in('cliente_id', $cliente_id);
		}
    	$this->db->where('estado', True);
		$this->db->where('confirmacion', False);
		$this->db->where('asignado', False);
		$rv = $this->db->get('reserva');
		return $rv->result();
    }
    function save_asignacion_reserva($camion_id, $reserva_id, $fecha){
    	$data = array(
    		'asignado' =>True ,
		);
    	$this->db->where('id', $reserva_id);
    	$this->db->update('reserva', $data);

    	$data = array(
    		'camion_id' =>$camion_id,
    		'reserva_id'=>$reserva_id,
    		'fecha_asignacion'=>$fecha,
		);
		return $this->db->insert('camion_reserva', $data);
    }
    function camiones_con_reserva(){
    	//$this->db->where('Field / comparison', $Value);
    	$datestring = " %Y-%m-%d";
        $now = time() - 14400;
        $fecha =  mdate($datestring, $now);
        $this->db->where('fecha_asignacion', $fecha);
        $camion = $this->db->get('camion_reserva')->result();
        $camion_id = array('0');
        foreach ($camion as $fila) {
        	$a = array($fila->camion_id);
        	$camion_id = array_merge($camion_id, $a);
        }

        $this->db->where_in('camion_id', $camion_id);
    	$asig = $this->db->get('empleado_camion');
		$emp_id = array('0');
		foreach ($asig->result() as $fila) {
			$a = array($fila->empleado_id );
			$emp_id = array_merge($emp_id, $a);
		}
		
		$this->db->order_by("ci", "asc");
		$this->db->where_in('id', $emp_id);
		$query = $this->db->get('empleados');
		return $query->result();
    }
    function get_reserva_id($camion_id, $cliente_id){
    	$datestring = " %Y-%m-%d";
        $now = time() - 16300;
        $fecha =  mdate($datestring, $now);
        $this->db->where('fecha_asignacion', $fecha);
        $this->db->where('camion_id', $camion_id);
        $camion = $this->db->get('camion_reserva')->result();
        $reserva_id = array('0');
        foreach ($camion as $fila) {
        	$a = array($fila->reserva_id);
        	$reserva_id = array_merge($reserva_id, $a);
        }

        $this->db->where_in('id', $reserva_id);
    	$this->db->where('estado', True);
		$this->db->where('confirmacion', False);
		$this->db->where('cliente_id', $cliente_id);
		$rv = $this->db->get('reserva');
		return $rv->result();
    }
    function reserva_camiones_asignados($camion_id){
    	$datestring = " %Y-%m-%d";
        $now = time() - 16300;
        $fecha =  mdate($datestring, $now);
        $this->db->where('fecha_asignacion', $fecha);
        $this->db->where('camion_id', $camion_id);
        $camion = $this->db->get('camion_reserva')->result();
        $reserva_id = array('0');
        foreach ($camion as $fila) {
        	$a = array($fila->reserva_id);
        	$reserva_id = array_merge($reserva_id, $a);
        }

        $this->db->where_in('id', $reserva_id);
    	$this->db->where('estado', True);
		$this->db->where('confirmacion', False);
		//$this->db->where('fecha_registro', $fecha);
		$rv = $this->db->get('reserva');

		$cliente_id = array('0');
		foreach ($rv->result() as $fila) {
			$a = array($fila->cliente_id );
			$cliente_id = array_merge($cliente_id, $a);
		}
		$this->db->where_in('id', $cliente_id);
		$cliente = $this->db->get('cliente');
		return $cliente->result();
    }
    function reservas_pasadas($fecha){
		#$this->db->where('estado', False);
		$this->db->where('confirmacion', False);
		$this->db->where('fecha_registro <', $fecha);
		$rv = $this->db->get('reserva');
		return $rv->result();
	}
    function reservas_camion($camion_id, $fecha){
        $this->db->where('camion_id', $camion_id);
        $this->db->where('fecha_asignacion', $fecha);
        $asig = $this->db->get('camion_reserva');
        $reserva_id = array('0');
        foreach($asig->result() as $fila){
            $a = array($fila->reserva_id);
            $reserva_id = array_merge($reserva_id, $a);
        }
        $this->db->where_in('id', $reserva_id);
        $query = $this->db->get('reserva');
        return $query->result();
    }
	function mis_reservas_cliente($cliente_id){
		$this->db->where('cliente_id', $cliente_id);
		$query = $this->db->get('reserva');
		return $query->result();
	}
}

/* End of file reservas_model.php */
/* Location: ./application/models/reservas_model.php */