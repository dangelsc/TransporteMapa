<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function costo_total_venta($id){
    $CI =& get_instance();
    $CI->load->model('ventas_model');
    $consulta = $CI->ventas_model->get_venta($id);
    return $consulta[0]->monto_total;
}
function cantidad_disponible($producto_id)
{
    $CI =& get_instance();
    $CI->load->model('ventas_model');
    $consulta = $CI->ventas_model->get_stock($producto_id);
    return $consulta[0]->stock;
}
function detalle_productos($producto_id)
{
    $CI =& get_instance();
    $CI->load->model('ventas_model');
    $consulta = $CI->ventas_model->get_detalle_producto($producto_id);
    $tipo_id=$consulta[0]->tipo_id;
    $nombre=$consulta[0]->nombre;
    $consulta2 = $CI->ventas_model->get_tipo($tipo_id);
    $presentacion = $consulta2[0]->nombre;

    return $nombre.':'.' '.$presentacion;

}
function fecha_venta($ventas_id)
{
    $CI =& get_instance();
    $CI->load->model('ventas_model');
    $consulta = $CI->ventas_model->get_fecha($ventas_id);
    return $consulta[0]->fecha_venta;
}
function id_ventas($fecha, $cliente_id){
    $CI =& get_instance();
    $CI->load->model('ventas_model');
    $consulta = $CI->ventas_model->get_ventas_fecha_cliente($cliente_id, $fecha);
    return $consulta[0]->id;

}
function detalle_producto1($producto_id)
{
    $CI =& get_instance();
    $CI->load->model('ventas_model');
    $consulta = $CI->ventas_model->get_detalle_producto($producto_id);
    $tipo_id=$consulta[0]->tipo_id;
    $nombre=$consulta[0]->nombre;
    $consulta2 = $CI->ventas_model->get_tipo($tipo_id);
    $presentacion = $consulta2[0]->nombre;

        return $presentacion;
}

function catidad_ventas_cliente($id_cliente){
    $CI =& get_instance();
    $CI->load->model('ventas_model');
    $cantidad = $CI->ventas_model->get_cantidad_venta_cliente($id_cliente);
    return $cantidad;
}