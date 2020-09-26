<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posiciones_model extends CI_Model {

	function save_position($latitud, $longitud, $camion_id, $fecha, $hora){
		$data = array(
			'latitud' => $latitud,
			'longitud' => $longitud,
			'fecha' => $fecha,
			'hora' => $hora,
			'camion_id' => $camion_id, 
			);
		return $this->db->insert('posiciones', $data);
	}
	function get_ubicaciones_camion($camion_id, $fecha){
		$this->db->where('camion_id', $camion_id);
		$this->db->where('fecha', $fecha);
		$query = $this->db->get('posiciones');
		return $query->result();
	}
	function position_actual_camion($camion_id){
        $datestring = " %Y-%m-%d";
        $now = time() - 14400;
        $fecha =  mdate($datestring, $now);
        $this->db->where('fecha', $fecha);
        $this->db->where('camion_id', $camion_id);
        $this->db->select_max('id');
        $query = $this->db->get('posiciones');
        foreach ($query->result() as $fila) {
        	$id = $fila->id;
        }
        
        $this->db->where('id', $id);
        $position = $this->db->get('posiciones');
        return $position->result();
    }
}