<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	function insert_cliente($ci, $nombre, $paterno, $materno, $direccion, $fono, $fecha, $tipo, $email, $latitud, $longitud, $zona){
		$data = array(
			'ci' => $ci,
			'nombre'=>$nombre, 
			'paterno'=>$paterno,
			'materno'=>$materno,
			'direccion'=>$direccion,
			'fono'=>$fono,
			'fecha'=>$fecha,
			'email'=>$email,
			'tipo'=>$tipo,
			'latitud'=>$latitud,
			'longitud'=>$longitud,
			'zona_id'=>$zona,
			);
		$this->db->insert('cliente', $data);
		return $this->db->insert_id();
	}

	function update_cliente($id, $ci, $nombre, $paterno, $materno, $direccion, $fono, $fecha, $tipo, $email, $latitud, $longitud, $zona){
		$data = array(
			'ci' => $ci,
			'nombre'=>$nombre, 
			'paterno'=>$paterno,
			'materno'=>$materno,
			'direccion'=>$direccion,
			'fono'=>$fono,
			'fecha'=>$fecha,
			'email'=>$email,
			'tipo'=>$tipo,
			'latitud'=>$latitud,
			'longitud'=>$longitud,
			'zona_id'=>$zona,
			);
		$this->db->where('id', $id);
		return $this->db->update('cliente', $data);
	}
	
	function get_cliente($id){
		$this->db->where("id",$id);
		$query = $this->db->get('cliente');
		return $query->result();
	}

	function get_clientes(){
		$this->db->order_by("ci", "asc");
		$query = $this->db->get('cliente');
		return $query->result();
	}
	function get_where_clientes($tipo){
		$this->db->order_by("ci", "asc"); 
		$this->db->where('tipo', $tipo);
		$query = $this->db->get('cliente');
		return $query->result();
	}
	function clientes_observaciones(){
		$obs = $this->db->get('obs_cliente');
		$cliente_id = array('0');
		foreach ($obs->result() as $fila) {
			$a = array($fila->cliente_id );
			$cliente_id = array_merge($cliente_id, $a);
		}
		
		$this->db->order_by("ci", "asc");
		$this->db->where_in('id', $cliente_id);
		$query = $this->db->get('cliente');
		return $query->result();
	}
	function bloquear_cliente($id){
		$data = array(
			'activo' => False,
			);
		$this->db->where('id', $id);
		return $this->db->update('cliente', $data);
	}
	function desbloquear_cliente($id){
		$data = array(
			'activo' => True,
			);
		$this->db->where('id', $id);
		return $this->db->update('cliente', $data);
	}
	function cantidad_ventas_clientes(){
		$select =   array(
				'cliente.ci',
                'cliente.id',
                'cliente.paterno',
                'cliente.materno',
                'cliente.nombre',
                'COUNT(ventas.id) as cantidad'
            );  
		$this->db->select($select);
	    $this->db->from('cliente');
	    $this->db->join('ventas','ventas.cliente_id = cliente.id','left');
	    $this->db->group_by('cliente.id');
	    $query = $this->db->get();
	    #return $this->db->result();
	    return $query->result();
	}
	function clientes_no_usuario(){
		$select =   array(
				'cliente.ci',
                'cliente.id',
                'cliente.paterno',
                'cliente.materno',
                'cliente.nombre',
                'COUNT(ventas.id) as cantidad',
            	'cliente.usuario'
            );
		$this->db->where('cliente.usuario', False);
		$this->db->select($select);
	    $this->db->from('cliente');
	    $this->db->join('ventas','ventas.cliente_id = cliente.id','left');
	    $this->db->group_by('cliente.id');
	    $query = $this->db->get();
	    #return $this->db->result();
	    return $query->result();
	}

}

/* End of file cliente_model.php */
/* Location: ./application/models/cliente_model.php */
