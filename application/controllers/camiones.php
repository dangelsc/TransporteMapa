<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camiones extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->_is_logued_in();
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->model('camiones_model');
        $this->load->model('empleado_model');
        $this->load->model('usuario_model');
        $this->load->helper('camiones_helper');
	}
    function _is_logued_in() {
        $is_logued_in = $this->session->userdata('is_logued_in');
        if($is_logued_in != TRUE)
        {
            redirect('/welcome/iniciar_sesion/', 'refresh');
        }
        else{
            if ($this->session->userdata('super') == false) {
                $si = false;
                foreach ($this->session->userdata('permisos') as $fila) {
                    if($fila->permisos_id == 3){
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
		$data['titulo'] = 'Camiones';
        $dato['camion'] = $this->camiones_model->get_camiones();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/index',$dato);
        $this->load->view('footer');
	}
	function new_camion(){
		$data['titulo'] = 'Registrar Camion';
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/new_camion');
        $this->load->view('footer');
	}
	function save_camion(){
		$this->form_validation->set_rules('placa','Placa de Camion','trim|required|is_unique[camion.placa]');
		$this->form_validation->set_rules('desc','Descripción','trim|required');
        
        $this->form_validation->set_message('required', "El Campo %s es Requerido");
        $this->form_validation->set_message('is_unique', "El Campo %s ya Esta Registrado");
        if ($this->form_validation->run() == FALSE)
        {
            $this->new_camion();
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Registro Nuevo Camion';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();

            // registro de camion
            $datestring = " %Y-%m-%d";
            $time = time(); 
            $fecha =  mdate($datestring, $time);
            $placa = $this->input->post('placa');
            $desc = $this->input->post('desc');
            $query = $this->camiones_model->insert_camion($placa, $desc, $fecha);

            if($query){

                $cadena="("."'$placa' ,"."'$desc' ,"."'$fecha' ,".")";
                $name_tabla= 'camion';
                $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);
                redirect("/camiones/detalle_camion/$query/", 'refresh');
            }
            else{
                $this->new_camion();
            }
        }
	}
	function detalle_camion($id){
		$data['titulo'] = 'Detalle de Camion';
		$dato['camion'] = $this->camiones_model->get_camion($id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/detalle_camion', $dato);
        $this->load->view('footer');
	}
    function list_update_camion(){
        $data['titulo'] = 'Modificar Camion';
        $dato['camion'] = $this->camiones_model->get_camiones();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/list_update_camion', $dato);
        $this->load->view('footer');
    }
    function update_camion($id){
        $data['titulo'] = 'Modificar Camion';
        $dato['camion'] = $this->camiones_model->get_camion($id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/update_camion', $dato);
        $this->load->view('footer');
    }
    function save_update($id){
        $this->form_validation->set_rules('placa','Placa de Camion','trim|required');
        $this->form_validation->set_rules('desc','Descripción','trim|required');
        
        $this->form_validation->set_message('required', "El Campo %s es Requerido");
        if ($this->form_validation->run() == FALSE)
        {
            $this->update_camion($id);
        }
        else
        {
            //insertar la bitacora de seguridad
            $accion='Actualizar Datos Camion';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            //DATOS PARA ACTUALIZR
            $placa = $this->input->post('placa');
            $desc = $this->input->post('desc');
            $consulta=$this->camiones_model->get_camion($id);
            if($consulta)
            {
                $placa1=$consulta[0]->placa;$desc1=$consulta[0]->descripcion;$fecha1=$consulta[0]->fecha_registro;
                $cadena1="("."'$placa1' ,"."'$desc1' ,"."'$fecha1' ,".")";
            }

            $query = $this->camiones_model->update_camion($id, $placa, $desc);
            if($query){
                $cadena2="("."'$placa' ,"."'$desc' ,"."'$fecha1' ,".")";
                $name_tabla= 'camion';
                $this->usuario_model->insertar_detalle1($cadena1, $cadena2,$id_bitacora,$name_tabla);
                redirect("/camiones/detalle_camion/$id/", 'refresh');
            }
            else{
                $this->update_camion($id);
            }
        }
    }
    function empleados(){
        $data['titulo'] = 'Nuestros Empleados';
        $dato['empleados'] = $this->empleado_model->get_empleados();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/empleados', $dato);
        $this->load->view('footer');
    }

    function buscar_camion(){
        $placa = $this->input->get('placa');
        $dato['placa'] = $placa;
        if($placa == ''){
             $query = $this->camiones_model->camiones_sin_asignados();
        }
        else{
            $query = $this->camiones_model->camiones_sin_asignados_placa($placa);
        }
        $data['titulo'] = 'Seleccionar Camion';
        $dato['camiones'] = $query;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/buscar_camion', $dato);
        $this->load->view('footer');
    }
    function buscar_empleado($camion_id){
        $ci = $this->input->get('ci');
        $dato['ci'] = $ci;
        if($ci == ''){
             $query = $this->empleado_model->empleados_sin_asignar();
        }
        else{
            $query = $this->empleado_model->empleados_sin_asignar_ci($ci);
        }
        $dato['empleados']= $query;
        $data['titulo'] = 'Seleccionar Empleado';
        $dato['camion'] = $this->camiones_model->get_camion($camion_id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/buscar_empleado', $dato);
        $this->load->view('footer');
    }
    function guardar_asignacion($empleado_id, $camion_id){
        $datestring = " %Y-%m-%d";
        $time = time(); 
        $fecha =  mdate($datestring, $time);
        $query = $this->camiones_model->save_asignacion($empleado_id, $camion_id, $fecha);
        if($query){
            //insertar la bitacora de seguridad
            $accion='Asignar Camion';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            $cadena="("."'$empleado_id' ,"."'$camion_id' ,"."'$fecha' ,".")";
            $name_tabla= 'empleado_camion';
            $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);
            //ASIGNACION
            redirect("/camiones/detalle_asignacion/$empleado_id/$camion_id", 'refresh');
        }
        else{
            $this->buscar_empleado($camion_id);
        }
    }
    function detalle_asignacion($empleado_id, $camion_id){
        $data['titulo'] = 'Detalle Asignacion';
        $dato['empleado'] = $this->empleado_model->get_empleado($empleado_id);
        $dato['camion'] = $this->camiones_model->get_camion($camion_id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/detalle_asignacion', $dato);
        $this->load->view('footer');
    }
    function list_empleados_asignados(){
        $data['titulo'] = 'Empleados Asignados';
        $dato['empleados'] = $this->empleado_model->empleados_asignados();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/list_empleados_asignados', $dato);
        $this->load->view('footer');
    }
    function list_movilidades_asignadas(){
        $data['titulo'] = 'Empleados Asignados';
        $dato['camiones'] = $this->camiones_model->camiones_asignados();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/list_vehiculos_asignados', $dato);
        $this->load->view('footer');
    }
    function list_asignaciones_terminar(){
        $data['titulo'] = 'Empleados Asignados';
        $dato['empleados'] = $this->empleado_model->empleados_asignados();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('camiones/list_asignaciones_terminar', $dato);
        $this->load->view('footer');
    }
    function terminar_asignacion($id){
        $query = $this->camiones_model->terminar_asignacion($id);
        if($query){
            //insertar la bitacora de seguridad
            $accion='Terminar Asignacion de Camion';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            // terminara asignacion
            redirect('/camiones/list_asignaciones_terminar/', 'refresh');
        }
        else{
            $this->list_asignaciones_terminar();
        }
    }
    function pdf_camiones()
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
        $consulta = $this->camiones_model->get_camiones();
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        $pdf->SetFont('times', 'BI', 14, '', true);
        $pdf->Cell(0, 0, 'NUESTROS CAMIONES', 0, 1, 'C', 0, '', 0);
        $pdf->SetFont('times', 'I', 14, '', true);
        $pdf->Cell(0, 0, '', 0, 1, 'L', 0, 0);
        $text='Nomina de Nuestros Camiones : ';
        $pdf->Cell(0, 0, $text, 0, 1, 'L', 0, 0);
        $pdf->SetFont('times', 'I', 11, '', true);
        $pdf->setX(30);
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{
                        padding: 5px 10px; 
                        border-bottom: #bbbbbb 5px solid; 
                        background-color: #efefef;
                        font-weight: 500; 
                        line-height: 2; 
                        text-align: left;
                        font-weight:bold;
                        font-size: 0.7em
                    }";
        $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid;border-left: #bbbbbb 1px solid;border-right: #bbbbbb 1px solid: background: none;line-height: 2;font-size: 0.8em;}";
        $html .= "</style>";
        $html .= "<br><br>";
        $html .= '<table width="1000" aling="left" background-color="red">';
        $html .= '<tr><th width="30">Nro</th><th  width="100" align="center">PLACA MOVILIDAD</th><th width="190" align="center">DESCRIPCION</th><th align="center">FECHA DE REGISTRO</th></tr>';
        $num=1;
        foreach ($consulta as $fila) {


            $html .= '<tr><td width="30" align="center">' . $num++ . '</td><td width="100" align="center">'.$fila->placa.'</td><td align="center">'.$fila->descripcion.'</td><td align="center">'.$fila->fecha_registro.'</td></tr>';
        }

        $html .= "</table>";
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("productos de pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
    function list_camiones_usuario($error = ''){
        $data['titulo'] = 'Empleados Asignados';
        $dato['empleados'] = $this->empleado_model->empleados_asignados_usuario();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('usuario/list_empleados_asignados', $dato);
        $this->load->view('footer');
    }
    function crear_usuario($id_empleado){
        $empleado = $this->empleado_model->get_empleado($id_empleado);
        $fecha=date("Y-m-d H:i:s",time()-16300);
        $insertar=$this->usuario_model->insert_usuario_camion($empleado[0]->ci,md5($empleado[0]->ci),0,$fecha,0,$empleado[0]->email, $empleado[0]->id);
        if($insertar){
            $this->empleado_model->actualizar_empleado_camion_usuario($empleado[0]->id);
            $data['titulo'] = 'Empleados Asignados';
            $dato['empleados'] = $this->empleado_model->empleados_asignados_usuario();
            $this->load->view('header', $data);
            $this->load->view('menu');
            $this->load->view('usuario/usuario_creado', $dato);
            $this->load->view('footer');
        }
        else{
            $this->list_camiones_usuario();
        }
    }
}

/* End of file camiones.php */
/* Location: ./application/controllers/camiones.php */