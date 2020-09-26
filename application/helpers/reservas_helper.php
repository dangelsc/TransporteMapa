<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function costo_total_reserva($id){
	$CI =& get_instance();
    $CI->load->model('reservas_model');

	$consulta	 = $CI->reservas_model->get_reserva($id);
	return $consulta[0]->monto_total;
}
function almacen_producto($id){
	$CI =& get_instance();
    $CI->load->model('reservas_model');

	$query = $CI->reservas_model->almacen_producto($id);
	return $query;
}
function detalle_reserva($producto_id, $reserva_id){
	$CI =& get_instance();
    $CI->load->model('reservas_model');
 	$query = $CI->reservas_model->detalle_reserva_producto($producto_id, $reserva_id);
	return $query;   
}
function detalle_producto($producto_id){
	$CI =& get_instance();
    $CI->load->model('productos_model');
 	$query = $CI->productos_model->listar_productos_id($producto_id);
 	$nombre = $query[0]->nombre;
 	$CI->load->model('productos_model');
 	$tipo = $CI->productos_model->select_tipo_id($query[0]->tipo_id);
 	$ntipo = $tipo[0]->nombre;
	return $nombre.': '.$ntipo;
}
function precio_unidad($producto_id, $tipo){
	$CI =& get_instance();
    $CI->load->model('productos_model');
 	$p = $CI->productos_model->listar_productos_id($producto_id);
 	if ($tipo == 'Normal') {
		$precio = $p[0]->precio_normal;
	}
	if ($tipo == 'Agencia') {
		$precio = $p[0]->precio_agencia;
	}
	if ($tipo == 'Tienda') {
		$precio = $p[0]->precio_tienda;
	}
 	
	return $precio;
}
function id_reserva($fecha, $cliente_id){
    $CI =& get_instance();
    $CI->load->model('reservas_model');
    $query = $CI->reservas_model->get_reserva_fecha_cliente($cliente_id, $fecha);
    return $query[0]->id;
}

function nombre_zona($id){
	$CI =& get_instance();
    $CI->load->model('zona_model');
    $query = $CI->zona_model->get_zona($id);
    return $query[0]->nombre;
}

function get_camion_id($placa){
	$CI =& get_instance();
    $CI->load->model('camiones_model');
    $query = $CI->camiones_model->get_camion_placa($placa);
    return $query[0]->id;
}
function get_reserva_id_camion($camion_id, $cliente_id){
	$CI =& get_instance();
    $CI->load->model('reservas_model');
    $query = $CI->reservas_model->get_reserva_id($camion_id, $cliente_id);
    return $query[0]->id;
}