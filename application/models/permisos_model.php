<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos_model extends CI_Model {

	function permiso_get($nombre){
		$this->db->where('nombre', $nombre);
		$permiso = $this->db->get('permisos')->result();

	}

}

/* End of file permisos_model.php */
/* Location: ./application/models/permisos_model.php */