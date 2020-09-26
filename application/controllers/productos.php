    <?php
class Productos extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->_is_logued_in();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('form','url');
        $this->load->helper('productos_helper');
        $this->load->model('productos_model');
        $this->load->model('usuario_model');
        $this->load->helper(array('form', 'url'));
    }
    function _is_logued_in(){
        $is_logued_in = $this->session->userdata('is_logued_in');
        if($is_logued_in != TRUE)
        {
            redirect('/welcome/iniciar_sesion/', 'refresh');
        }
        else{
            if ($this->session->userdata('super') == false) {
                $si = false;
                foreach ($this->session->userdata('permisos') as $fila) {
                    if($fila->permisos_id == 4){
                        $si = TRUE;
                        break;
                    }
                }
                if($si == false){
                    echo "<script>alert('no tiene acseso');</script>";
                    redirect("/welcome/", 'refresh');
                }
            }
        }
    }
    function index()
    {
        $data['titulo'] = 'Productos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_productos']=$this->productos_model->listar_productos();
        $this->load->view('menu');
        $this->load->view('productos/index',$dato);
        $this->load->view('footer');
    }
    function reg_nuevo($error='')
    {
        $data['titulo'] = 'Nuevo Producto';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['error'] = $error;
        $dato['tipo'] = $this->productos_model->listar_tipos();
        $this->load->view('menu');
        $this->load->view('productos/nuevo_producto',$dato);
        $this->load->view('footer');
    }
    function agregar_tipo()
    {
        $data['titulo'] = 'Presentacion';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['seleccionar'] = $this->productos_model->select_tipo();
        $this->load->view('menu');
        $this->load->view('productos/nuevo_tipo',$dato);
        $this->load->view('footer');
    }
    function new_tipo()
    {
        $data['titulo'] = 'Registrar Nueva Presentacion';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['seleccionar'] = $this->productos_model->select_tipo();
        $this->load->view('menu');
        $this->load->view('productos/new_tipo',$dato);
        $this->load->view('footer');
    }
    function ver_detalle($id)
    {
        $data['titulo'] = 'Detalle de Productos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_productos']=$this->productos_model->listar_productos_id($id);
        $this->load->view('menu');
        $this->load->view('productos/ver_detalle',$dato);
        $this->load->view('footer');
    }
    function guardar_presentacion()
    {
        $this->form_validation->set_rules('descripcion', 'Presentacion', 'required');
        $this->form_validation->set_message('required', 'El campo %s es Requerido');

        if ($this->form_validation->run() == FALSE)
        {
            $this->new_tipo();
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Registrar Nueva Presentacion';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            // guardar presenteacion
            $presentacion = $this->input->post('descripcion');
            $fecha=date("Y-m-d H:i:s",time()-16300);
            $insertar=$this->productos_model->insert_presentacion($presentacion,$fecha);
            if($insertar)
            {
                $cadena="("."'$presentacion' ,"."'$fecha'".")";
                $name_tabla= 'tipo';
                $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

                $data['titulo'] = 'Presentacion';
                $this->load->view('header', $data);
                $dato['mensaje'] = "Presentacion Registrado Correctamente :)";
                $dato['seleccionar'] = $this->productos_model->select_tipo();
                $this->load->view('menu');
                $this->load->view('productos/nuevo_tipo',$dato);
                $this->load->view('footer');
            }
            else
            {
                $this->nuevo();
            }
        }
    }
    function modificar_presentacion($id)
    {
        $data['titulo'] = 'Modificar Nueva Presentacion';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['seleccionar'] = $this->productos_model->select_tipo_id($id);
        $this->load->view('menu');
        $this->load->view('productos/modificar_tipo',$dato);
        $this->load->view('footer');

    }
    function update_presentacion($id)
    {
        $this->form_validation->set_rules('descripcion', 'Presentacion', 'required');
        $this->form_validation->set_message('required', 'El campo %s es Requerido');

        if ($this->form_validation->run() == FALSE)
        {
            $this->new_tipo();
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Actualizar Datos de Presentacion';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();

            // modificar presentacion
            $presentacion = $this->input->post('descripcion');
            $consulta=$this->productos_model->select_tipo_id($id);
            if($consulta)
            {
                $nombre1=$consulta[0]->nombre ;$fecha1=$consulta[0]->fecha;
                $cadena1="("."'$nombre1' ,"."'$fecha1' ,".")";
            }
            $update=$this->productos_model->update_presentacion($presentacion,$id);
            if($update)
            {
                $cadena2="("."'$presentacion' ,"."'$fecha1' ".")";
                $name_tabla= 'tipo';
                $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

                $data['titulo'] = 'Presentacion';
                $this->load->view('header', $data);
                $dato['mensaje'] = "Presentacion Modificada Correctamente :)";
                $dato['seleccionar'] = $this->productos_model->select_tipo();
                $this->load->view('menu');
                $this->load->view('productos/nuevo_tipo',$dato);
                $this->load->view('footer');
            }
            else
            {
                $this->nuevo();
            }
        }
    }
    function reg_producto()
    {
        $this->form_validation->set_rules('nombre', 'Nombre de Producto', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contenido', 'Contenido', 'trim|required|xss_clean');
        $this->form_validation->set_rules('descripcion', 'Nombres', 'trim|required|xss_clean');
        $this->form_validation->set_rules('p_normal', 'Precio Normal', 'trim|required|xss_clean|integer');
        $this->form_validation->set_rules('p_tienda', 'Precio Tienda', 'trim|required|xss_clean|integer');
        $this->form_validation->set_rules('p_agencia', 'Precio Agencia', 'trim|required|xss_clean|integer');
        $this->form_validation->set_message('required', 'El campo %s es REQUERIDO');
        $this->form_validation->set_message('integer', 'El campo %s solo se aceptan numeros');
        if ($this->form_validation->run() == FALSE)
        {
            $this->reg_nuevo();
        }

        else
        {
            //insertar la bitacora de seguridad
            $accion='Registro Nuevo Producto';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            // registro de productos
                $imagen0=$_FILES['userfile']['name'];
                if($imagen0)
                {
                    $config['upload_path'] = './imagenes/';
                    $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
                    $config['remove_spaces'] = TRUE;
                    $config['max_size'] = '1024';
                    $config['overwrite']= TRUE;

                    $this->load->library('upload', $config);
                    if (! $this->upload->do_upload())
                    {
                        $error = $this->upload->display_errors();
                        $this->reg_nuevo($error);
                    }
                    else {

                        $data = $this->upload->data();
                        //$file_info = $this->upload->data();
                        $imagen = $data['file_name'];
                        //$imagen = $file_info['file_name'];
                        $nombre=$this->input->post('nombre');
                        $contenido=$this->input->post('contenido');
                        $descripcion=$this->input->post('descripcion');
                        $p_normal=$this->input->post('p_normal');
                        $p_tienda=$this->input->post('p_tienda');
                        $p_agencia=$this->input->post('p_agencia');
                        $presentacion=$this->input->post('presentacion');
                        $envase=$this->input->post('envase');
                        $fecha=date("Y-m-d H:i:s",time()-16300);
                        $insert=$this->productos_model->guardar_producto($nombre,$contenido,$descripcion,$p_normal,$p_tienda,$p_agencia,$imagen,$presentacion,$envase,$fecha);
                        if($insert)
                        {
                            $cadena="("."'$nombre' ,"."'$descripcion' ,"."'$fecha' ,"."'$p_normal' ,"."'$p_tienda' ,"."'$p_agencia' ,"."'$imagen' ,"."'$presentacion' ,"."'$envase' ,"."'$contenido' ,".")";
                            $name_tabla= 'producto';
                            $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

                            $data['titulo'] = 'Productos';
                            $this->load->view('header', $data);
                            $dato['mensaje'] = "Producto Registrado Correctamente :)";
                            $dato['lista_productos']=$this->productos_model->listar_productos();
                            //$dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
                            $this->load->view('menu');
                            $this->load->view('productos/index',$dato);
                            $this->load->view('footer');

                        }
                        else
                        {
                            $this->index();
                        }
                    }
                }
                else
                {

                    $imagen = "";
                    $nombre=$this->input->post('nombre');
                    $contenido=$this->input->post('contenido');
                    $descripcion=$this->input->post('descripcion');
                    $p_normal=$this->input->post('p_normal');
                    $p_tienda=$this->input->post('p_tienda');
                    $p_agencia=$this->input->post('p_agencia');
                    $presentacion=$this->input->post('presentacion');
                    $envase=$this->input->post('envase');
                    $fecha=date("Y-m-d H:i:s",time()-16300);
                    $insert=$this->productos_model->guardar_producto($nombre,$contenido,$descripcion,$p_normal,$p_tienda,$p_agencia,$imagen,$presentacion,$envase,$fecha);
                    if($insert)
                    {
                        $cadena="("."'$nombre' ,"."'$descripcion' ,"."'$fecha' ,"."'$p_normal' ,"."'$p_tienda' ,"."'$p_agencia' ,"."'$imagen' ,"."'$presentacion' ,"."'$envase' ,"."'$contenido' ,".")";
                        $name_tabla= 'producto';
                        $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

                        $data['titulo'] = 'Productos';
                        $this->load->view('header', $data);
                        $dato['mensaje'] = "Producto Registrado Correctamente :)";
                        $dato['lista_productos']=$this->productos_model->listar_productos();
                        //$dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
                        $this->load->view('menu');
                        $this->load->view('productos/index',$dato);
                        $this->load->view('footer');

                    }
                    else
                    {
                        $this->index();
                    }
                }
            }

    }
    function modificar_producto()
    {
        $data['titulo'] = 'Selecione su Producto para Modificar';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_productos']=$this->productos_model->listar_productos();
        $this->load->view('menu');
        $this->load->view('productos/modificar_productos',$dato);
        $this->load->view('footer');
    }
    function guardar_cambios($id,$error='')
    {
        $data['titulo'] = 'Modificar Producto';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['error'] = $error;
        $dato['tipo'] = $this->productos_model->listar_tipos();
        $dato['lista_productos']=$this->productos_model->listar_productos_id($id);
        $this->load->view('menu');
        $this->load->view('productos/formulario_update',$dato);
        $this->load->view('footer');
    }
    function update_producto($id)
    {
        $this->form_validation->set_rules('nombre', 'Nombre de Producto', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contenido', 'Contenido', 'trim|required|xss_clean');
        $this->form_validation->set_rules('descripcion', 'Nombres', 'trim|required|xss_clean');
        $this->form_validation->set_rules('p_normal', 'Precio Normal', 'trim|required|xss_clean|integer');
        $this->form_validation->set_rules('p_tienda', 'Precio Tienda', 'trim|required|xss_clean|integer');
        $this->form_validation->set_rules('p_agencia', 'Precio Agencia', 'trim|required|xss_clean|integer');
        $this->form_validation->set_message('required', 'El campo %s es REQUERIDO');
        $this->form_validation->set_message('integer', 'El campo %s solo se aceptan numeros');
        if ($this->form_validation->run() == FALSE)
        {
            $this->guardar_cambios($id);
        }

        else
        {
            //insertar la bitacora de seguridad
            $accion='Actualizar Datos de Producto';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();

            // modificar datos
            $imagen0=$_FILES['userfile']['name'];
            if($imagen0)
            {
                $config['upload_path'] = './imagenes/';
                $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '1024';
                $config['overwrite']= TRUE;

                $this->load->library('upload', $config);
                if (! $this->upload->do_upload())
                {
                    $error = $this->upload->display_errors();
                    $this->guardar_cambios($error,$id);
                }
                else {

                    $data = $this->upload->data();
                    //$file_info = $this->upload->data();
                    $imagen = $data['file_name'];
                    //$imagen = $file_info['file_name'];
                    $nombre=$this->input->post('nombre');
                    $contenido=$this->input->post('contenido');
                    $descripcion=$this->input->post('descripcion');
                    $p_normal=$this->input->post('p_normal');
                    $p_tienda=$this->input->post('p_tienda');
                    $p_agencia=$this->input->post('p_agencia');
                    $presentacion=$this->input->post('presentacion');
                    $envase=$this->input->post('envase');

                    $consulta=$this->productos_model->listar_productos_id($id);
                    if($consulta)
                    {
                        $nombre1=$consulta[0]->nombre;$descripcion1=$consulta[0]->descripcion;$fecha_registro1=$consulta[0]->fecha_registro;$p_normal1=$consulta[0]->p_normal;$p_tienda1=$consulta[0]->p_tienda;$p_agencia1=$consulta[0]->p_agencia;$imagen1=$consulta[0]->avatar;$presentacion1=$consulta[0]->tipo_id;$envase1=$consulta[0]->envase;
                        $cadena1="("."'$nombre1' ,"."'$descripcion1' ,"."'$fecha_registro1' ,"."'$p_normal1' ,"."'$p_tienda1' ,"."'$p_agencia1' ,"."'$imagen1' ,"."'$presentacion1' ,"."'$envase1' ,".")";
                    }
                    $update=$this->productos_model->update_producto($nombre,$contenido,$descripcion,$p_normal,$p_tienda,$p_agencia,$imagen,$presentacion,$envase,$id);
                    if($update)
                    {
                        $cadena2="("."'$nombre' ,"."'$descripcion' ,"."'$fecha_registro1' ,"."'$p_normal' ,"."'$p_tienda' ,"."'$p_agencia' ,"."'$imagen' ,"."'$presentacion' ,"."'$envase' ,"."'$contenido' ,".")";

                        $name_tabla= 'producto';
                        $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

                        $data['titulo'] = 'Productos';
                        $this->load->view('header', $data);
                        $dato['mensaje'] = "Producto Fue Modificado Correctamente :)";
                        $dato['lista_productos']=$this->productos_model->listar_productos();
                        //$dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
                        $this->load->view('menu');
                        $this->load->view('productos/index',$dato);
                        $this->load->view('footer');

                    }
                    else
                    {
                        $this->index();
                    }
                }
            }
            else
            {

                $imagen = $this->input->post('imagen');
                $nombre=$this->input->post('nombre');
                $contenido=$this->input->post('contenido');
                $descripcion=$this->input->post('descripcion');
                $p_normal=$this->input->post('p_normal');
                $p_tienda=$this->input->post('p_tienda');
                $p_agencia=$this->input->post('p_agencia');
                $presentacion=$this->input->post('presentacion');
                $envase=$this->input->post('envase');
                $consulta=$this->productos_model->listar_productos_id($id);
                if($consulta)
                {
                    $nombre1=$consulta[0]->nombre;$descripcion1=$consulta[0]->descripcion;$fecha_registro1=$consulta[0]->fecha_registro;$p_normal1=$consulta[0]->precio_normal;$p_tienda1=$consulta[0]->precio_tienda;$p_agencia1=$consulta[0]->precio_agencia;$imagen1=$consulta[0]->avatar;$presentacion1=$consulta[0]->tipo_id;$envase1=$consulta[0]->retornable;
                    $cadena1="("."'$nombre1' ,"."'$descripcion1' ,"."'$fecha_registro1' ,"."'$p_normal1' ,"."'$p_tienda1' ,"."'$p_agencia1' ,"."'$imagen1' ,"."'$presentacion1' ,"."'$envase1' ,".")";
                }

                $update=$this->productos_model->update_producto($nombre,$contenido,$descripcion,$p_normal,$p_tienda,$p_agencia,$imagen,$presentacion,$envase,$id);
                if($update)
                {
                    $cadena2="("."'$nombre' ,"."'$descripcion' ,"."'$fecha_registro1' ,"."'$p_normal' ,"."'$p_tienda' ,"."'$p_agencia' ,"."'$imagen' ,"."'$presentacion' ,"."'$envase' ,"."'$contenido' ,".")";

                    $name_tabla= 'producto';
                    $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

                    $data['titulo'] = 'Productos';
                    $this->load->view('header', $data);
                    $dato['mensaje'] = "Producto fue Modificado Correctamente :)";
                    $dato['lista_productos']=$this->productos_model->listar_productos();
                    //$dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
                    $this->load->view('menu');
                    $this->load->view('productos/index',$dato);
                    $this->load->view('footer');

                }
                else
                {
                    $this->index();
                }
            }
        }
    }
    function agregar_almacen()
    {
        $data['titulo'] = 'Producto Almacen';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_productos']=$this->productos_model->listar_productos();
        $this->load->view('menu');
        $this->load->view('productos/productos_almacen',$dato);
        $this->load->view('footer');
    }
    function actulizar_stock($id)
    {
        $data['titulo'] = 'Actulizar Almacen';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['detalle']=$this->productos_model->listar_productos_almacen($id);
        $this->load->view('menu');
        $this->load->view('productos/update_almacen',$dato);
        $this->load->view('footer');

    }
    function update_almacen($id_pro)
    {
        $this->form_validation->set_rules('ingreso', 'Cantidad de Productos', 'trim|required|xss_clean|integer');
        $this->form_validation->set_message('required', 'El campo %s es REQUERIDO');
        $this->form_validation->set_message('integer', 'El campo %s solo se aceptan numeros');
        if ($this->form_validation->run() == FALSE)
        {
            $this->actulizar_stock($id_pro);
        }
        else
        {
            $consulta=$this->productos_model->cantidad_stock($id_pro);
            foreach ($consulta as $fila)
            {
                $stock = $fila->stock;
                $entrada = $fila->entrada;


            }
            $campo=$this->input->post('ingreso');
            $suma_stock=$stock+$campo;
            $suma_entrada=$entrada+$campo;
            $id=$this->input->post('id');

            $update=$this->productos_model->update_stock($suma_stock,$suma_entrada,$id);
            if($update)
            {
                //insertar la bitacora de seguridad
                $accion='Actualizar Almacen';
                $session_id = $this->session->userdata('id');
                $host=$_SERVER['REMOTE_ADDR'];
                $fecha= date("Y-m-d H:i:s",time()-14400);
                $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
                $id_bitacora = $this->db->insert_id();

                $cadena="("."'$suma_stock' ,"."'$suma_entrada' ,"."'$id' ,".")";
                $name_tabla= 'almacen';
                $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

                //datos almacen
                $data['titulo'] = 'Actulizar Almacen';
                $this->load->view('header', $data);
                $dato['mensaje'] = "Los datos se actualizaron correctamente :)";
                $dato['detalle']=$this->productos_model->listar_productos_almacen($id_pro);
                $this->load->view('menu');
                $this->load->view('productos/update_almacen',$dato);
                $this->load->view('footer');
            }
            else
            {
                return index();
            }

        }
    }
    function listar_productos_almacen()
    {
        $data['titulo'] = 'Productos en Almacen';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['detalle']=$this->productos_model->listar_productos_almacen1();
        $this->load->view('menu');
        $this->load->view('productos/listar_productos_almacen',$dato);
        $this->load->view('footer');
    }
    function almacen_con_stock()
    {
        $data['titulo'] = 'Productos con Stock';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['detalle']=$this->productos_model->listar_productos_almacen1();
        $this->load->view('menu');
        $this->load->view('productos/listar_productos_con_stock',$dato);
        $this->load->view('footer');
    }
    function almacen_sin_stock()
    {
        $data['titulo'] = 'Productos con Stock';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['detalle']=$this->productos_model->listar_productos_almacen1();
        $this->load->view('menu');
        $this->load->view('productos/listar_productos_sin_stock',$dato);
        $this->load->view('footer');
    }
    function pdf_lista_productos()
    {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Sergio Barriga');
        $pdf->SetTitle('Nomina de Usuarios');

        /*$pdf->SetSubject('Tutorial TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');*/

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/tcpdf/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra

//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('times', 'BI', 15, '', true);


// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
        $consulta = $this->productos_model->listar_productos();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->Cell(0, 0, 'NUESTROS PRODUCTOS', 0, 1, 'C', 0, '', 0);
        $pdf->SetFont('times', 'I', 15, '', true);
        $pdf->Cell(0, 0, '', 0, 1, 'L', 0, 0);
        $text='Productos de oferta la Cerveceria Nacional Potosi: ';
        $pdf->Cell(0, 0, $text, 0, 1, 'L', 0, 0);
        $pdf->SetFont('times', 'I', 11, '', true);
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background-color: #efefef;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.7em}";
        $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid: background: none;line-height: 2;font-size: 0.8em;}";
        $html .= "</style>";
        $html .= "<br><br>";
        $html .= '<table width="740" aling="center">';
        $html .= '<tr><th width="30">Nro</th><th  width="170" align="center">NOMBRE</th><th width="150" align="center">PRESENTACION</th><th align="center">CONTENIDO</th><th width="60" align="center">P. NORMAL</th><th  width="60" align="center">P. TIENDA</th><th  width="60" align="center">P. AGENCIA</th></tr>';

        $num=1;
        foreach ($consulta as $fila) {
            if($fila->retornable==0)
            {
                $retor='en envase Retornable';
            }
            else
            {
                $retor='en envase no Retornable';
            }
            $tipo= sacar_nombre_tipo($fila->tipo_id);

            $html .= '<tr><td width="30" align="center">' . $num++ . '</td><td width="170" align="center">'.$fila->nombre.' '.$retor.''.'</td><td align="center">'.$tipo .'</td><td align="center">'.$fila->contenido.'</td><td align="center">'.$fila->precio_normal.'</td><td align="center">'.$fila->precio_tienda.'</td><td align="center">'.$fila->precio_agencia.'</td></tr>';
        }

        $html .= "</table>";
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("productos de pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
    function pdf_detalle_productos($id)
    {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Sergio Barriga');
        $pdf->SetTitle('Nomina de Usuarios');

        /*$pdf->SetSubject('Tutorial TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');*/

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/tcpdf/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra

//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('times', 'BI', 15, '', true);
        //$objeto->Image ( imagen, x, y, ancho, alto, tipo, enlace, punto_insercion, remuestreo, resolucion, alineacion, imk, imgk, borde, proporcionalidad, ocultar, encajar)

// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
        $consulta = $this->productos_model->listar_productos_id($id);
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->Cell(0, 0, 'DETALLE DEL PRODUCTO', 0, 1, 'C', 0, '', 0);
        $ruta = base_url();
        foreach ( $consulta as $fila)
        {
            $imagen=$fila->avatar;
                $pdf->Image($ruta."imagenes/".$imagen."", 83, 40, 40, 55, '', '', 'T', false, 300, false, false, false, false, false, false, false);
            $pdf->SetY(105);
            $pdf->SetX(45);
            $pdf->SetFont('times', 'I', 12);
            $html = '';
            $html .= "<style type=text/css>";
            $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background-color: #efefef;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.9em}";
            $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid: background: none;line-height: 2;font-size: 0.9em;}";
            $html .= "</style>";
            $html .= "<br><br>";
            $html .= '<table width="740" aling="center">';
            foreach ($consulta as $fila) {
                if($fila->retornable==0)
                {
                    $retor='en Envase Retornable';
                }
                else
                {
                    $retor='en Envase no Retornable';
                }

                $html .= '<tr><th td width="200">'.'Nombre :'.'</th><td>'.$fila->nombre.' '.$retor.''.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Contenido :'.'</th><td>'.$fila->contenido.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Fecha de Registro:'.'</th><td>'.$fila->fecha_registro.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Presentacion :'.'</th><td>'.sacar_nombre_tipo($fila->tipo_id).'</td></tr>';
                $html .= '<tr><th td width="200">'.'Precio Agencia :'.'</th><td>'.$fila->precio_agencia.' Bs.'.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Precio Normal :'.'</th><td>'.$fila->precio_normal.' Bs.'.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Precio Tienda :'.'</th><td>'.$fila->precio_tienda.' Bs.'.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Descripcion :'.'</th><td>'.$fila->descripcion.'</td></tr>';




            }
/*
            $num=1;
            foreach ($consulta as $fila) {
                if($fila->retornable==0)
                {
                    $retor='en envase Retornable';
                }
                else
                {
                    $retor='en envase no Retornable';
                }
                $tipo= sacar_nombre_tipo($fila->tipo_id);

                $html .= '<tr><td width="30" align="center">' . $num++ . '</td><td width="170" align="center">'.$fila->nombre.' '.$retor.''.'</td><td align="center">'.$tipo .'</td><td align="center">'.$fila->contenido.'</td><td align="center">'.$fila->precio_normal.'</td><td align="center">'.$fila->precio_tienda.'</td><td align="center">'.$fila->precio_agencia.'</td></tr>';
            }

            $html .= "</table>";*/
                /*$pdf->SetFont('times', 'BI', 10);
                $nombre='Nombre del Producto:';
                $presentacion='Presentacion:';
                $precio_normal='Precio Normal :'.$fila->precio_normal;
                if($fila->retornable==0)
                {
                    $envase=' en Envase Retornable';
                }
                else
                {
                    $envase=' en Envase No Retornable';
                }
                $fecha='Fecha de Registro';
                $pdf->SetFont('times', 'BI', 12);
                $pdf->SetY(105);
                $pdf->SetX(45);
                $nombrec=$fila->nombre;
                $pdf->Write(0, $nombre.'   '.$nombrec.''.$envase.'', '', 0, 'L', true, 0, false, false, 100);
                $pdf->SetX(45);
                 $pdf->Write(0, $presentacion.'   '.$nombrec.''.$envase.'', '', 0, 'L', true, 0, false, false, 100);
                $pdf->SetX(45);
                 $pdf->Write(0, $fecha.'   '.$nombrec.''.$envase.'', '', 0, 'L', true, 0, false, false, 100);
                 $pdf->SetX(45);
                 $pdf->Write(0, $precio_normal, '', 0, 'L', true, 0, false, false, 100);*/


        }

// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("productos de pdf");
        $pdf->Output($nombre_archivo, 'I');

    }
    function pdf_productos_almacen()
    {

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Sergio Barriga');
        $pdf->SetTitle('Productos Almacen');

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->setFontSubsetting(true);
        $pdf->AddPage();
        $consulta = $this->productos_model->listar_productos_almacen1();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->SetFont('times', 'BI', 14, '', true);
        $pdf->Cell(0, 0, 'NUESTROS PRODUCTOS EN ALMACEN', 0, 1, 'C', 0, '', 0);
        $pdf->SetFont('times', 'I', 14, '', true);
        $pdf->Cell(0, 0, '', 0, 1, 'L', 0, 0);
        $text='lista de Productos : ';
        $pdf->Cell(0, 0, $text, 0, 1, 'L', 0, 0);
        $pdf->SetFont('times', 'I', 11, '', true);
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background-color: #efefef;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.7em}";
        $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid: background: none;line-height: 2;font-size: 0.8em;}";
        $html .= "</style>";
        $html .= "<br><br>";
        $html .= '<table width="740" aling="center">';
        $html .= '<tr><th width="30">Nro</th><th  width="170" align="center">NOMBRE</th><th width="150" align="center">PRESENTACION</th><th align="center">ENVASE</th><th width="60" align="center">ENTRADAS</th><th  width="60" align="center">SALIDAS</th><th  width="60" align="center">STOCK</th></tr>';
        $num=1;
        foreach ($consulta as $fila) {
            if($fila->retornable==0)
            {
                $retor='en envase Retornable';
            }
            else
            {
                $retor='en envase no Retornable';
            }
            $tipo= sacar_nombre_tipo($fila->tipo_id);

            $html .= '<tr><td width="30" align="center">' . $num++ . '</td><td width="170" align="center">'.$fila->pro_nombre.' '.$retor.''.'</td><td align="center">'.$tipo .'</td><td align="center">'.$fila->contenido.'</td><td align="center">'.$fila->entrada.' Unid.'.'</td><td align="center">'.$fila->salida.' Unid.'.'</td><td align="center">'.$fila->stock.' Unid.'.'</td></tr>';
        }

        $html .= "</table>";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("productos de pdf");
        $pdf->Output($nombre_archivo, 'I');

    }
    function pdf_almacen_sin_stock()
    {

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Sergio Barriga');
        $pdf->SetTitle('Productos Almacen');

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->setFontSubsetting(true);
        $pdf->AddPage();
        $consulta = $this->productos_model->listar_productos_almacen1();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->SetFont('times', 'BI', 14, '', true);
        $pdf->Cell(0, 0, 'PRODUCTOS SIN STOCK', 0, 1, 'C', 0, '', 0);
        $pdf->SetFont('times', 'I', 15, '', true);
        $pdf->Cell(0, 0, '', 0, 1, 'L', 0, 0);
        $text='lista de Productos : ';
        $pdf->Cell(0, 0, $text, 0, 1, 'L', 0, 0);
        $pdf->SetFont('times', 'I', 11, '', true);
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background-color: #efefef;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.7em}";
        $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid: background: none;line-height: 2;font-size: 0.8em;}";
        $html .= "</style>";
        $html .= "<br><br>";
        $html .= '<table width="740" aling="center">';
        $html .= '<tr><th width="30">Nro</th><th  width="170" align="center">NOMBRE</th><th width="150" align="center">PRESENTACION</th><th align="center">ENVASE</th><th width="60" align="center">ENTRADAS</th><th  width="60" align="center">SALIDAS</th><th  width="60" align="center">STOCK</th></tr>';
        $num=1;
        if($consulta){
            foreach ($consulta as $fila) {
                if($fila->stock==0)
                {
                    if($fila->retornable==0)
                    {
                        $retor='en envase Retornable';
                    }
                    else
                    {
                        $retor='en envase no Retornable';
                    }
                    $tipo= sacar_nombre_tipo($fila->tipo_id);

                    $html .= '<tr><td width="30" align="center">' . $num++ . '</td><td width="170" align="center">'.$fila->pro_nombre.' '.$retor.''.'</td><td align="center">'.$tipo .'</td><td align="center">'.$fila->contenido.'</td><td align="center">'.$fila->entrada.' Unid.'.'</td><td align="center">'.$fila->salida.' Unid.'.'</td><td align="center">'.$fila->stock.' Unid.'.'</td></tr>';
                }
            }
        }


        $html .= "</table>";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("productos de pdf");
        ob_end_clean();
        $pdf->Output($nombre_archivo, 'I');

    }
    function pdf_almacen_con_stock()
    {

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Productos Almacen');

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->setFontSubsetting(true);
        $pdf->AddPage();
        $consulta = $this->productos_model->listar_productos_almacen1();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->SetFont('times', 'BI', 14, '', true);
        $pdf->Cell(0, 0, 'PRODUCTOS CON STOCK DISPONIBLE', 0, 1, 'C', 0, '', 0);
        $pdf->SetFont('times', 'I', 15, '', true);
        $pdf->Cell(0, 0, '', 0, 1, 'L', 0, 0);
        $text='lista de Productos : ';
        $pdf->Cell(0, 0, $text, 0, 1, 'L', 0, 0);
        $pdf->SetFont('times', 'I', 11, '', true);
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background-color: #efefef;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.7em}";
        $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid: background: none;line-height: 2;font-size: 0.8em;}";
        $html .= "</style>";
        $html .= "<br><br>";
        $html .= '<table width="740" aling="center">';
        $html .= '<tr><th width="30">Nro</th><th  width="170" align="center">NOMBRE</th><th width="150" align="center">PRESENTACION</th><th align="center">ENVASE</th><th width="60" align="center">ENTRADAS</th><th  width="60" align="center">SALIDAS</th><th  width="60" align="center">STOCK</th></tr>';
        $num=1;
        if($consulta){
            foreach ($consulta as $fila)
            {
                if($fila->stock>0)
                {
                        if($fila->retornable==0)
                        {
                            $retor='en envase Retornable';
                        }
                        else
                        {
                            $retor='en envase no Retornable';
                        }
                        $tipo= sacar_nombre_tipo($fila->tipo_id);

                        $html .= '<tr><td width="30" align="center">' . $num++ . '</td><td width="170" align="center">'.$fila->pro_nombre.' '.$retor.''.'</td><td align="center">'.$tipo .'</td><td align="center">'.$fila->contenido.'</td><td align="center">'.$fila->entrada.' Unid.'.'</td><td align="center">'.$fila->salida.' Unid.'.'</td><td align="center">'.$fila->stock.' Unid.'.'</td></tr>';
                }
            }

        }
        $html .= "</table>";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("productos de pdf");
        ob_end_clean();
        $pdf->Output($nombre_archivo, 'I');

    }
}