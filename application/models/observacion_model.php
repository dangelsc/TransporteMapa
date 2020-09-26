<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Observacion_model extends CI_Model {
	
	function insert_obs($cliente_id, $obs, $fecha){
		$data = array(
			'descripcion' => $obs,
			'fecha' => $fecha,
			'cliente_id'=>$cliente_id,
			 );
		return $this->db->insert('obs_cliente', $data);
	}
	function count_observaciones($id){
		$this->db->where('cliente_id', $id);
		$query = $this->db->get('obs_cliente');
		return $query->num_rows();
	}
	function obs_cliente($id){
		$this->db->where('cliente_id', $id);
		$query = $this->db->get('obs_cliente');
		return $query->result();
	}
}

/* End of file observacion_model.php */
/* Location: ./application/models/observacion_model.php */