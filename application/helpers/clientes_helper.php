<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function count_obs($id){
	$CI =& get_instance();
    $CI->load->model('observacion_model');

	return $CI->observacion_model->count_observaciones($id);
}
function nombre_cliente($id){
	$CI =& get_instance();
    $CI->load->model('cliente_model');
    $consulta = $CI->cliente_model->get_cliente($id);
    $nombre = $consulta[0]->nombre .' '.$consulta[0]->paterno .' '.$consulta[0]->materno;
	return $nombre;
}
function ci_cliente($id){
	$CI =& get_instance();
    $CI->load->model('cliente_model');
    $consulta = $CI->cliente_model->get_cliente($id);
    $ci = $consulta[0]->ci;
	return $ci;
}
function tipo_cliente($id){
    $CI =& get_instance();
    $CI->load->model('cliente_model');
    $consulta = $CI->cliente_model->get_cliente($id);
    $tipo = $consulta[0]->tipo;
    return $tipo;
}