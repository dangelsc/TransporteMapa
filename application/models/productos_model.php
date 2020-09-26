<?php
class Productos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function select_tipo()
    {
        $query=$this->db->get('tipo');
        return $query->result();
    }
    function insert_presentacion($presentacion,$fecha)
    {
        $data = array(
            'nombre' => $presentacion,
            'fecha' => $fecha
        );
        return $this->db->insert('tipo',$data);
    }
    function select_tipo_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('tipo');
        return $query->result();
    }
    function update_presentacion($presentacion,$id)
    {
        $data = array(
            'nombre' => $presentacion
        );
        $this->db->where('id', $id);
        return $this->db->update('tipo', $data);
    }
    function listar_tipos()
    {
        $query=$this->db->get('tipo');
        return $query->result();
    }
    function guardar_producto($nombre,$contenido,$descripcion,$p_normal,$p_tienda,$p_agencia,$imagen,$presentacion,$envase,$fecha)
    {
        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio_normal' => $p_normal,
            'precio_tienda' => $p_tienda,
            'precio_agencia' => $p_agencia,
            'avatar' => $imagen,
            'tipo_id' => $presentacion,
            'retornable' => $envase,
            'contenido' => $contenido,
            'fecha_registro'=>$fecha
        );
        $query=$this->db->insert('productos',$data);
        if($query)
        {
            $id=$this->db->insert_id();
            $dato = array(
                'productos_id' => $id,
                'entrada' => '0',
                'salida' => '0',
                'stock' => '0'
            );
            return $this->db->insert('almacen',$dato);

        }
    }
    function update_producto($nombre,$contenido,$descripcion,$p_normal,$p_tienda,$p_agencia,$imagen,$presentacion,$envase,$id)
    {
        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio_normal' => $p_normal,
            'precio_tienda' => $p_tienda,
            'precio_agencia' => $p_agencia,
            'avatar' => $imagen,
            'tipo_id' => $presentacion,
            'retornable' => $envase,
            'contenido' => $contenido,
        );
        $this->db->where('id', $id);
        return $this->db->update('productos',$data);
    }
    function listar_productos()
    {
        $query=$this->db->get('productos');
        return $query->result();
    }
    function listar_productos_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('productos');
        return $query->result();
    }
    function listar_productos_almacen($id)
    {
        $this->db->select('almacen.id as almacen_id');
        $this->db->select('almacen.entrada as entrada');
        $this->db->select('almacen.salida as salida');
        $this->db->select('almacen.stock as stock');
        $this->db->select('productos.id as prod_id');
        $this->db->select('productos.nombre as pro_nombre');
        $this->db->select('productos.avatar as foto');
        $this->db->select('productos.contenido as contenido');
        $this->db->select('productos.retornable as retornable');
        $this->db->select('productos.tipo_id as tipo_id');
        $this->db->from('almacen');
        $this->db->join('productos','productos.id=almacen.productos_id');
        $this->db->where('almacen.productos_id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[]=$fila;
            }
            return $data;
        }
        else
        {
            return false;
        }
    }
    function cantidad_stock($id)
    {
        $this->db->where('productos_id',$id);
        $query=$this->db->get('almacen');
        return $query->result();
    }
    function update_stock($suma_stock,$suma_entrada,$id)
    {
        $data = array(
            'entrada' => $suma_entrada,
            'stock' => $suma_stock
        );
        $this->db->where('id', $id);
        return $this->db->update('almacen',$data);
    }
    function listar_productos_almacen1()
    {
        $this->db->select('almacen.id as almacen_id');
        $this->db->select('almacen.entrada as entrada');
        $this->db->select('almacen.salida as salida');
        $this->db->select('almacen.stock as stock');
        $this->db->select('productos.id as prod_id');
        $this->db->select('productos.nombre as pro_nombre');
        $this->db->select('productos.avatar as foto');
        $this->db->select('productos.contenido as contenido');
        $this->db->select('productos.retornable as retornable');
        $this->db->select('productos.tipo_id as tipo_id');
        $this->db->from('almacen');
        $this->db->join('productos','productos.id=almacen.productos_id');
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[]=$fila;
            }
            return $data;
        }
        else
        {
            return false;
        }

    }

}
?>