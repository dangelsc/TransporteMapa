<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camiones_model extends CI_Model {

	function insert_camion($placa, $desc, $fecha){
		$data = array(
			'placa' => $placa,
			'descripcion' => $desc,
			'fecha_registro'=>$fecha,
		 );
		$this->db->insert('camion', $data);
		return $this->db->insert_id();
	}
	function get_camion($id){
		$this->db->where('id', $id);
		$query = $this->db->get('camion');
		return $query->result();
	}
	function get_camiones(){
		$query = $this->db->get('camion');
		return $query->result();
	}
	function update_camion($id, $placa, $desc){
		$data = array(
			'placa' => $placa,
			'descripcion' => $desc,
		 );
		$this->db->where('id', $id);
		return $this->db->update('camion', $data);
	}
	function buscar_camion($placa){
		$this->db->like('placa', $placa);
		$query = $this->db->get('camion');
		return $query->result();
	}
	function save_asignacion($empleado_id, $camion_id, $fecha){
		$data = array(
			'empleado_id' =>$empleado_id ,
			'camion_id' => $camion_id,
			'fecha_asignacion' => $fecha,
			);
		return $this->db->insert('empleado_camion', $data);

	}
	function camiones_asignados(){
		$asig = $this->db->get('empleado_camion');
		$camion_id = array('0');
		foreach ($asig->result() as $fila) {
			$a = array($fila->camion_id );
			$camion_id = array_merge($camion_id, $a);
		}
		$this->db->where_in('id', $camion_id);
		$query = $this->db->get('camion');
		return $query->result();
	}
	function camiones_sin_asignados(){
		$asig = $this->db->get('empleado_camion');
		$camion_id = array('0');
		foreach ($asig->result() as $fila) {
			$a = array($fila->camion_id );
			$camion_id = array_merge($camion_id, $a);
		}
		$this->db->where_not_in('id', $camion_id);
		$query = $this->db->get('camion');
		return $query->result();
	}
	function camiones_sin_asignados_placa($placa){
		$asig = $this->db->get('empleado_camion');
		$camion_id = array('0');
		foreach ($asig->result() as $fila) {
			$a = array($fila->camion_id );
			$camion_id = array_merge($camion_id, $a);
		}
		$this->db->where_not_in('id', $camion_id);
		$this->db->like('placa', $placa);
		$query = $this->db->get('camion');
		return $query->result();
	}
	function get_empleado_asignacion_empleado($empleado_id){
		$this->db->where('empleado_id', $empleado_id);
		$query = $this->db->get('empleado_camion');
		return $query->result();
	}
	function terminar_asignacion($id){
		$this->db->where('id', $id);
		return $this->db->delete('empleado_camion');
	}
	function get_camion_placa($placa){
		$this->db->where('placa', $placa);
		$query = $this->db->get('camion');
		return $query->result();
	}
}

/* End of file camiones_model.php */
/* Location: ./application/models/camiones_model.php */