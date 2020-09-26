<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function placa_asignacion_empleado($empleado_id){
	$CI =& get_instance();
    $CI->load->model('camiones_model');

	$asig = $CI->camiones_model->get_empleado_asignacion_empleado($empleado_id);
	$camion_id = $asig[0]->camion_id;

	$camion = $CI->camiones_model->get_camion($camion_id);
	return $camion[0]->placa;
}
function get_id_asignacion($empleado_id){
	$CI =& get_instance();
    $CI->load->model('camiones_model');

	$asig = $CI->camiones_model->get_empleado_asignacion_empleado($empleado_id);
	return $asig[0]->id;
}
function get_id_camion($empleado_id){
    $CI =& get_instance();
    $CI->load->model('camiones_model');

	$asig = $CI->camiones_model->get_empleado_asignacion_empleado($empleado_id);
	$camion_id = $asig[0]->camion_id;

	$camion = $CI->camiones_model->get_camion($camion_id);
	return $camion[0]->id;
}