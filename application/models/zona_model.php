<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zona_model extends CI_Model {

	function insert_zona($zona){
		$data = array('nombre' => $zona, );
		return $this->db->insert('zonas', $data);
	}
	function get_zonas(){
		$this->db->order_by("nombre", "asc");
		$query = $this->db->get('zonas');
		return $query->result();
	}
	function get_zona($id){
		$this->db->order_by("nombre", "asc");
		$this->db->where('id', $id);
		$query = $this->db->get('zonas');
		return $query->result();	
	}
}

/* End of file zona_model.php */
/* Location: ./application/models/zona_model.php */