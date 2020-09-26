<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horarios_model extends CI_Model {
	public function sumar_horas($hora1, $hora2){
        $dateh = "%h";
        $datem = "%i";
        $date_s = "%s";
        $h1 = mdate($dateh, $hora1);
        $h2 = mdate($dateh, $hora2);
        $m1 = mdate($datem, $hora1);
        $m2 = mdate($datem, $hora2);

        $h = $h1 + $h2;
        $m = $m1 + $m2;
        if($m >= 60){
        	$m -= 60;
        	$h += 1;
        }
        return $h.':'.$m.'00';
	}
	function insert_horario($fecha, $hora, $camion_id){
		$data = array(
			'fecha' => $fecha,
			'salida' => $hora,
			'camion_id' => $camion_id,
			);
		return $this->db->insert('horario', $data);
	}
	function get_horario($camion_id, $fecha){
		$this->db->where('fecha', $fecha);
		#$this->db->where('estado', False);
		$this->db->where('camion_id', $camion_id);
		$query = $this->db->get('horario');
		return $query->result();
	}
    function llegada_horario($horario_id, $llegada){
        $this->db->where('id', $horario_id);
        $query = $this->db->get('horario');
        $horario = $query->result();

        $hora1 = $llegada;
        $hora2 = $horario[0]->salida;
        $h1 = substr($hora1, 0, 2);
        $h2 = substr($hora2, 0, 2);
        $m1 = substr($hora1, 3, 2);
        $m2 = substr($hora2, 3, 2);
        $s1 = substr($hora1, 6, 2);
        $s2 = substr($hora2, 6, 2);

        $h = (int)$h1 - (int)$h2;
        $m = (int)$m1 - (int)$m2;
        $s = (int)$s1 - (int)$s2;
        $hora = '';
        $min = '';
        $seg = '';
        if($s < 0){
        	$s += 60;
        	$m -= 1;
        }
        if($m < 0){
        	$m += 60;
        	$h -= 1;
        }
        if($h < 10){
        	$hora = '0'.(string)$h;	
        }
        else{
        	$hora = (string)$h;
        }
        if($m < 10){
        	$min = '0'.(string)$m;
        }
        else{
        	$min = (string)$m;
        }
        if($s < 10){
        	$seg = '0'.(string)$s;
        }
        else{
        	$seg = (string)$s;
        }
        $total_horas = $hora.':'.$min.':'.$seg;
		$data = array(
			'estado' => True,
			'llegada'=> $llegada,
			'total_horas' => $total_horas,
		);
		$this->db->where('id', $horario_id);
		return $this->db->update('horario', $data);
	}
    function horarios_camion($id_camion){
        $this->db->where('camion_id', $id_camion);
        $query = $this->db->get('horario');
        return $query->result();
    }
}

/* End of file horarios_model.php */
/* Location: ./application/models/horarios_model.php */