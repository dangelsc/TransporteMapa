<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('download');
        $this->load->model('usuario_model');
        $this->load->helper('url');
        $this->load->helper('usuario_helper');
        $this->load->model('reservas_model');
        $this->load->model('camiones_model');
        $this->load->model('posiciones_model');
        $this->load->helper('date');
        $this->load->helper('reservas_helper');
    }
	public function index()
	{
        $data['titulo'] = 'Inicio';
        $this->load->view('header', $data);
        $this->load->view('menu');
		$this->load->view('cuerpo');
       
        $this->load->view('footer');
	}
	function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect('welcome/index');
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
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->iniciar_sesion();
            }
            else
            {
                $username = $this->input->post('username');
                $pass = $this->input->post('pass');
                $pass = $this->input->post('pass');
            echo $pass."---------";
                $existe = $this->usuario_model->session_init($pass, $username);
                echo "///////";
                print_r($existe );
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
                            'permisos'=>$permisos,
                            'camion' => $existe[0]->camion,
                            'cliente'=>$existe[0]->cliente,
                            'cliente_id'=>$existe[0]->cliente_id,
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
    function modificar_contrasena()
    {
        $this->_is_logued_in();
        $data['titulo'] = 'Modificar Constraseña';
        $this->load->view('header', $data);
        $mensaje['mensaje'] = "";
        $this->load->view('menu');
        $this->load->view('welcome/modificar_contrasena',$mensaje);
        $this->load->view('footer');
    }
    function update_contrasena()
    {
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
                            redirect("welcome",'refresh');
                        }
                    }
                    else
                    {
                        $data['titulo'] = 'Modificar Constraseña';
                        $this->load->view('header', $data);
                        $mensaje['mensaje'] = "Ingrese su contraseña Correctamente :(";
                        $this->load->view('menu');
                        $this->load->view('welcome/modificar_contrasena',$mensaje);
                        $this->load->view('footer');
                    }
                }
        }
    }
    function modificar_cuenta()
    {
        $this->_is_logued_in();
        $id=$this->session->userdata('id');
        $dato['consulta']=$this->usuario_model->select_usuario_id($id);
        $data['titulo'] = 'Modificar Cuenta';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $this->load->view('menu');
        $this->load->view('welcome/modificar_usuario',$dato);
        $this->load->view('footer');


    }
    function reg_cambio($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Correo Electronico', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_message('valid_email', 'El campo %s es Incorrecto');

        if ($this->form_validation->run() == FALSE)
        {
            $this->modificar_cuenta();
        }
        else
        {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $update=$this->usuario_model->update_usuario($username,$email,$id);
            if($update)
            {
                $this->index();
            }
            else
            {
                $this->modificar_cuenta();
            }
        }
    }

    function ruta_camion(){
        $this->_is_logued_in();
        $id = $this->session->userdata('id');
        $usuario = $this->usuario_model->get_usuario($id);
        $empleado_id = $usuario[0]->empleado_id;
        $camion_id = $this->usuario_model->get_camion_usuario($empleado_id);
        if ($camion_id == null) {
            $this->index();
        }
        $data['titulo'] = 'Reservas De Camion';
        $dato['clientes'] = $this->reservas_model->reserva_camiones_asignados($camion_id);
        $dato['camion'] = $this->camiones_model->get_camion($camion_id);
        $dato['posicion'] = $this->posiciones_model->position_actual_camion($camion_id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('welcome/ruta_camion', $dato);
        $this->load->view('footer');
    }

    function _is_logued_in(){
        $is_logued_in = $this->session->userdata('is_logued_in');
        if($is_logued_in != TRUE)
        {
            redirect('/welcome/iniciar_sesion/', 'refresh');
        }        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */