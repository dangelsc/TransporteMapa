<?php
class Usuario_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function insert_usuario($username,$pass,$estado,$fecha,$super,$email)
    {

        $data = array(
            'nick' => $username,
            'password' => $pass,
            'estado' => $estado,
            'fecha_reg'=>$fecha,
            'super_user'=>$super,
            'email'=>$email
        );
        return $this->db->insert('usuario',$data);
    }
    public function insert_usuario_camion($username,$pass,$estado,$fecha,$super,$email, $empleado_id)
    {
        $data = array(
            'nick' => $username,
            'password' => $pass,
            'estado' => $estado,
            'fecha_reg'=>$fecha,
            'super_user'=>$super,
            'email'=>$email,
            'camion'=>TRUE,
            'empleado_id'=>$empleado_id,
        );
        return $this->db->insert('usuario',$data);
    }
    public function insert_usuario_cliente($username,$pass,$estado,$fecha,$super,$email, $cliente_id)
    {
        $data = array(
            'nick' => $username,
            'password' => $pass,
            'estado' => $estado,
            'fecha_reg'=>$fecha,
            'super_user'=>$super,
            'email'=>$email,
            'cliente'=>TRUE,
            'cliente_id'=>$cliente_id,
        );
        return $this->db->insert('usuario',$data);
    }
    function actualizar_cliente_usuario($id_cliente){
        $dato = array('usuario' => True, );
        $this->db->where('id', $id_cliente);
        $this->db->update('cliente', $dato);
    }
    function  update_usuario($username,$email,$id)
    {
        $data = array(
            'nick' => $username,
            'email'=>$email
        );
        $this->db->where('id', $id);
        return $this->db->update('usuario', $data);
    }
    function listar_permisos($id)
    {
        $this->db->select('permisos.nombre as permiso');
        $this->db->from('usuario');
        $this->db->where('id',$id);
        $this->db->join('usuario_permisos', 'usuario.id = usuario_permisos.usuario_id');
        $this->db->join('permisos','permisos.id = usuario_permisos.permisos_id');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return false;
        }
    }
    function listar_permisos1($id)
    {
        $this->db->where('usuario_id',$id);
        $query=$this->db->get('usuario_permisos');
        return $query->result();
    }

    public function listar_usuarios()
    {
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return FALSE;
        }
    }
    function session_init($pass, $username)
    {
        $this->db->where('nick',$username);
        $this->db->where('password',$pass);
        $query = $this->db->get('usuario');//,['nick'=>$username]);
        
        //print_r((string)$query->getQuery()); 
        print_r($this->db->last_query()); 
        return $query->result();    
    }
    function listar_usu_activo()
    {
        $query = $this->db->get_where('usuario', array('estado'=>"1"));
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return false;
        }

    }
    function listar_usu_inactivo()
    {
        $query = $this->db->get_where('usuario',array('estado'=>'0'));
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
               $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return false;
        }
    }
    function activar_usuario($id)
    {
        $data = array(
            'estado' => '1'
        );
        $this->db->where('id', $id);
        return $this->db->update('usuario', $data);
    }
    function inactivar_usuario($id)
    {
        $data = array(
            'estado' => '0'
        );
        $this->db->where('id', $id);
        return $this->db->update('usuario', $data);
    }
    function listar_adm_activo()
    {
        $query = $this->db->get_where('usuario', array('super_user'=>"1"));
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return false;
        }
    }
    function listar_adm_inactivo()
    {
        $query = $this->db->get_where('usuario', array('super_user'=>"0"));
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return false;
        }
    }
    function inactivar_adm($id)
    {
        $data = array(
            'super_user' => '0'
        );
        $this->db->where('id', $id);
        return $this->db->update('usuario', $data);
    }
    function activar_adm($id)
    {
        $data = array(
            'super_user' => '1'
        );
        $this->db->where('id', $id);
        return $this->db->update('usuario', $data);
    }
    function select_usuario_id($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return FALSE;
        }
    }
    function select_permisos()
    {
        $query=$this->db->get('permisos');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
    }
    function permisos_no_cliente($id){
        $this->db->where('usuario_id',$id);
        $per=$this->db->get('usuario_permisos');
        $per_id= array('0');
        foreach ($per->result() as $fila)
        {
            $a = array($fila->permisos_id);
            $per_id = array_merge($per_id, $a);
        }
        $this->db->where_not_in('id', $per_id);
        $query = $this->db->get('permisos');
        return $query->result();

    }
    function select_permisos_cliente($id)
    {
        $this->db->where('usuario_id',$id);
        $query=$this->db->get('usuario_permisos');
        return $query->result();
    }
    function verificar_permisos($id)
    {
        $this->db->where('usuario_id',$id);
        $query=$this->db->get('usuario_permisos');
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function guardar_permiso($usuario_id,$permiso_id)
    {
        $data = array(
            'usuario_id' => $usuario_id,
            'permisos_id' => $permiso_id

        );
        return $this->db->insert('usuario_permisos',$data);
    }
    function eliminar_permiso($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('usuario_permisos');
    }
    function usu_per_usuper($usuario_id)
    {
        $this->db->select('usuario_permisos.id as usu_per_id');
        $this->db->select('usuario_permisos.usuario_id as user_id');
        $this->db->select('usuario_permisos.permisos_id as per_id');
        $this->db->select('permisos.nombre as nombre_perm');
        $this->db->from('usuario_permisos');
        $this->db->join('permisos','usuario_permisos.permisos_id=permisos.id');
        $this->db->where('usuario_permisos.usuario_id',$usuario_id);
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
    function listar_usuarios_permisos($id)
    {
        $this->db->where('usuario_id',$id);
        $query=$this->db->get('usuario_permisos');
        return $query->result();
    }
    function get_nombre($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('usuario');
        return $query->result();
    }
    function get_permisos_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('usuario_permisos');
        return $query->result();
    }
    function get_permiso($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('permisos');
        return $query->result();
    }
    function verificar($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return FALSE;
        }
    }
    function updateconstrasena($passs,$session_id)
    {
        $data = array(
            'password'=>$passs,
        );
        $this->db->where('id',$session_id);
        return $this->db->update('usuario',$data);
    }
    function listar_bitacora()
    {
        $this->db->order_by("fecha", "desc");
        $query = $this->db->get('bitacoras');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return FALSE;
        }
    }
    function listar_detalle_bitacora()
    {

        $query = $this->db->get('detalle_bitacora');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return FALSE;
        }
    }
    function insertar_bitacora($accion,$session_id,$host,$fecha)
    {
        $data = array(
            'accion' => $accion,
            'sesion_id' => $session_id,
            'host'=>$host,
            'fecha'=>$fecha

        );
        return $this->db->insert('bitacoras',$data);
    }
    function insertar_detalle($cadena, $id_bitacora,$name_tabla)
    {
        $data = array(
            'id_bitacora'=>$id_bitacora,
            'dato_antiguo' => $cadena,
            'dato_nuevo' => '',
            'name_tabla'=>$name_tabla


        );
        return $this->db->insert('detalle_bitacora',$data);

    }
    function insertar_detalle1($cadena1,$cadena2, $id_bitacora,$name_tabla)
    {
        $data = array(
            'id_bitacora'=>$id_bitacora,
            'dato_antiguo' => $cadena1,
            'dato_nuevo' => $cadena2,
            'name_tabla'=>$name_tabla


        );
        return $this->db->insert('detalle_bitacora',$data);

    }
    function get_usuario($id){
        $this->db->where('id', $id);
        $query = $this->db->get('usuario');
        return $query->result();
    }
    function get_tipo($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('usuario');
        return $query->result();
    }
    function get_camion_usuario($empleado_id){
        $this->db->where('empleado_id', $empleado_id);
        $camion = $this->db->get('empleado_camion')->result();
        return $camion[0]->camion_id;
    }
    function detalle_bitacora($id)
    {
        $this->db->where('id_bitacora',$id);
        $query = $this->db->get('detalle_bitacora');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else
        {
            return FALSE;
        }
    }

}
?>