<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posiciones extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('posiciones_model');
    }
	function save_position(){
		$latitud = $this->input->get('latitud');
		$longitud = $this->input->get('longitud');
		$camion_id = $this->input->get('camion_id');
		$now = time() - 14400;
        $fecha =  mdate($datestring, $now);
        $datestring = " %Y-%m-%d";
        $fecha =  mdate($datestring, $now);
        $hora = mdate($datestring, $now);
    	$insert = $this->posiciones_model->save_position($latitud, $longitud, $camion_id, $fecha, $hora);
    	if($insert){
    		echo 'si';
    	}
    	else{
    		echo "no";
    	}
	}
}