<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleado_model extends CI_Model {

	function insert_empleado($ci, $nombre, $paterno, $materno, $direccion, $fono, $fecha, $email){
		$data = array(
			'ci' => $ci,
			'nombre'=>$nombre, 
			'paterno'=>$paterno,
			'materno'=>$materno,
			'direccion'=>$direccion,
			'fono'=>$fono,
			'fecha_nacimiento'=>$fecha,
			'email'=>$email,
			);
		$this->db->insert('empleados', $data);
		return $this->db->insert_id();
	}
	function update_empleado($id, $ci, $nombre, $paterno, $materno, $direccion, $fono, $fecha, $email){
		$data = array(
			'ci' => $ci,
			'nombre'=>$nombre, 
			'paterno'=>$paterno,
			'materno'=>$materno,
			'direccion'=>$direccion,
			'fono'=>$fono,
			'fecha_nacimiento'=>$fecha,
			'email'=>$email,
			);
		$this->db->where('id', $id);
		return $this->db->update('empleados', $data);
	}
	function get_empleado($id){
		$this->db->where('id', $id);
		$query = $this->db->get('empleados');
		return $query->result();
	}
	function get_empleados(){
		$query = $this->db->get('empleados');
		return $query->result();	
	}
	function buscar_empleado_ci($ci){
		$this->db->like('ci', $ci);
		$query = $this->db->get('empleados');
		return $query->result();
	}
	function empleados_asignados(){
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
	function empleados_asignados_usuario(){
		$this->db->where('usuario', FALSE);
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
	function empleados_sin_asignar(){
		$asig = $this->db->get('empleado_camion');
		$emp_id = array('0');
		foreach ($asig->result() as $fila) {
			$a = array($fila->empleado_id );
			$emp_id = array_merge($emp_id, $a);
		}
		
		$this->db->order_by("ci", "asc");
		$this->db->where_not_in('id', $emp_id);
		$query = $this->db->get('empleados');
		return $query->result();
	}
	function empleados_sin_asignar_ci($ci){
		$asig = $this->db->get('empleado_camion');
		$emp_id = array('0');
		foreach ($asig->result() as $fila) {
			$a = array($fila->empleado_id );
			$emp_id = array_merge($emp_id, $a);
		}
		
		$this->db->order_by("ci", "asc");
		$this->db->where_not_in('id', $emp_id);
		$this->db->like('ci', $ci);
		$query = $this->db->get('empleados');
		return $query->result();
	}
	function actualizar_empleado_camion_usuario($id_empleado){
		$dato = array('usuario' => True, );
		$this->db->where('empleado_id', $id_empleado);
		$this->db->update('empleado_camion', $dato);
	}

}

/* End of file empleado_model.php */
/* Location: ./application/models/empleado_model.php */