<?php
function sacar_nombre_tipo($id)
{
    $CI=& get_instance();
    $CI->load->model('productos_model');
    $query=$CI->productos_model->select_tipo_id($id);
    return $query[0]->nombre;
}