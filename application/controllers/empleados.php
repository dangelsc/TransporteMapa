<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->_is_logued_in();
		$this->load->library('form_validation');
		$this->load->model('empleado_model');
        $this->load->model('usuario_model');
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
                    if($fila->permisos_id == 2){
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
		$data['titulo'] = 'Empleados';
        $dato['empleados'] = $this->empleado_model->get_empleados();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('empleados/index', $dato);
        $this->load->view('footer');
	}
	function new_empleado(){
		$data['titulo'] = 'Nuevo Empleados';
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('empleados/new_empleado');
        $this->load->view('footer');
	}
	function save_empleado(){
		$this->form_validation->set_rules('ci','Cedula','trim|required|is_unique[empleados.ci]|max_length[8]|min_length[7]|integer');
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
            $this->new_empleado();
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Registro Nuevo Empleado';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            //registro de datos de empleado
            $ci = $this->input->post('ci');
            $nombre = $this->input->post('nombre');
            $paterno = $this->input->post('paterno');
            $materno = $this->input->post('materno');
            $direccion = $this->input->post('direccion');
            $fono = $this->input->post('fono');
            $fecha = $this->input->post('fecha');
            $email = $this->input->post('email');
            $query = $this->empleado_model->insert_empleado($ci, $nombre, $paterno, $materno, $direccion, $fono, $fecha, $email);
            if($query > 0){
                $cadena="("."'$ci' ,"."'$nombre' ,"."'$paterno' ,"."'$materno' ,"."'$direccion' ,"."'$fono' ,"."'$email' ,"."'$fecha' ,".")";
                $name_tabla= 'empleados';
                $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

                redirect("empleados/detalle_empleado/$query", 'refresh');
            }
            else{
                $this->new_empleado();
            }
        }
	}
	function detalle_empleado($id){
		$data['titulo'] = 'Detalle Empleados';
		$dato['empleado'] = $this->empleado_model->get_empleado($id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('empleados/detalle_empleado', $dato);
        $this->load->view('footer');
	}
	function list_empleados_modificar(){
		$data['titulo'] = 'Modificar Empleados';
		$dato['empleados'] = $this->empleado_model->get_empleados();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('empleados/list_modificar_empleado', $dato);
        $this->load->view('footer');
	}
	function modificar_empleado($id){
		$data['titulo'] = 'Modificar Empleado';
		$dato['empleado'] = $this->empleado_model->get_empleado($id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('empleados/update_empleado', $dato);
        $this->load->view('footer');
	}
	function save_empleado_update($id){
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
        $this->form_validation->set_message('valid_email', 'Introdusca Una Direccion De Correo Electronico Correcto');

        if ($this->form_validation->run() == FALSE)
        {
            $this->modificar_empleado($id);
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Actulizar datos Empleado';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            // datos para modificar
            $ci = $this->input->post('ci');
            $nombre = $this->input->post('nombre');
            $paterno = $this->input->post('paterno');
            $materno = $this->input->post('materno');
            $direccion = $this->input->post('direccion');
            $fono = $this->input->post('fono');
            $fecha = $this->input->post('fecha');
            $email = $this->input->post('email');
            $consulta=$this->empleado_model->get_empleado($id);
            if($consulta)
            {
                $ci1=$consulta[0]->ci;$nombre1=$consulta[0]->nombre;$paterno1=$consulta[0]->paterno;$materno1=$consulta[0]->materno;$direccion1=$consulta[0]->direccion;$fono1=$consulta[0]->fono;$email1=$consulta[0]->email;$fecha1=$consulta[0]->fecha_nacimiento;
                $cadena1="("."'$ci1' ,"."'$nombre1' ,"."'$paterno1' ,"."'$materno1' ,"."'$direccion1' ,"."'$fono1' ,"."'$email1' ,"."'$fecha1' ,".")";
            }
            $query = $this->empleado_model->update_empleado($id, $ci, $nombre, $paterno, $materno, $direccion, $fono, $fecha, $email);
            if($query){
                $cadena2="("."'$ci' ,"."'$nombre' ,"."'$paterno' ,"."'$materno' ,"."'$direccion' ,"."'$fono' ,"."'$email' ,"."'$fecha' ,".")";
                $name_tabla= 'empleados';
                $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);

                redirect("empleados/detalle_empleado/$id", 'refresh');
            }
            else{
                $this->modificar_empleado($id);
            }
        }
	}
    function pdf_empleado()
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
        $consulta = $this->empleado_model->get_empleados();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->SetFont('times', 'BI', 14, '', true);
        $pdf->Cell(0, 0, 'NUESTROS EMPLEADOS', 0, 1, 'C', 0, '', 0);
        $pdf->SetFont('times', 'I', 14, '', true);
        $pdf->Cell(0, 0, '', 0, 1, 'L', 0, 0);
        $text='Nomina de Nuestros Empleados : ';
        $pdf->Cell(0, 0, $text, 0, 1, 'L', 0, 0);
        $pdf->SetFont('times', 'I', 11, '', true);
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background-color: #efefef;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.7em}";
        $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid: background: none;line-height: 2;font-size: 0.8em;}";
        $html .= "</style>";
        $html .= "<br><br>";
        $html .= '<table width="740" aling="center">';
        $html .= '<tr><th width="30">Nro</th><th  width="90" align="center">CEDULA</th><th width="200" align="center">NOMBRE COMPLETO</th><th align="center">DIRECCION</th><th width="80" align="center">TELEFONO</th><th  width="130" align="center">FECHA DE NACIMIENTO</th></tr>';
        $num=1;
        foreach ($consulta as $fila) {


            $html .= '<tr><td width="30" align="center">' . $num++ . '</td><td width="100" align="center">'.$fila->ci.'</td><td align="center">'.$fila->paterno.' '.$fila->materno.' '.$fila->nombre.'</td><td align="center">'.$fila->direccion.'</td><td align="center">'.$fila->fono.'</td><td  width="120" align="center">'.$fila->fecha_nacimiento.'</td></tr>';
        }

        $html .= "</table>";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("productos de pdf");
        $pdf->Output($nombre_archivo, 'I');
    }



}

/* End of file empleados.php */
/* Location: ./application/controllers/empleados.php */