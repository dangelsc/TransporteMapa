<?php
class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->_is_logued_in();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('download');
        $this->load->model('usuario_model');
        $this->load->model('cliente_model');
        $this->load->helper('url');
        $this->load->helper('usuario_helper');
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
                    if($fila->permisos_id == 7){
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
    function nuevo()
    {
        $data['titulo'] = 'Nuevo Usuario';
        $this->load->view('header', $data);
        $mensaje['mensaje'] = "";
        $this->load->view('menu');
        $this->load->view('usuario/nuevo_usuario',$mensaje);
        $this->load->view('footer');
    }
    function reg_nuevo()
    {

            $this->form_validation->set_rules('username', 'Nombre de Usuario', 'required|min_length[5]|max_length[12]|is_unique[usuario.nick]');
            $this->form_validation->set_rules('password', 'Contraseña', 'required|matches[passconf]|md5');
            $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'required|md5');
            $this->form_validation->set_rules('email', 'Correo Electronico', 'trim|required|xss_clean|valid_email');
            
            $this->form_validation->set_message('valid_email', 'El campo %s es Incorrecto');
            $this->form_validation->set_message('min_length', 'El campo %s Debe Contener %s Caracteres o Mas');
            $this->form_validation->set_message('max_length', 'El campo %s Debe Contener Como Maximo %s Caracteres');
            $this->form_validation->set_message('is_unique', 'El campo %s ya Esta Registrado');
            $this->form_validation->set_message('matches', 'El campo %s Debe ser Igual al Campo %s');
            $this->form_validation->set_message('required', 'El campo %s No Puede Estar Vacio');


            if ($this->form_validation->run() == FALSE)
            {
                $this->nuevo();
            }
            else
            {
                //insertar la bitacora de seguridad
                $accion='Registro Nuevo Usuario';
                $session_id = $this->session->userdata('id');
                $host=$_SERVER['REMOTE_ADDR'];
                $fecha= date("Y-m-d H:i:s",time()-14400);
                $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
                $id_bitacora = $this->db->insert_id();
                //registro de un nuevo usuario

                $username = $this->input->post('username');
                $pass = $this->input->post('password');
                $email = $this->input->post('email');
                $estado='0';
                $super='0';
                $fecha=date("Y-m-d H:i:s",time()-16300);
                $insertar=$this->usuario_model->insert_usuario($username,$pass,$estado,$fecha,$super,$email);
                if($insertar)
                {

                    $cadena="("."'$username' ,"."'$estado' ,"."'$fecha' ,"."'$super' ,"."'$email' ,".")";
                    $name_tabla= 'usuario';
                    $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

                    $data['titulo'] = 'Lista de Usuarios';
                    $this->load->view('header', $data);
                    $dato['mensaje'] = "Usuario Registrado Correctamente";
                    $dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
                    $this->load->view('menu');
                    $this->load->view('usuario/listar_usuario',$dato);
                    $this->load->view('footer');
                }
                else
                {
                    $this->nuevo();
                }
            }

    }
    function modificar_cuenta()
    {
        $id=$this->session->userdata('id');
        $dato['consulta']=$this->usuario_model->select_usuario_id($id);
        $data['titulo'] = 'Modificar Cuenta';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $this->load->view('menu');
        $this->load->view('usuario/modificar_usuario',$dato);
        $this->load->view('footer');


    }
    function reg_cambio($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Correo Electronico', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_message('valid_email', 'El campo %s es Incorrecto');

        if ($this->form_validation->run() == FALSE)
        {
            $this->nuevo();
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Actualizar Datos de usuario';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            // modificar
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            $consulta=$this->usuario_model->get_usuario($id);
            if($consulta)
            {
                $nick1=$consulta[0]->nick;$estado1=$consulta[0]->estado;$fecha1=$consulta[0]->fecha_reg;$super1=$consulta[0]->super_user;$email1=$consulta[0]->email;
                $cadena1="("."'$nick1' ,"."'$estado1' ,"."'$fecha1' ,"."'$super1' ,"."'$email1' ,".")";
            }

            $update=$this->usuario_model->update_usuario($username,$email,$id);
            if($update)
            {
                $cadena2="("."'$username' ,"."'$estado1' ,"."'$fecha1' ,"."'$super1' ,"."'$email' ,".")";
                $name_tabla= 'usuario';
                $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);


                $data['titulo'] = 'Lista de Usuarios';
                $this->load->view('header', $data);
                $dato['mensaje'] = "";
                $dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
                $this->load->view('menu');
                $this->load->view('usuario/listar_usuario',$dato);
                $this->load->view('footer');
            }
            else
            {
                $this->nuevo();
            }
        }
    }
    function listar_usuarios()
    {
        $data['titulo'] = 'Lista de Usuarios';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
        $this->load->view('menu');
        $this->load->view('usuario/listar_usuario',$dato);
        $this->load->view('footer');
    }
    function pdf_listar_usuario()
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
        $pdf->SetFont('times', 'I', 14, '', true);


// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
        $consulta = $this->usuario_model->listar_usuarios();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->Cell(0, 0, 'NOMINA DE USUARIOS', 1, 1, 'C', 0, '', 0);

        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background-color: #efefef;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.8em}";
        $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background: none;line-height: 2;font-size: 0.7em;}";
        $html .= "</style>";
        $html .= "<br><br>";


        $html .= '<table width="740" aling="center">';
        $html .= '<tr><th width="40">Nro</th><th>Nombre de Usuario</th><th>Fecha de Registro</th><th>Estado</th><th>Administrador</th></tr>';

        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
        /* foreach ($institucion as $fila) {
             $id = $fila['i.nombre'];
             $localidad = $fila['i.direccion'];

             $html .= "<tr><td class='id'>" . $id . "</td><td class='localidad'>" . $localidad . "</td></tr>";
         }*/
        $num=1;
        foreach ($consulta as $fila) {
            $nombre = $fila->nick;
            $direccion = $fila->fecha_reg;
            if($fila->estado==1)
            {
                $estado='Usuario Activo';
            }
            else
            {

                $estado='Usuario Inactivo';
            }
            if($fila->super_user==1)
            {
                $adm='Administrador Activo';
            }
            else
            {
                $adm='Administrador Inactivo';
            }
            $html .= '<tr><td width="40" >' . $num++ . '</td><td>'.$nombre.'</td><td>' . $direccion . '</td><td>'.$estado.'</td><td>'.$adm.'</td></tr>';
        }

        $html .= "</table>";
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("institucion de pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
    function iniciar_sesion()
    {
        $data['titulo'] = 'Iniciar Sesion';
        $this->load->view('header', $data);
        $mensaje['mensaje'] = "";
        $this->load->view('menu');
        $this->load->view('usuario/iniciar_sesion',$mensaje);
        $this->load->view('footer');
    }
    function sesion_inic()
    {
        echo "220222";
        if(!isset($_POST['username']))
        {
            $this->load->view('login'); //si no recibimos datos por post, cargamos la vista del formulario
        }
        else
        {
            $this->form_validation->set_rules('username', 'Nombre de Usuario', 'trim|required|max_length[20]|min_length[5]|xss_clean');
            $this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|md5');
            $this->form_validation->set_message('required', "El Campo %s es Requerido");
            $this->form_validation->set_message('max_length', 'El campo %s debe tener  menos %s carácteres');
            $this->form_validation->set_message('min_length', 'El campo %s debe tener  mas %s carácteres');
            $pass = $this->input->post('pass');
                echo "*************".$pass;
                //return "";
            if ($this->form_validation->run() == FALSE)
            {
                $this->iniciar_sesion();
            }
            else
            {
                $username = $this->input->post('username');
                $pass = $this->input->post('pass');
                echo "*************".$pass;
                //return "22";
                $existe = $this->usuario_model->session_init($pass, $username);
                print_r($existe);
                echo "*******************/////";
                if($existe)
                {
                    $estado=$existe[0]->estado;
                    if($estado==1)
                    {
                        $permisos=$this->usuario_model->listar_permisos1($existe[0]->id);
                        $sessiondata = array(
                            'is_logued_in'  => TRUE,
                            'id' => $existe[0]->id,
                            'nick' => $existe[0]->nick,
                            'super' => $existe[0]->super_user,
                            'camion' => $existe[0]->estado,
                            'permisos'=>$permisos,
                        );
                        $this->session->set_userdata($sessiondata);
                        redirect('welcome/index', 'refresh');
                    }
                    else
                    {
                        $data['titulo'] = 'Iniciar Sesion';
                        $this->load->view('header', $data);
                        $mensaje['mensaje'] = "SU CUENTA ESTA INHABILITADA CONSULTE CON SU ADMINISTRADOR";
                        $this->load->view('menu');
                        $this->load->view('usuario/iniciar_sesion',$mensaje);
                        $this->load->view('footer');
                    }

                }
                else
                {
                    $data['titulo'] = 'Iniciar Sesion';
                    $this->load->view('header', $data);
                    $mensaje['mensaje'] = "USTED NO ESTA REGISTRADO O SUS DATOS SON INCORRECTOS";
                    $this->load->view('menu');
                    $this->load->view('usuario/iniciar_sesion',$mensaje);
                    $this->load->view('footer');
                }

            }
        }
    }
    function cerrar_sesion()
    {
            $this->session->sess_destroy();
            redirect('welcome/index');
    }
    function usu_activo()
    {
        $data['titulo'] = 'Usuarios Activos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_usuarios']=$this->usuario_model->listar_usu_activo();
        $this->load->view('menu');
        $this->load->view('usuario/usu_activo',$dato);
        $this->load->view('footer');
    }
    function usu_inactivo()
    {
        $data['titulo'] = 'Usuarios Inactivos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_usuarios']=$this->usuario_model->listar_usu_inactivo();
        $this->load->view('menu');
        $this->load->view('usuario/usu_inactivo',$dato);
        $this->load->view('footer');
    }
    function activar_usu($id)
    {
        //insertar la bitacora de seguridad
        $accion='Habilitar usuario';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();
        //habilitar usuario
        $consulta=$this->usuario_model->get_usuario($id);
        if($consulta)
        {
            $nick1=$consulta[0]->nick;$estado1=$consulta[0]->estado;$fecha1=$consulta[0]->fecha_reg;$super1=$consulta[0]->super_user;$email1=$consulta[0]->email;
            $cadena1="("."'$nick1' ,"."'$estado1' ,"."'$fecha1' ,"."'$super1' ,"."'$email1' ,".")";
        }

        $habilitar = $this->usuario_model->activar_usuario($id);
        if($habilitar)
        {
            $consulta=$this->usuario_model->get_usuario($id);

            $name_tabla= 'usuario';
            $nick2=$consulta[0]->nick;$estado2=$consulta[0]->estado;$fecha2=$consulta[0]->fecha_reg;$super2=$consulta[0]->super_user;$email2=$consulta[0]->email;
            $cadena2="("."'$nick2' ,"."'$estado2' ,"."'$fecha2' ,"."'$super2' ,"."'$email2' ,".")";
            $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

            $data['titulo'] = 'Usuarios Activos';
            $this->load->view('header', $data);
            $dato['mensaje'] = "El Usuario esta Activo :)";
            $dato['lista_usuarios']=$this->usuario_model->listar_usu_activo();
            $this->load->view('menu');
            $this->load->view('usuario/usu_activo',$dato);
            $this->load->view('footer');
        }
    }
    function inactivar_usu($id)
    {
        //insertar la bitacora de seguridad
        $accion='Inhabilitar Usuario';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();

        $consulta=$this->usuario_model->get_usuario($id);
        if($consulta)
        {
            $nick1=$consulta[0]->nick;$estado1=$consulta[0]->estado;$fecha1=$consulta[0]->fecha_reg;$super1=$consulta[0]->super_user;$email1=$consulta[0]->email;
            $cadena1="("."'$nick1' ,"."'$estado1' ,"."'$fecha1' ,"."'$super1' ,"."'$email1' ,".")";
        }
        // inhabilira
        $desabilitar = $this->usuario_model->inactivar_usuario($id);
        if($desabilitar)
        {
            $consulta=$this->usuario_model->get_usuario($id);
            $name_tabla= 'usuario';
            $nick2=$consulta[0]->nick;$estado2=$consulta[0]->estado;$fecha2=$consulta[0]->fecha_reg;$super2=$consulta[0]->super_user;$email2=$consulta[0]->email;
            $cadena2="("."'$nick2' ,"."'$estado2' ,"."'$fecha2' ,"."'$super2' ,"."'$email2' ,".")";
            $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

            $data['titulo'] = 'Usuarios Inactivos';
            $this->load->view('header', $data);
            $dato['mensaje'] = "El Usuario esta Inactivo :(";
            $dato['lista_usuarios']=$this->usuario_model->listar_usu_inactivo();
            $this->load->view('menu');
            $this->load->view('usuario/usu_inactivo',$dato);
            $this->load->view('footer');
        }
    }
    function administrador()
    {
        $data['titulo'] = 'Gestionar Administrador';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_usuarios']=$this->usuario_model->listar_usu_activo();
        $this->load->view('menu');
        $this->load->view('usuario/ges_administrador',$dato);
        $this->load->view('footer');
    }
    function activar_administrador()
    {
        //insertar la bitacora de seguridad

        // adminstrador
        $data['titulo'] = 'Gestionar Administrador';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_usuarios']=$this->usuario_model->listar_adm_activo();
        $this->load->view('menu');
        $this->load->view('usuario/listar_adm_activo',$dato);
        $this->load->view('footer');
    }
    function desac_administrador()
    {
        $data['titulo'] = 'Gestionar Administrador';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_usuarios']=$this->usuario_model->listar_adm_inactivo();
        $this->load->view('menu');
        $this->load->view('usuario/listar_adm_inactivo',$dato);
        $this->load->view('footer');
    }
    function inactivar_adm($id)
    {
        //insertar la bitacora de seguridad
        $accion='Inhabilitar como Administrador';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();

        $consulta=$this->usuario_model->get_usuario($id);
        if($consulta)
        {
            $nick1=$consulta[0]->nick;$estado1=$consulta[0]->estado;$fecha1=$consulta[0]->fecha_reg;$super1=$consulta[0]->super_user;$email1=$consulta[0]->email;
            $cadena1="("."'$nick1' ,"."'$estado1' ,"."'$fecha1' ,"."'$super1' ,"."'$email1' ,".")";
        }
        //inhabilirar
        $desabilitar = $this->usuario_model->inactivar_adm($id);
        if($desabilitar)
        {
            $consulta=$this->usuario_model->get_usuario($id);
            $name_tabla= 'usuario';
            $nick2=$consulta[0]->nick;$estado2=$consulta[0]->estado;$fecha2=$consulta[0]->fecha_reg;$super2=$consulta[0]->super_user;$email2=$consulta[0]->email;
            $cadena2="("."'$nick2' ,"."'$estado2' ,"."'$fecha2' ,"."'$super2' ,"."'$email2' ,".")";
            $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

            $data['titulo'] = 'Administrador Inactivos';
            $this->load->view('header', $data);
            $dato['mensaje'] = "El Adminstrador esta Inactivo :(";
            $dato['lista_usuarios']=$this->usuario_model->listar_adm_inactivo();
            $this->load->view('menu');
            $this->load->view('usuario/listar_adm_inactivo',$dato);
            $this->load->view('footer');
        }
    }
    function activar_adm($id)
    {
        $accion='Habilitar Como Administrador';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();

        $consulta=$this->usuario_model->get_usuario($id);
        if($consulta)
        {
            $nick1=$consulta[0]->nick;$estado1=$consulta[0]->estado;$fecha1=$consulta[0]->fecha_reg;$super1=$consulta[0]->super_user;$email1=$consulta[0]->email;
            $cadena1="("."'$nick1' ,"."'$estado1' ,"."'$fecha1' ,"."'$super1' ,"."'$email1' ,".")";
        }
        $desabilitar = $this->usuario_model->activar_adm($id);
        if($desabilitar)
        {
            $consulta=$this->usuario_model->get_usuario($id);
            $name_tabla= 'usuario';
            $nick2=$consulta[0]->nick;$estado2=$consulta[0]->estado;$fecha2=$consulta[0]->fecha_reg;$super2=$consulta[0]->super_user;$email2=$consulta[0]->email;
            $cadena2="("."'$nick2' ,"."'$estado2' ,"."'$fecha2' ,"."'$super2' ,"."'$email2' ,".")";
            $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

            $data['titulo'] = 'Administrador Inactivos';
            $this->load->view('header', $data);
            $dato['mensaje'] = "El Administrador esta Activo :)";
            $dato['lista_usuarios']=$this->usuario_model->listar_adm_activo();
            $this->load->view('menu');
            $this->load->view('usuario/listar_adm_activo',$dato);
            $this->load->view('footer');
        }
    }
    function gestionar_permisos()
    {
        $data['titulo'] = 'Gestionar Permisos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
        $this->load->view('menu');
        $this->load->view('usuario/gestion_permisos',$dato);
        $this->load->view('footer');
    }
    function asignar_permisos($id)
    {
        $data['titulo'] = 'Gestionar Permisos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['usuario']=$this->usuario_model->select_usuario_id($id);
        $dato['permisos']=$this->usuario_model->permisos_no_cliente($id);
        $dato['listar']=$this->usuario_model->usu_per_usuper($id);
        $this->load->view('menu');
        $this->load->view('usuario/asig_quit_permisos',$dato);
        $this->load->view('footer');
    }
    function guardar_permiso($usuario_id,$permiso_id)
    {
        //insertar la bitacora de seguridad
        $accion='Asignar Permiso';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();
        //guardar permiso
        $insertar=$this->usuario_model->guardar_permiso($usuario_id, $permiso_id);
        if($insertar)
        {
            $cadena="("."'$usuario_id' ,"."'$permiso_id' ,".")";
            $name_tabla= 'usuario_permisos';
            $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

            redirect("usuario/asignar_permisos/$usuario_id",'refresh');
        }
    }
    function eliminar_permiso($id,$usuario_id)
    {
        //insertar la bitacora de seguridad
        $accion='Quitar Permiso';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();
        // eliminar permiso
        $consulta=$this->usuario_model->get_permisos_id($id);
        if($consulta)
        {
            $id1=$consulta[0]->id;$usuario_id1=$consulta[0]->usuario_id;$permisos_id1=$consulta[0]->permisos_id;
            $cadena1="("."'$id1' ,"."'$usuario_id1' ,"."'$permisos_id1' ,".")";
            $name_tabla= 'usuario_permisos';
            $this->usuario_model->insertar_detalle($cadena1,$id_bitacora,$name_tabla);
        }
        $eliminar=$this->usuario_model->eliminar_permiso($id);
        if($eliminar)
        {
            redirect("usuario/asignar_permisos/$usuario_id",'refresh');
        }
        else
        {
            $this->nuevo();
        }
    }
    function listar_permisos()
    {
        $data['titulo'] = 'Permisos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_usuarios']=$this->usuario_model->listar_usuarios();
        $this->load->view('menu');
        $this->load->view('usuario/listar_usuario_permisos',$dato);
        $this->load->view('footer');
    }
    function ver_permisos($id)
    {
        $dato['usuario_id'] = $id;
        $data['titulo'] = 'Permisos de Usuario';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_permisos']=$this->usuario_model->listar_usuarios_permisos($id);
        $this->load->view('menu');
        $this->load->view('usuario/ver_permisos',$dato);
        $this->load->view('footer');
    }
    function modificar_contrasena()
    {
        $data['titulo'] = 'Modificar Constraseña';
        $this->load->view('header', $data);
        $mensaje['mensaje'] = "";
        $this->load->view('menu');
        $this->load->view('usuario/modificar_contrasena',$mensaje);
        $this->load->view('footer');
    }
    function update_contrasena()
    {
        //insertar la bitacora de seguridad
        $accion='Modificar Contraseña';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        //modificar contrase;a
        $this->form_validation->set_rules('password1', 'Password', 'required|md5');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_message('required', "El Campo %s es Requerido");
        $this->form_validation->set_message('matches', "los campos %s no coinciden");
        if ($this->form_validation->run() == FALSE)
        {
            $this->modificar_contrasena();
        }
        else
        {

                $session_id = $this->session->userdata('id');
                $passveri = $this->input->post('password1');
                $verficar=$this->usuario_model->verificar($session_id);
                foreach ($verficar as $veri)
                {
                    $igual=$veri->password;
                    if($igual==$passveri)
                    {
                        $passs = $this->input->post('password');
                        $actualizar=$this->usuario_model->updateconstrasena($passs,$session_id);
                        if($actualizar)
                        {
                            redirect("usuario/listar_usuarios",'refresh');
                        }
                    }
                    else
                    {
                        $data['titulo'] = 'Modificar Constraseña';
                        $this->load->view('header', $data);
                        $mensaje['mensaje'] = "Ingrese su contraseña Correctamente :(";
                        $this->load->view('menu');
                        $this->load->view('usuario/modificar_contrasena',$mensaje);
                        $this->load->view('footer');
                    }
                }
        }
    }
    function copias_seguridad()
    {

        $data['titulo'] = 'Copias de Seguridad';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $this->load->view('menu');
        $this->load->view('usuario/copias_seguridad',$dato);
        $this->load->view('footer');
    }
    function generar_backup()
    {
        //insertar la bitacora de seguridad
        $accion='Genero Copias de Seguridad';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        // genera copias de seguridad
        $host='localhost';
        $user='root';
        $pass='';
        $name='samcad-cnp_db';
        $tables = '*';
        $link = mysql_connect($host,$user,$pass);
        mysql_select_db($name,$link);
        $return= "";

        //get all of the tables
        if($tables == '*')
        {
            $tables = array();
            $result = mysql_query('SHOW TABLES');
            while($row = mysql_fetch_row($result))
            {
                $tables[] = $row[0];
            }
        }
        else
        {
            $tables = is_array($tables) ? $tables : explode(',',$tables);
        }

        //cycle through
        foreach($tables as $table)
        {
            $result = mysql_query('SELECT * FROM '.$table);
            $num_fields = mysql_num_fields($result);

            // $return.= 'DROP TABLE '.$table.';';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
            $return.= "\n\n".$row2[1].";\n\n";

            for ($i = 0; $i < $num_fields; $i++)
            {
                while($row = mysql_fetch_row($result))
                {
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                    for($j=0; $j<$num_fields; $j++)
                    {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = @ ereg_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j<($num_fields-1)) { $return.= ','; }
                    }
                    $return.= ");\n";
                }
            }
            $return.="\n\n\n";
        }
        $num = 1;
        //save file
        //$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).$num.'.sql','w+');
        $handle = fopen('samcad-cnp_db.sql','w+');
        $nombre = ('CocaCola_db.sql');
        //$nombre = ('db-backup-'.time().'-'.(md5(implode(',',$tables))).$num.'.sql');
        fwrite($handle,$return);
        fclose($handle);
        force_download($nombre,$return);
        //$this->ver_descarga();
        echo "se descargo correctamente";
    }
    function generar_bitacora()
    {
        $data['titulo'] = 'Lista de Usuarios';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_bitacora']=$this->usuario_model->listar_bitacora();
        $dato['lista_detalle']=$this->usuario_model->listar_detalle_bitacora();
        $this->load->view('menu');
        $this->load->view('usuario/listar_bitacora',$dato);
        $this->load->view('footer');
    }
    function list_clientes(){
        $data['titulo'] = 'Clientes Con Ventas';
        #$dato['clientes'] = $this->cliente_model->get_clientes();
        $dato['clientes'] = $this->cliente_model->clientes_no_usuario();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('usuario/list_cliente_usuario', $dato);
        $this->load->view('footer');
    }
    function crear_usuario_cliente($cliente_id){
        $cliente = $this->cliente_model->get_cliente($cliente_id);
        $fecha=date("Y-m-d H:i:s",time()-14400);
        $insertar=$this->usuario_model->insert_usuario_cliente($cliente[0]->ci,md5($cliente[0]->ci),0,$fecha,0,$cliente[0]->email, $cliente[0]->id);
        if($insertar){
            $this->usuario_model->actualizar_cliente_usuario($cliente_id);
        }
        $this->list_clientes();
    }
    function detalle_bitacora($id)
    {
        $data['titulo'] = 'Detalle Bitacora';
        $this->load->view('header', $data);
        $dato['lista_detalle']=$this->usuario_model->detalle_bitacora($id);
        $this->load->view('menu');
        $this->load->view('usuario/detalle_bitacora',$dato);
        $this->load->view('footer');
    }
}
?>