<?php
class Reserva_cliente extends CI_Controller{
    function __construct(){
      	parent::__construct();
      	
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
    function index(){
        $data['titulo'] = 'Productos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['productos']=$this->productos_model->listar_productos();
        $this->load->view('menu');
        $this->load->view('reserva_cliente/index',$dato);
        $this->load->view('footer');
    }
    function detalle_producto($id){
        $data['titulo'] = 'Detalle de Productos';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_productos']=$this->productos_model->listar_productos_id($id);
        $this->load->view('menu');
        $this->load->view('reserva_cliente/detalle_producto',$dato);
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
            // crear reserva
            redirect("/reserva_cliente/seleccion_productos/$cliente_id/$id", 'refresh');
        }
        else{
            $this->index();
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
        $this->load->view('reserva_cliente/seleccion_productos',$dato);
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
        $this->load->view('reserva_cliente/reservar_producto',$dato);
        $this->load->view('footer');
    }
    function add_producto($cliente_id, $reserva_id, $producto_id){
        $cantidad = $this->input->post('cantidad');
        $si = $this->reservas_model->create_detalle($reserva_id, $producto_id, $cliente_id, $cantidad);
        if($si){
            redirect("/reserva_cliente/seleccion_productos/$cliente_id/$reserva_id", 'refresh');
        }
        else{
            $this->stock_producto($cliente_id, $reserva_id, $producto_id);
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

        redirect('/reserva_cliente/', 'refresh');
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
        redirect("/reserva_cliente/seleccion_productos/$cliente_id/$reserva_id", 'refresh');
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
            redirect("/reserva_cliente/reserva_realizada/$reserva_id", 'refresh');
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
        $this->load->view('reserva_cliente/reserva_realizada',$dato);
        $this->load->view('footer');
    }
    function mis_reservas(){
        $data['titulo'] = "Mis Reservas";
        $dato['reservas'] = $this->reservas_model->mis_reservas_cliente($this->session->userdata('cliente_id'));
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('reserva_cliente/mis_reservas',$dato);
        $this->load->view('footer');
    }
}