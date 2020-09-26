<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->_is_logued_in();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('form','url');
        $this->load->helper('productos_helper');
        $this->load->helper('date');
        $this->load->model('productos_model');
        $this->load->model('cliente_model');
        $this->load->model('reservas_model');
        $this->load->model('empleado_model');
        $this->load->model('camiones_model');
        $this->load->model('ventas_model');
        $this->load->model('zona_model');
        $this->load->model('posiciones_model');
        $this->load->model('horarios_model');
        $this->load->helper('clientes_helper');
        $this->load->helper('reservas_helper');
        $this->load->helper('camiones_helper');
        $this->load->helper('ventas_helper');
        $this->load->model('usuario_model');
    }
    function _is_logued_in(){
        $is_logued_in = $this->session->userdata('is_logued_in');
        if($is_logued_in != TRUE)
        {
            echo "<script>alert('no tiene acseso');</script>";
            redirect("/welcome/", 'refresh');   
        }
    }
    function index()
    {
        $data['titulo'] = 'Productos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['productos']=$this->productos_model->listar_productos();
        $this->load->view('menu');
        $this->load->view('reservas/index',$dato);
        $this->load->view('footer');
    }
    function detalle_producto($id){
    	$data['titulo'] = 'Detalle de Productos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_productos']=$this->productos_model->listar_productos_id($id);
        $this->load->view('menu');
        $this->load->view('reservas/detalle_producto',$dato);
        $this->load->view('footer');
    }
    function list_clientes(){
    	$data['titulo'] = 'Nuestros Clientes';
    	$dato['ci'] = $ci = $this->input->get('ci');
    	$dato['tipo'] = $tipo = $this->input->get('tipo');
        $dato['clientes'] = $this->reservas_model->buscar_clientes($ci, $tipo);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/listado_clientes', $dato);
        $this->load->view('footer');
    }
    function new_venta($cliente_id){
    	$datestring = " %Y-%m-%d";
        $now = time() - 14400;
        $fecha =  mdate($datestring, $now);
        $id = $this->reservas_model->create_reserva($fecha, $cliente_id);
        if($id){
            //insertar la bitacora de seguridad
            $accion='Crear una Reserva';
            $session_id = $this->session->userdata('id');
            $host=$_SERVER['REMOTE_ADDR'];
            $fecha= date("Y-m-d H:i:s",time()-14400);
            $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
            $id_bitacora = $this->db->insert_id();
            $cadena="("."'$fecha' ,"."'$cliente_id' ,".")";
            $name_tabla= 'almacen';
            $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

            // crear reserva
        	redirect("/reservas/seleccion_productos/$cliente_id/$id", 'refresh');
        }
        else{
        	$this->list_clientes();
        }
    }
    function seleccion_productos($cliente_id, $reserva_id){
    	$data['titulo'] = 'Productos';
        $dato['mensaje'] = "";
        $dato['productos']=$this->reservas_model->productos_a_reservar($reserva_id);
        $dato['productosr']=$this->reservas_model->productos_reservados($reserva_id);
        $dato['cliente_id'] = $cliente_id;
        $dato['reserva_id'] = $reserva_id;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/seleccion_productos',$dato);
        $this->load->view('footer');
    }
    function stock_producto($cliente_id, $reserva_id, $producto_id){
    	$data['titulo'] = 'Reservar Producto';
        $dato['mensaje'] = "";
        $dato['producto']=$this->productos_model->listar_productos_id($producto_id);
        $dato['productosr']=$this->reservas_model->productos_reservados($reserva_id);
        $dato['cliente_id'] = $cliente_id;
        $dato['reserva_id'] = $reserva_id;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/reservar_producto',$dato);
        $this->load->view('footer');
    }
    function add_producto($cliente_id, $reserva_id, $producto_id){
    	$cantidad = $this->input->post('cantidad');
    	$si = $this->reservas_model->create_detalle($reserva_id, $producto_id, $cliente_id, $cantidad);
    	if($si){
    		redirect("/reservas/seleccion_productos/$cliente_id/$reserva_id", 'refresh');
    	}
    	else{
    		$this->stock_producto($cliente_id, $reserva_id, $producto_id);
    	}
    }
    function modificar_cantidad($cliente_id, $reserva_id, $producto_id, $detalle_id){
    	$data['titulo'] = 'Modificar Cantidad Producto';
        $dato['mensaje'] = "";
        $dato['producto'] = $this->productos_model->listar_productos_id($producto_id);
        $dato['productosr']=$this->reservas_model->productos_reservados($reserva_id);
        $dato['detalle'] = $this->reservas_model->get_detalle_reserva_id($detalle_id);
        $dato['cliente_id'] = $cliente_id;
        $dato['reserva_id'] = $reserva_id;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/modificar_cantidad',$dato);
        $this->load->view('footer');
    }
    public function verificar_cantidad(){
    	$id = $this->input->get('almacen');
    	$cantidad = $this->input->get('cantidad');
    	$almacen = $this->reservas_model->almacen_producto($id);
    	$stock = $almacen[0]->stock;
    	if($cantidad > $stock){
    		echo 'si';
    	}
    	else{
    		echo 'no';
    	}
    }
    function cancelar_reserva($reserva_id){
        //insertar la bitacora de seguridad
        $accion='Cancelar Reserva';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        //cancelar reserva
    	$this->reservas_model->cancelar_reserva($reserva_id);

    	redirect('/reservas/', 'refresh');
    }
    function quitar_producto($producto_id, $reserva_id, $cliente_id){
        //insertar la bitacora de seguridad
        $accion='Registro Quitar Producto';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        //quitar producto
    	$this->reservas_model->quitar_producto($reserva_id, $producto_id);
    	redirect("/reservas/seleccion_productos/$cliente_id/$reserva_id", 'refresh');
    }
    function confirmar_reserva($reserva_id, $cliente_id){
        //insertar la bitacora de seguridad
        $accion='Confirmar Reserva';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);

        //confirmar reserva
    	$query = $this->reservas_model->confirmar_reserva($reserva_id);
    	if($query){
    		//reserva confirmada
    		redirect("/reservas/reserva_realizada/$reserva_id", 'refresh');
    	}
    	else{
    		$this->seleccion_productos($cliente_id, $reserva_id);
    	}
    }
    function reserva_realizada($reserva_id){
    	//echo 'Reserva Realizada';
    	$data['titulo'] = 'Reserva Realizada';
    	$reserva = $this->reservas_model->get_reserva($reserva_id);
    	$cliente = $this->cliente_model->get_cliente($reserva[0]->cliente_id);
    	$detalle = $this->reservas_model->get_detalle_reserva($reserva_id);
    	$dato['reserva'] = $reserva;
    	$dato['cliente'] = $cliente;
    	$dato['detalle'] = $detalle;
		$this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/reserva_realizada',$dato);
        $this->load->view('footer');
    }
    function list_reservas_confirmadas(){
    	$data['titulo'] = 'Listado de Reservas Realizadas';
    	$fecha = $this->input->get('fecha');
    	if ($fecha == '') {
	    	$datestring = " %Y-%m-%d";
	        $now = time() - 14400;
	        $fecha =  mdate($datestring, $now);
    	}
    	$dato['fecha'] = $fecha;
    	$dato['clientes'] = $this->reservas_model->clientes_con_reserva_confirmada($fecha);
    	$this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/list_reservas_realizadas', $dato);
        $this->load->view('footer');
    }
    function list_reservas_sin_confirmar(){
    	$data['titulo'] = 'Listado de Reservas No Realizadas';
    	$fecha = $this->input->get('fecha');
    	if ($fecha == '') {
	    	$datestring = " %Y-%m-%d";
	        $now = time() - 14400;
	        $fecha =  mdate($datestring, $now);
    	}
    	$dato['fecha'] = $fecha;
    	$dato['clientes'] = $this->reservas_model->clientes_con_reserva_noconfirmada($fecha);
    	$this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/list_reservas_sin_confirmar', $dato);
        $this->load->view('footer');
    }
    function list_reserva_venta(){
        $data['titulo'] = 'Listado de Reservas Realizadas';
        $fecha = $this->input->get('fecha');
        if ($fecha == '') {
            $datestring = " %Y-%m-%d";
            $now = time() - 14400;
            $fecha =  mdate($datestring, $now);
        }
        else{
            $fecha = $fecha." 00:00:00";
        }
        $dato['fecha'] = $fecha;
        $dato['clientes'] = $this->reservas_model->clientes_con_reserva_confirmada($fecha);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/list_reservas_realizadas_venta', $dato);
        $this->load->view('footer');
    }
    function create_venta_reserva($reserva_id){
        $datestring = " %Y-%m-%d";
        $now = time() - 14400;
        $fecha =  mdate($datestring, $now);
        $datestring = " %h:%i";
        $hora = mdate($datestring, $now);
        //echo $hora;
        $user_id=$this->session->userdata('id');
        $venta_id = $this->reservas_model->create_venta_reserva($reserva_id, $fecha, $user_id, $hora);
        redirect("reservas/ver_detalle_venta/$venta_id",'refresh');
        //hacer la parte de ventas aqui para terminar
    }
    function ver_detalle_venta($ventas_id)
    {
        $banear=$this->ventas_model->banear_venta($ventas_id);
        if($banear)
        {
            $sacar_id=$this->ventas_model->get_venta($ventas_id);
            foreach($sacar_id as $lista)
            {
                $cliente_id=$lista->cliente_id;
            }
            $dato['cliente_id'] = $cliente_id;
            $data['titulo'] = 'Detalle de la Venta';
            $dato['mensaje'] = "";
            $dato['detalle']=$this->ventas_model->listar_detalle($ventas_id);
            $dato['ventas_id'] = $ventas_id;
            $this->load->view('header', $data);
            $this->load->view('menu');
            $this->load->view('reservas/detalle_venta',$dato);
            $this->load->view('footer');
        }
    }

    function seleccion_vehiculo_asignacion(){
        $data['titulo'] = 'Empleados Asignados';
        $dato['empleados'] = $this->empleado_model->empleados_asignados();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/list_empleados_asignados', $dato);
        $this->load->view('footer');
    }
    function seleccionar_reserva_asignacion($asig_id){
        $data['titulo'] = 'Seleccion de Reserva';

        $zona = $this->input->get('zona');
        //echo $zona;
        $asignacion = $this->reservas_model->get_asignacion($asig_id);
        $empleado_id = $asignacion[0]->empleado_id;
        $camion_id = $asignacion[0]->camion_id;
        $dato['empleado'] = $this->empleado_model->get_empleado($empleado_id);
        $dato['camion'] = $this->camiones_model->get_camion($camion_id);
        $dato['asig_id'] = $asig_id;

        $dato['zona'] = $zona;
        $dato['reservas'] = $this->reservas_model->clientes_con_reserva($zona);
        $dato['zonas'] = $this->zona_model->get_zonas();

        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/seleccion_reservas', $dato);
        $this->load->view('footer');
    }
    function save_asignacion_camion($reserva_id, $camion_id, $asig_id){
        //insertar la bitacora de seguridad
        $accion='Camion Asignado a una Reserva';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();
        // registro de asignacion
        $datestring = " %Y-%m-%d";
        $now = time() - 14400;
        $fecha =  mdate($datestring, $now);
        $query = $this->reservas_model->save_asignacion_reserva($camion_id, $reserva_id, $fecha);

        $cadena="("."'$camion_id' ,"."'$reserva_id' ,"."'$fecha' ,".")";
        $name_tabla= 'camion_reserva';
        $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

        redirect("/reservas/seleccionar_reserva_asignacion/$asig_id", 'refresh');
    }
    function list_camiones_con_reserva(){
        $data['titulo'] = 'Camiones Con Reserva';
        $dato['empleados'] = $this->reservas_model->camiones_con_reserva();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/list_camiones_con_reserva', $dato);
        $this->load->view('footer');
    }
    function reservas_camion($camion_id){
        $data['titulo'] = 'Reservas De Camion';
        $dato['clientes'] = $this->reservas_model->reserva_camiones_asignados($camion_id);
        $dato['camion'] = $this->camiones_model->get_camion($camion_id);
        $dato['posicion'] = $this->posiciones_model->position_actual_camion($camion_id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/reserva_camiones', $dato);
        $this->load->view('footer');
    }
    function detalle_reserva_camion($reserva_id, $camion_id){
        $data['titulo'] = 'Reserva Realizada';
        $reserva = $this->reservas_model->get_reserva($reserva_id);
        $cliente = $this->cliente_model->get_cliente($reserva[0]->cliente_id);
        $detalle = $this->reservas_model->get_detalle_reserva($reserva_id);
        $dato['camion'] = $this->camiones_model->get_camion($camion_id);
        $dato['reserva'] = $reserva;
        $dato['cliente'] = $cliente;
        $dato['detalle'] = $detalle;
        $dato['reserva_id'] = $reserva_id;
        $dato['camion_id'] = $camion_id;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/reserva_realizada_camion',$dato);
        $this->load->view('footer');
    }
    function create_venta_camion($reserva_id, $camion_id){
        $datestring = " %Y-%m-%d";
        $now = time() - 14400;
        $fecha =  mdate($datestring, $now);
        $datestring = " %h:%i";
        $hora = mdate($datestring, $now);
        $user_id=$this->session->userdata('id');
        $id = $this->reservas_model->create_venta_reserva($reserva_id, $fecha, $user_id, $hora);

        redirect("/reservas/reservas_camion/$camion_id", 'refresh');
    }
    function reservas_pasadas(){
        $datestring = " %Y-%m-%d";
        $fecha = mdate($datestring, time() - 14400);
        $data['titulo'] = 'Reservas Pasadas';
        $dato['reservas'] = $this->reservas_model->reservas_pasadas($fecha);;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/reservas_pasadas', $dato);
        $this->load->view('footer');
    }


    function list_camiones_despacho(){
        $data['titulo'] = 'Camiones Con Reserva';
        $dato['empleados'] = $this->reservas_model->camiones_con_reserva();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/list_camiones_despacho', $dato);
        $this->load->view('footer');
    }
	function detalle_camion_despacho($camion_id){
        $datestring = "%Y-%m-%d";
        $hoy = time();
        $fecha = mdate($datestring, $hoy - 14400);
		$data['titulo'] = 'Reservas De Camion';
		$dato['clientes'] = $this->reservas_model->reserva_camiones_asignados($camion_id);
		$dato['camion'] = $this->camiones_model->get_camion($camion_id);
        $dato['horario'] = $this->horarios_model->get_horario($camion_id, $fecha);
		$this->load->view('header', $data);
		$this->load->view('menu');
		$this->load->view('reservas/reserva_camiones_despacho', $dato);
		$this->load->view('footer');
	}
    function despachar_vehiculo($camion_id){
        //insertar la bitacora de seguridad
        $accion='Despachar Camion';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();
        //despachar camion
        $datestring = "%Y-%m-%d";
        $hoy = time();
        $fecha = mdate($datestring, $hoy - 14400);
        $datestring = "%h:%i:%s";
        $hora = mdate($datestring, $hoy - 14400);
        $insert = $this->horarios_model->insert_horario($fecha, $hora, $camion_id);

        $cadena="("."'$fecha' ,"."'$hora' ,"."'$camion_id' ,".")";
        $name_tabla= 'horario';
        $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

        redirect("/reservas/detalle_camion_despacho/$camion_id", 'refresh');
    }
    function llegada_vehiculo($camion_id, $horario_id){
        //insertar la bitacora de seguridad
        $accion='Hora de llegada de Vehiculo';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();
        //llegada de vehiculo
        $hoy = time();
        $datestring = "%h:%i:%s";
        $llegada = mdate($datestring, $hoy - 14400);
        $query = $this->horarios_model->llegada_horario($horario_id, $llegada);
        $cadena="("."'$horario_id' ,"."'$llegada' ,".")";
        $name_tabla= 'horario';
        $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);
        redirect("/reservas/detalle_camion_despacho/$camion_id", 'refresh');
    }
    function vehiculos_horario(){
        $data['titulo'] = 'Camiones Registrados';
        $dato['empleados'] = $this->empleado_model->empleados_asignados();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/vehiculos_horarios', $dato);
        $this->load->view('footer');
    }
    function horario_camion($id_camion){
        //insertar la bitacora de seguridad
        $accion='Monitoreo de Camion';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        //monitori
        $data['titulo'] = 'Detalle De Monitoreo';
        $dato['camion'] = $this->camiones_model->get_camion($id_camion);
        $dato['horarios'] = $this->horarios_model->horarios_camion($id_camion);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/horarios_camion', $dato);
        $this->load->view('footer');
    }
    function reservas_entregadas($id_camion){
        //insertar la bitacora de seguridad
        $accion='Reservas entregadas';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        //reservas entregadas
        $fecha = $this->input->get('fecha');
        if($fecha == ''){
            $this->horario_camion();
        }
        else{   
            $data['titulo'] = 'Entragas Realizadas';
            $dato['reservas'] = $this->reservas_model->reservas_camion($id_camion, $fecha);
            $dato['camion'] = $this->camiones_model->get_camion($id_camion);
            $this->load->view('header', $data);
            $this->load->view('menu');
            $this->load->view('reservas/reservas_entregadas', $dato);
            $this->load->view('footer');
        }
    }
    function ver_ubicacion_camion($camion_id){
        //insertar la bitacora de seguridad
        $accion='ver ubicacion de camion';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        //solicitar ver camiones
        $now = time() - 14400;
        $datestring = " %Y-%m-%d";
        $fecha =  mdate($datestring, $now);

    	$data['titulo'] = 'Ubicacion Camion';
    	$dato['camion'] = $this->camiones_model->get_camion($camion_id);
    	$dato['ubicaciones'] = $this->posiciones_model->get_ubicaciones_camion($camion_id, $fecha);
    	$this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reservas/ubicacion_camion', $dato);
        $this->load->view('footer');
    }
        
}

/* End of file reservas.php */
/* Location: ./application/controllers/reservas.php */
