<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function sacar_nombre($id){
    $CI =& get_instance();
    $CI->load->model('usuario_model');
    $consulta = $CI->usuario_model->get_nombre($id);
    return $consulta[0]->nick;
}
function sacar_email($id){
    $CI =& get_instance();
    $CI->load->model('usuario_model');
    $consulta = $CI->usuario_model->get_nombre($id);
    return $consulta[0]->email;
}
function sacar_estado($id){
    $CI =& get_instance();
    $CI->load->model('usuario_model');
    $consulta = $CI->usuario_model->get_nombre($id);
    if($consulta[0]->estado==0)
    {
        return 'Usuario Activo';
    }
    else
    {
        return 'Usuario Inactivo';
    }
}
function sacar_permiso($id)
{
    $CI =& get_instance();
    $CI->load->model('usuario_model');
    $consulta = $CI->usuario_model->get_permiso($id);
    return $consulta[0]->nombre;
}
function sacar_tipo($id)
{
    $CI =& get_instance();
    $CI->load->model('usuario_model');
    $consulta = $CI->usuario_model->get_tipo($id);
    if ($consulta[0]->camion==0)
    {
        return 'usuario';
    }
    else
    {
        return 'camion';
    }
}
