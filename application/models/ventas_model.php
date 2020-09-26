<?php
class Ventas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function listar_productos()
    {
        $query=$this->db->get('productos');
        return $query->result();
    }
    function listar_productos_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('productos');
        return $query->result();
    }
    function listar_productos_almacen($id)
    {
        $this->db->select('almacen.id as almacen_id');
        $this->db->select('almacen.entrada as entrada');
        $this->db->select('almacen.salida as salida');
        $this->db->select('almacen.stock as stock');
        $this->db->select('productos.id as prod_id');
        $this->db->select('productos.nombre as pro_nombre');
        $this->db->select('productos.avatar as foto');
        $this->db->select('productos.contenido as contenido');
        $this->db->select('productos.retornable as retornable');
        $this->db->select('productos.tipo_id as tipo_id');
        $this->db->from('almacen');
        $this->db->join('productos','productos.id=almacen.productos_id');
        $this->db->where('almacen.productos_id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[]=$fila;
            }
            return $data;
        }
        else
        {
            return false;
        }
    }
    function create_venta($fecha, $cliente_id, $user_id)
    {
        $data = array(
            'fecha_venta' => $fecha,
            'monto_total' => 0,
            'cliente_id' =>$cliente_id,
            'usuario_id'=>$user_id
        );
        $query = $this->db->insert('ventas', $data);
        if($query)
        {
            return $this->db->insert_id();
        }
        else{
            return False;
        }
    }
    function buscar_clientes($ci, $tipo){
        $datestring = " %Y-%m-%d";
        $now = time() - 16300;
        $fecha =  mdate($datestring, $now);
        $this->db->where('estado', True);
        $this->db->where('fecha_venta', $fecha);
        $rv = $this->db->get('ventas');

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
    function get_venta($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('ventas');
        return $query->result();
    }
    function eliminar_venta($ventas_id)
    {
        $this->db->where('id', $ventas_id);
        return $this->db->delete('ventas');
    }
    function get_stock($id)
    {
        $this->db->where('productos_id', $id);
        $query = $this->db->get('almacen');
        return $query->result();
    }
    function cantidad_stock($id)
    {
        $this->db->where('productos_id',$id);
        $query=$this->db->get('almacen');
        return $query->result();
    }
    function monto_total($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('ventas');
        return $query->result();
    }
    function update_venta($v_id,$p_id,$cantidad,$precio_venta,$stock_actual,$nuevo_monto,$salida)
    {
        $data = array(
            'ventas_id' => $v_id,
            'productos_id' => $p_id,
            'cantidad' =>$cantidad,
            'precio_venta'=>$precio_venta,
        );
        $insertar = $this->db->insert('detalle_venta', $data);
        if($insertar)
        {
            $dato = array(
                'monto_total' => $nuevo_monto,
                'estado'=>true
            );
            $this->db->where('id', $v_id);
            $update_venta=$this->db->update('ventas',$dato);
            if($update_venta)
            {
                $dato1 = array(
                    'stock' => $stock_actual,
                    'salida' => $salida
                );
                $this->db->where('productos_id', $p_id);
                return $this->db->update('almacen',$dato1);
            }
            else
            {
                return false;
            }
        }
        else{
            return False;
        }

    }
    function insertar_detalle_botellas($v_id, $botellas_sanas, $botellas_rotas, $cantidad, $impote_botellas,$p_id)
    {
        $data = array(
            'ventas_id' => $v_id,
            'productos_id' => $p_id,
            'botellas_sanas' => $botellas_sanas,
            'botellas_rotas' => $botellas_rotas,
            'total_botellas'=> $cantidad,
            'importe'=> $impote_botellas
        );
        return $this->db->insert('detalle_botellas', $data);
    }
    function update_venta_botellas($v_id,$nuevo_monto)
    {
            $dato = array(
                'monto_total' => $nuevo_monto
            );
            $this->db->where('id', $v_id);
            return $this->db->update('ventas',$dato);
    }
    function listar_botella_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('detalle_botellas');
        return $query->result();

    }
    function listar_detalle($ventas_id)
    {
        $this->db->where('ventas_id',$ventas_id);
        $query=$this->db->get('detalle_venta');
        return $query->result();
    }
    function listar_botellas($ventas_id)
    {
        $this->db->where('ventas_id',$ventas_id);
        $query=$this->db->get('detalle_botellas');
        return $query->result();
    }
    function get_detalle_producto($producto_id)
    {
        $this->db->where('id', $producto_id);
        $query = $this->db->get('productos');
        return $query->result();
    }
    function get_tipo($tipo_id)
    {

        $this->db->where('id', $tipo_id);
        $query = $this->db->get('tipo');
        return $query->result();
    }
    function productos_no_venta($venta_id)
    {
        $this->db->where('ventas_id',$venta_id);
        $per=$this->db->get('detalle_venta');
        $per_id= array('0');
        foreach ($per->result() as $fila)
        {
            $a = array($fila->productos_id);
            $per_id = array_merge($per_id, $a);
        }
        $this->db->where_not_in('id', $per_id);
        $query = $this->db->get('productos');
        return $query->result();

    }
    function listar_detalle_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('detalle_venta');
        return $query->result();
    }
    function borrar_venta($ventas_id,$producto_id,$stock_actual,$nuevo_monto,$salida,$id_detalle)
    {
        $this->db->where('id', $id_detalle);
        $delete =  $this->db->delete('detalle_venta');
        if($delete)
        {
            $dato = array(
                'monto_total' => $nuevo_monto
            );
            $this->db->where('id', $ventas_id);
            $update_venta=$this->db->update('ventas',$dato);
            if($update_venta)
            {
                $dato1 = array(
                    'stock' => $stock_actual,
                    'salida' => $salida
                );
                $this->db->where('productos_id', $producto_id);
                return $this->db->update('almacen',$dato1);
            }
            else
            {
                return false;
            }
        }
        else{
            return False;
        }
    }
    function borrar_botella($id, $ventas_id,$nuevo_monto)
    {
        $this->db->where('id',$id);
        $detele = $this->db->delete('detalle_botellas');
        if($detele)
        {
            $dato = array(
                'monto_total' => $nuevo_monto
            );
            $this->db->where('id', $ventas_id);
            return $this->db->update('ventas',$dato);
        }
        else
        {
            return false;
        }
    }
    function banear_venta($ventas_id)
    {
        $dato = array(
            'estado' => True,
        );
        $this->db->where('id', $ventas_id);
        return $this->db->update('ventas',$dato);
    }
    function get_fecha($ventas_id)
    {
        $this->db->where('id', $ventas_id);
        $query = $this->db->get('ventas');
        return $query->result();
    }
    function clientes_con_ventas_confirmada($fecha){

        $this->db->where('estado', True);
        $this->db->where('fecha_venta', $fecha);
        $rv = $this->db->get('ventas');
        $cliente_id = array('0');
        foreach ($rv->result() as $fila) {
            $a = array($fila->cliente_id );
            $cliente_id = array_merge($cliente_id, $a);
        }
        $this->db->where_in('id', $cliente_id);
        $cliente = $this->db->get('cliente');
        return $cliente->result();
    }
    function clientes_con_ventas_noconfirmada($fecha){

        $this->db->where('estado', False);
        $this->db->where('fecha_venta', $fecha);
        $rv = $this->db->get('ventas');

        $cliente_id = array('0');
        foreach ($rv->result() as $fila) {
            $a = array($fila->cliente_id );
            $cliente_id = array_merge($cliente_id, $a);
        }
        $this->db->where_in('id', $cliente_id);
        $cliente = $this->db->get('cliente');
        return $cliente->result();
    }
    function get_ventas_fecha_cliente($cliente_id, $fecha){
        $this->db->where('fecha_venta', $fecha);
        $this->db->where('cliente_id', $cliente_id);
        $query = $this->db->get('ventas');
        return $query->result();
    }
    function cancelar_venta($ventas_id)
    {
        $this->db->where('ventas_id', $ventas_id);
        $detalle = $this->db->get('detalle_venta')->result();
        foreach ($detalle as $d) {
            $producto_id = $d->productos_id;
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
        $this->db->where('ventas_id', $ventas_id);
        $this->db->delete('detalle_venta');
        $this->db->where('ventas_id', $ventas_id);
        $this->db->delete('detalle_botellas');
        $this->db->where('id', $ventas_id);
        $this->db->delete('ventas');
    }
    function ventas_cliente($id_cliente){
        $this->db->where('cliente_id', $id_cliente);
        #$query = $this->db->select('SELECT COUNT(*) FROM ventas');
        $query = $this->db->get('ventas');
        return $query->result();
    }
    function ventas_fecha($fecha){
        $this->db->where('fecha_venta', $fecha);
        $query = $this->db->get('ventas');
        return $query->result();
    }
    function ventas_mes($ano,$mes){
        $mes_ano=$ano.'-'.$mes;
        $this->db->like('fecha_venta',$mes_ano);
        $query = $this->db->get('ventas');
        return $query->result();
    }
    function ventas_ano($ano)
    {
        $this->db->like('fecha_venta',$ano);
        $query = $this->db->get('ventas');
        return $query->result();
    }
    function ventas_entre_fechas($fechauno,$fechados)
    {
        $this->db->where('fecha_venta >=',$fechauno);
        $this->db->where('fecha_venta <=',$fechados);
        $query = $this->db->get('ventas');
        return $query->result();

    }

}
?>