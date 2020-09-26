<?php
class Cliente extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->_is_logued_in();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('cliente_model');
        $this->load->model('usuario_model');
        $this->load->helper('usuario_helper');
        $this->load->helper('date');
        $this->load->model('observacion_model');
        $this->load->model('zona_model');
        $this->load->helper('clientes_helper');
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
                    if($fila->permisos_id == 1){
                        $si = TRUE;
                        break;
                    }
                }
                if($si == false){
                    echo "<script>alert('no tiene acceso');</script>";
                    redirect("/welcome/", 'refresh');
                }
            }
        }
    }
    function index(){
        $data['titulo'] = 'Clientes';
        $dato['clientes'] = $this->cliente_model->get_clientes();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/index', $dato);
        $this->load->view('footer');
    }
    function new_zona(){
        $data['titulo'] = 'Registro de Zona';
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/new_zona');
        $this->load->view('footer');
    }
    function save_zona(){
        $this->form_validation->set_rules('zona', 'Nombre de Zona', 'trim|required|is_unique[zonas.nombre]');

        $this->form_validation->set_message('required', "El Campo %s es Requerido");
        $this->form_validation->set_message('is_unique', "El %s Ya Esta Registrado");
        
        if ($this->form_validation->run() == FALSE){
            $this->new_zona();
        }
        else{
            $zona = $this->input->post('zona');
            $query = $this->zona_model->insert_zona($zona);
            if($query){
                redirect("/cliente/", 'refresh');
            }
            else{
                $this->new_zona();
            }
        }
    }
    function new_cliente(){
        $data['titulo'] = 'Registro Cliente';
        $dato['zonas'] = $this->zona_model->get_zonas();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/new_cliente', $dato);
        $this->load->view('footer');
    }
    function save_cliente(){
        $this->form_validation->set_rules('ci','Cedula','trim|required|is_unique[cliente.ci]|max_length[8]|min_length[7]|integer');
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('paterno', 'Ap. Paterno', 'trim|required');
        $this->form_validation->set_rules('materno', 'Ap. Materno', 'trim|required');
        $this->form_validation->set_rules('fono', 'Telfono/Celular', 'trim|required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
        $this->form_validation->set_rules('fecha', 'Fecha Nacimiento', 'trim|required');
        $this->form_validation->set_rules('email', 'Correo Electronico', 'trim|required|valid_email');

        $this->form_validation->set_message('required', "El Campo %s es Requerido");
        $this->form_validation->set_message('is_unique', 'Su %s ya Esta Registrado');
        $this->form_validation->set_message('min_length', 'El Campo %s debe tener %d caracteres');
        $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
        $this->form_validation->set_message('valid_email', 'Introduzca Una Direccion De Correo Electronico Correcto');

        if ($this->form_validation->run() == FALSE)
        {
            $this->new_cliente();
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Registro Nuevo Cliente';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();

            //insertar los datos del cliente

            $ci = $this->input->post('ci');
            $nombre = $this->input->post('nombre');
            $paterno = $this->input->post('paterno');
            $materno = $this->input->post('materno');
            $direccion = $this->input->post('direccion');
            $fono = $this->input->post('fono');
            $fecha = $this->input->post('fecha');
            $email = $this->input->post('email');
            $tipo = $this->input->post('tipo');
            $latitud = $this->input->post('latitud');
            $longitud = $this->input->post('longitud');
            $zona = $this->input->post('zona');
            $query = $this->cliente_model->insert_cliente($ci, $nombre, $paterno, $materno, $direccion, $fono, $fecha, $tipo, $email, $latitud, $longitud, $zona);
            if($query > 0){
                $cadena="("."'$ci' ,"."'$nombre' ,"."'$paterno' ,"."'$materno' ,"."'$direccion' ,"."'$fono' ,"."'$fecha' ,"."'$tipo' ,"."'$email' ,"."'$latitud' ,"."'$longitud' ,"."'$zona'".")";
                $name_tabla= 'cliente';
                $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);
                redirect("cliente/detalle_cliente/$query", 'refresh');
            }
            else{
                $this->new_cliente();
            }
        }
    }
    function detalle_cliente($id){
        $data['titulo'] = 'Detalle Cliente';
        $cliente = $this->cliente_model->get_cliente($id);
        $dato['cliente'] = $cliente;
        $dato['zona'] = $this->zona_model->get_zona($cliente[0]->zona_id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/show_cliente', $dato);
        $this->load->view('footer');
    }
    function pdf_detalle_cliente($id)
    {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
       
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
        $cliente = $this->cliente_model->get_cliente($id);
        //$dato['cliente'] = $cliente;
        $consulta = $this->zona_model->get_zona($cliente[0]->zona_id);

//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->Cell(0, 0, 'DETALLE DEL CLIENTE', 0, 1, 'C', 0, '', 0);

       foreach ( $cliente as $fila)
        {
            $latitud=$fila->latitud;
            $longitud=$fila->longitud;
            $imagen = "http://maps.google.com/maps/api/staticmap?sensor=false&center=" + $latitud + "," +
            $longitud + "&zoom=16&size=300x400&markers=color:red|label:P|" +
            $latitud + ',' + $longitud;

            //$imagen=$fila->avatar;
            $pdf->Image($imagen, 83, 40, 40, 55, '', '', 'T', false, 300, false, false, false, false, false, false, false);
            $pdf->SetY(105);
            $pdf->SetX(60);
            $pdf->SetFont('times', 'I', 12);
            $html = '';
            $html .= "<style type=text/css>";
            $html .= "th{padding: 5px 10px; border-bottom: #cccbbb 1px solid; background-color: #FD5454;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.9em}";
            $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid: background: none;line-height: 2;font-size: 0.9em;}";
            $html .= "</style>";
            $html .= "<br><br>";
            $html .= '<table width="740" aling="center">';

                if($consulta)
                {
                    foreach ($consulta as $consu) {
                            $zona=$consu->nombre;
                    }

                }

                $html .= '<tr><th td width="200">'.'Cedula de Identidad :'.'</th><td>'.$fila->ci.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Nombre Completo :'.'</th><td>'.$fila->paterno.' '.$fila->materno.' '.$fila->nombre.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Direccion:'.'</th><td>'.$fila->direccion.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Telefono Celular :'.'</th><td>'.$fila->fono.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Tipo de Cliente :'.'</th><td>'.$fila->tipo.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Correro Electronico :'.'</th><td>'.$fila->email.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Fecha de Nacimiento :'.'</th><td>'.$fila->fecha.'</td></tr>';
                $html .= '<tr><th td width="200">'.'Zona a la que Pertenece :'.'</th><td>'.$zona.'</td></tr>';





        }

// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("productos de pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
    function listado_cliente_update(){
        $data['titulo'] = 'Listado Clientes';
        $dato['clientes'] = $this->cliente_model->get_clientes();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/listado_clientes_update', $dato);
        $this->load->view('footer');
    }

    function update_cliente($id){
        $data['titulo'] = 'Modificar Cliente';
        $dato['cliente'] = $this->cliente_model->get_cliente($id);
        $dato['zonas'] = $this->zona_model->get_zonas();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/update_cliente', $dato);
        $this->load->view('footer');    
    }

    function update_save_clieten($id){
        $this->form_validation->set_rules('ci','Cedula','trim|required|max_length[8]|min_length[7]|integer');
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('paterno', 'Ap. Paterno', 'trim|required');
        $this->form_validation->set_rules('materno', 'Ap. Materno', 'trim|required');
        $this->form_validation->set_rules('fono', 'Telfono/Celular', 'trim|required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
        $this->form_validation->set_rules('fecha', 'Fecha Nacimiento', 'trim|required');
        $this->form_validation->set_rules('email', 'Correo Electronico', 'trim|required|valid_email');

        $this->form_validation->set_message('required', "El Campo %s es Requerido");
        $this->form_validation->set_message('is_unique', 'Su %s ya Esta Registrado');
        $this->form_validation->set_message('min_length', 'El Campo %s debe tener %d caracteres');
        $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
        $this->form_validation->set_message('valid_email', 'Introdusca Una Direccion De Correo Electronico Correcto');

        if ($this->form_validation->run() == FALSE)
        {
            $this->update_cliente($id);
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Actualizar Datos Cliente';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();

            //datos para actualizar
            $ci = $this->input->post('ci');
            $nombre = $this->input->post('nombre');
            $paterno = $this->input->post('paterno');
            $materno = $this->input->post('materno');
            $direccion = $this->input->post('direccion');
            $fono = $this->input->post('fono');
            $fecha = $this->input->post('fecha');
            $email = $this->input->post('email');
            $tipo = $this->input->post('tipo');
            $latitud = $this->input->post('latitud');
            $longitud = $this->input->post('longitud');
            $zona = $this->input->post('zona');
            $consulta=$this->cliente_model->get_cliente($id);
            if($consulta)
            {
                $ci1=$consulta[0]->ci;$paterno1=$consulta[0]->paterno;$materno1=$consulta[0]->materno;$nombre1=$consulta[0]->nombre;$direccion1=$consulta[0]->direccion;$fono1=$consulta[0]->fono;$fecha1=$consulta[0]->fecha;$email1=$consulta[0]->email;$latitud1=$consulta[0]->latitud;$longitud1=$consulta[0]->longitud;$zona1=$consulta[0]->zona_id;$tipo1=$consulta[0]->tipo;
                $cadena1="("."'$ci1' ,"."'$nombre1' ,"."'$paterno1' ,"."'$materno1' ,"."'$direccion1' ,"."'$fono1' ,"."'$fecha1' ,"."'$tipo1' ,"."'$email1' ,"."'$latitud1' ,"."'$longitud1' ,"."'$zona1'".")";
            }
            $query = $this->cliente_model->update_cliente($id, $ci, $nombre, $paterno, $materno, $direccion, $fono, $fecha, $tipo, $email, $latitud, $longitud, $zona);
            if($query){
                $cadena2="("."'$ci' ,"."'$nombre' ,"."'$paterno' ,"."'$materno' ,"."'$direccion' ,"."'$fono' ,"."'$fecha' ,"."'$tipo' ,"."'$email' ,"."'$latitud' ,"."'$longitud' ,"."'$zona'".")";
                $name_tabla= 'cliente';
                $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

                redirect("cliente/detalle_cliente/$query", 'refresh');
                redirect("/cliente/detalle_cliente/$id", 'refresh');
            }
            else{
                $this->update_cliente($id);
            }

        }
    }

    function listado_clientes(){
        $data['titulo'] = 'Listado Clientes';
        $dato['clientes'] = $this->cliente_model->get_clientes();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/listado_clientes', $dato);
        $this->load->view('footer');
    }

    function listado_clientes_tipo($tipo = ''){
        if ($tipo == ''){
            $dato['clientes'] = $this->cliente_model->get_clientes();
        }
        else{
            $dato['clientes'] = $this->cliente_model->get_where_clientes($tipo);
        }
        $data['titulo'] = "Listado Clientes|$tipo";
        $dato['tipo']=$tipo;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/listado_clientes_tipo', $dato);
        $this->load->view('footer');
    }
    function listado_clientes_observacion(){
        $data['titulo'] = 'Listado Clientes';
        $dato['clientes'] = $this->cliente_model->get_clientes();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/listado_clientes_observacion', $dato);
        $this->load->view('footer');
    }
    function new_observacion($id){
        $data['titulo'] = 'Registro Observacion';
        $dato['cliente'] = $this->cliente_model->get_cliente($id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/new_observacion', $dato);
        $this->load->view('footer');
    }
    function save_observacion($id){
        $this->form_validation->set_rules('obs','Observación','trim|required');
        
        $this->form_validation->set_message('required', "El Campo %s es Requerido");
        if ($this->form_validation->run() == FALSE)
        {
            $this->new_observacion($id);
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Registro de Observaciones';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            // datos de observaciones
            $datestring = " %Y-%m-%d";
            $time = time(); 
            $fecha =  mdate($datestring, $time);
            $obs = $this->input->post('obs');
            $query = $this->observacion_model->insert_obs($id, $obs, $fecha);
            if($query){
                $cadena="("."'$id' ,"."'$obs' ,"."'$fecha' ,".")";
                $name_tabla= 'obs_cliente';
                $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);


                redirect("/cliente/listado_clientes_observacion", 'refresh');
            }
            else{
                $this->new_observacion($id);
            }
        }
    }
    function listado_clientes_observaciones(){
        $data['titulo'] = 'Observaciones Clientes';
        $dato['clientes'] = $this->cliente_model->clientes_observaciones();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/listado_clientes_observaciones', $dato);
        $this->load->view('footer');    
    }
    function view_observaciones_cliente($id){
        $data['titulo'] = 'Observaciones CLiente';
        $dato['cliente'] = $this->cliente_model->get_cliente($id);
        $dato['obs_cliente'] = $this->observacion_model->obs_cliente($id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/observaciones_cliente', $dato);
        $this->load->view('footer');
    }
    function listado_clientes_bloquear(){
        $data['titulo'] = 'Bloquear Clientes';
        $dato['clientes'] = $this->cliente_model->clientes_observaciones();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/listado_clientes_block', $dato);
        $this->load->view('footer');   
    }
    function bloquear($id){
        $query = $this->cliente_model->bloquear_cliente($id);
        if($query){
            //insertar la bitacora de seguridad
            $accion='Bloqueo de cliente';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            //datos para Bloquear
            redirect('/cliente/listado_clientes_bloquear', 'refresh');
        }
        else
        {
            $this->listado_clientes_bloquear();
        }
    }
    function desbloquear($id){
        $query = $this->cliente_model->desbloquear_cliente($id);
        if($query){
            //insertar la bitacora de seguridad
            $accion='Desbloqueo de Cliente';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            // datos propios
            redirect('/cliente/listado_clientes_bloquear', 'refresh');
        }
        else
        {
            $this->listado_clientes_bloquear();
        }
    }
    function ruta_clientes(){
        $data['titulo'] = 'Listado Clientes';
        $dato['clientes'] = $this->cliente_model->get_clientes();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('clientes/ruta_clientes', $dato);
        $this->load->view('footer');
    }
    function pdf_clientes()
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
        $consulta = $this->cliente_model->get_clientes();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->SetFont('times', 'BI', 14, '', true);
        $pdf->Cell(0, 0, 'NUESTROS CLIENTES', 0, 1, 'C', 0, '', 0);
        $pdf->SetFont('times', 'I', 14, '', true);
        $pdf->Cell(0, 0, '', 0, 1, 'L', 0, 0);
        $text='Nomina de Nuestros Clientes : ';
        $pdf->Cell(0, 0, $text, 0, 1, 'L', 0, 0);
        $pdf->SetFont('times', 'I', 11, '', true);
        $html = '';
        $html .= "<style type=text/css>";
        $html .= ".pdfViewer{border-bottom: #bbbbbb 144px solid;}";
        $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 144px solid; background-color: #FF7272;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.7em}";
        $html .= "td{padding: 5px 5px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid; background: none;line-height: 2;font-size: 0.8em;}";
        $html .= "</style>";
        $html .= "<br><br>";
        $html .= '<table width="740" aling="center">';
        $html .= '<tr><th width="30">Nro</th><th  width="100" align="center">CEDULA</th><th width="190" align="center">NOMBRE COMPLETO</th><th align="center">DIRECCION</th><th width="130" align="center">TELEFONO/CELULAR</th><th  width="60" align="center">TIPO</th></tr>';
        $num=1;
        foreach ($consulta as $fila) {


            $html .= '<tr><td width="30" align="center">' . $num++ . '</td><td width="100" align="center">'.$fila->ci.'</td><td align="center">'.$fila->paterno.' '.$fila->materno.' '.$fila->nombre.'</td><td align="center">'.$fila->direccion.'</td><td align="center">'.$fila->fono.'</td><td align="center">'.$fila->tipo.'</td></tr>';
        }

        $html .= "</table>";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("productos de pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
}