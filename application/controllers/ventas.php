<?php
class Ventas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->_is_logued_in();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('download');
        $this->load->helper('date');
        $this->load->model('ventas_model');
        $this->load->model('reservas_model');
        $this->load->model('cliente_model');
        $this->load->model('productos_model');
        $this->load->helper('productos_helper');
        $this->load->helper('clientes_helper');
        $this->load->helper('ventas_helper');
        $this->load->helper('reservas_helper');
        $this->load->helper('url');
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
                    if($fila->permisos_id == 6){
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
        $data['titulo'] = 'Producto Almacen';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_productos']=$this->ventas_model->listar_productos();
        $this->load->view('menu');
        $this->load->view('ventas/index',$dato);
        $this->load->view('footer');
    }
    function ver_detalle($id)
    {
        $data['titulo'] = 'Detalle del Producto';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['lista_productos']=$this->ventas_model->listar_productos_id($id);
        $this->load->view('menu');
        $this->load->view('ventas/ver_detalle_producto',$dato);
        $this->load->view('footer');
    }
    function detalle_stock($id)
    {
        $data['titulo'] = 'Productos con Stock';
        $this->load->view('header', $data);
        $dato['mensaje'] = "";
        $dato['detalle']=$this->ventas_model->listar_productos_almacen($id);
        $this->load->view('menu');
        $this->load->view('ventas/detalle_stock',$dato);
        $this->load->view('footer');
    }
    function list_clientes()
    {
        $data['titulo'] = 'Nuestros Clientes';
        $dato['ci'] = $ci = $this->input->get('ci');
        $dato['tipo'] = $tipo = $this->input->get('tipo');
        $dato['clientes'] = $this->ventas_model->buscar_clientes($ci, $tipo);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/listado_clientes', $dato);
        $this->load->view('footer');
    }
    function seleccion_productos($cliente_id, $venta_id)
    {
        $data['titulo'] = 'Productos';
        $dato['mensaje'] = "";
        $dato['productos']=$this->productos_model->listar_productos();
        $dato['cliente_id'] = $cliente_id;
        $dato['ventas_id'] = $venta_id;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/seleccion_productos',$dato);
        $this->load->view('footer');
    }
    function new_venta($cliente_id)
    {
        //insertar la bitacora de seguridad
        $accion='Crear Venta';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        $id_bitacora = $this->db->insert_id();
       // crear venta
        $datestring = " %Y-%m-%d";
        $time = time();
        $fecha =  mdate($datestring, $time);
        $user_id=$this->session->userdata('id');
        $id = $this->ventas_model->create_venta($fecha, $cliente_id, $user_id);
        if($id){
            $cadena="("."'$fecha' ,"."'$cliente_id' ,"."'$user_id'".")";
            $name_tabla= 'venta';
            $this->usuario_model->insertar_detalle($cadena,$id_bitacora,$name_tabla);

            redirect("/ventas/seleccion_productos/$cliente_id/$id", 'refresh');
        }
        else{
            $this->list_clientes();
        }
    }
    function cancelar_venta($venta_id)
    {
        //insertar la bitacora de seguridad
        $accion='Cancelar Venta';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        // cancelar venta
        $cancelar=$this->ventas_model->eliminar_venta($venta_id);
        if($cancelar)
        {
            redirect("ventas/list_clientes",'refresh');
        }
    }
    function guardar_venta()
    {

        //insertar la bitacora de seguridad
        $accion='Registro de Una Nueva Venta';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        // venta
        $dato['ventas_id'] = $ventas_id = $this->input->get('ventas_id');
        $dato['productos_id'] = $productos_id = $this->input->get('productos_id');
        $cliente_id = $this->input->post('cliente_id');
        $precio = $this->input->post('precio');
        $cantidad=$this->input->post('cantidad');
        $p_id = $this->input->post('productos_id');
        $v_id = $this->input->post('ventas_id');
        $precio_venta=$cantidad*$precio;
        $pro=$this->ventas_model->listar_productos_id($p_id);
        $retor=$pro[0]->retornable;
        if($retor==0)
        {

                $botellas_rotas=$this->input->post('defectuosas');
                if($botellas_rotas != '')
                {

                        $impote_botellas=$botellas_rotas*1.5;
                        $botellas_sanas=$cantidad-$botellas_rotas;
                        $insertar_botellas=$this->ventas_model->insertar_detalle_botellas($v_id, $botellas_sanas, $botellas_rotas, $cantidad, $impote_botellas,$p_id);
                        if($insertar_botellas)
                        {
                            $consulta_monto=$this->ventas_model->monto_total($v_id);
                            foreach ($consulta_monto as $fila1)
                            {
                                $monto_total=$fila1->monto_total;
                            }
                            $nuevo_monto=$monto_total+$impote_botellas;
                            $this->ventas_model->update_venta_botellas($v_id,$nuevo_monto);
                        }

                }

        }
        $consulta_stock=$this->ventas_model->cantidad_stock($p_id);
        foreach ($consulta_stock as $fila)
        {
            $stock = $fila->stock;
            $sali=$fila->salida;
        }
        $stock_actual=$stock-$cantidad;
        $salida=$sali+$cantidad;
        $consulta_monto=$this->ventas_model->monto_total($v_id);
        foreach ($consulta_monto as $fila1)
        {
            $monto_total=$fila1->monto_total;
        }
        $nuevo_monto=$monto_total+$precio_venta;
        $insertar=$this->ventas_model->update_venta($v_id,$p_id,$cantidad,$precio_venta,$stock_actual,$nuevo_monto,$salida);
        if($insertar)
        {
            redirect("ventas/seleccion_productos_venta/$cliente_id/$v_id",'refresh');
        }
    }
    function seleccion_productos_venta($cliente_id, $venta_id)
    {
        $data['titulo'] = 'Productos';
        $dato['mensaje'] = "";
        $dato['productos']=$this->productos_model->listar_productos();
        $dato['productos_venta']=$this->ventas_model->productos_no_venta($venta_id);
        $dato['detalle']=$this->ventas_model->listar_detalle($venta_id);
        $dato['botellas']=$this->ventas_model->listar_botellas($venta_id);
        $dato['cliente_id'] = $cliente_id;
        $dato['ventas_id'] = $venta_id;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/seleccion_productos_venta',$dato);
        $this->load->view('footer');
    }
    function cancelar_detalle($id,$cliente_id)
    {
        $detalle=$this->ventas_model->listar_detalle_id($id);
        foreach ($detalle as $deta)
        {
           $producto_id = $deta->productos_id;
            $ventas_id = $deta->ventas_id;
            $cantidad=$deta->cantidad;
            $costo=$deta->precio_venta;
            $id_detalle = $deta->id;
        }
        $consulta_stock=$this->ventas_model->cantidad_stock($producto_id);
        foreach ($consulta_stock as $fila)
        {
            $stock = $fila->stock;
            $sali=$fila->salida;
        }
        $stock_actual=$stock+$cantidad;
        $salida=$sali-$cantidad;
        $consulta_monto=$this->ventas_model->monto_total($ventas_id);
        foreach ($consulta_monto as $fila1)
        {
            $monto_total=$fila1->monto_total;
        }
        $nuevo_monto=$monto_total-$costo;
        $borrar=$this->ventas_model->borrar_venta($ventas_id,$producto_id,$stock_actual,$nuevo_monto,$salida,$id_detalle);
        if($borrar)
        {
            redirect("ventas/seleccion_productos_venta/$cliente_id/$ventas_id",'refresh');
        }
        else
        {
            redirect("ventas/seleccion_productos_venta/$cliente_id/$ventas_id",'refresh');
        }
    }
    function cancelar_botella($id,$cliente_id,$ventas_id)
    {
        $botella=$this->ventas_model->listar_botella_id($id);
        $costo=$botella[0]->importe;
        $consulta_monto=$this->ventas_model->monto_total($ventas_id);
        foreach ($consulta_monto as $fila1)
        {
            $monto_total=$fila1->monto_total;
        }
        $nuevo_monto=$monto_total-$costo;

        $borrar=$this->ventas_model->borrar_botella($id, $ventas_id,$nuevo_monto);
        if($borrar)
        {
            redirect("ventas/seleccion_productos_venta/$cliente_id/$ventas_id",'refresh');
        }
        else
        {
            redirect("ventas/seleccion_productos_venta/$cliente_id/$ventas_id",'refresh');
        }
    }
    function confirmar_venta($ventas_id)
    {
        //insertar la bitacora de seguridad
        $accion='confirmar Venta';
        $session_id = $this->session->userdata('id');
        $host=$_SERVER['REMOTE_ADDR'];
        $fecha= date("Y-m-d H:i:s",time()-14400);
        $this->usuario_model->insertar_bitacora($accion,$session_id,$host,$fecha);
        //cancelar venta

            $sacar_id=$this->ventas_model->get_venta($ventas_id);
            foreach($sacar_id as $lista)
            {
                $cliente_id=$lista->cliente_id;
            }
            $dato['cliente_id'] = $cliente_id;
            $data['titulo'] = 'Detalle de la Venta';
            $dato['mensaje'] = "";
            $dato['botellas']=$this->ventas_model->listar_botellas($ventas_id);
            $dato['detalle']=$this->ventas_model->listar_detalle($ventas_id);
            $dato['ventas_id'] = $ventas_id;
            $this->load->view('header', $data);
            $this->load->view('menu');
            $this->load->view('ventas/detalle_venta',$dato);
            $this->load->view('footer');


    }
    function listar_v_confirmadas()
    {
        $data['titulo'] = 'Listado de ventas Realizadas';
        $fecha = $this->input->get('fecha');
        if ($fecha == '') {
            $datestring = " %Y-%m-%d";
            $now = time() - 16300;
            $fecha =  mdate($datestring, $now);
        }
        $dato['fecha'] = $fecha;
            $dato['clientes'] = $this->ventas_model->clientes_con_ventas_confirmada($fecha);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/list_ventas_realizadas', $dato);
        $this->load->view('footer');
    }
    function ver_detalle_venta($ventas_id)
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
        $dato['botellas']=$this->ventas_model->listar_botellas($ventas_id);
        $dato['ventas_id'] = $ventas_id;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/detalle_venta',$dato);
        $this->load->view('footer');
    }
    function listar_v_sinconfirmar()
    {
        $data['titulo'] = 'Listado de Ventas No Realizadas';
        $fecha = $this->input->get('fecha');
        if ($fecha == '') {
            $datestring = " %Y-%m-%d";
            $now = time() - 16300;
            $fecha =  mdate($datestring, $now);
        }
        $dato['fecha'] = $fecha;
        $dato['clientes'] = $this->ventas_model->clientes_con_ventas_noconfirmada($fecha);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/list_ventas_sin_confirmar', $dato);
        $this->load->view('footer');
    }
    function cancelar_ventas_noconfirmadas($ventas_id)
    {
        $this->ventas_model->cancelar_venta($ventas_id);
        redirect('ventas/listar_v_sinconfirmar/', 'refresh');
    }
    function cance_venta($ventas_id)
    {
        $this->ventas_model->cancelar_venta($ventas_id);
        redirect("ventas/list_clientes",'refresh');
    }
    function pdf_detalle($ventas_id)
    {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Sergio Barriga');
        $pdf->SetTitle('Detalle Venta');

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
        $pdf->SetFont('times', 'BI', 14, '', true);


// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
        $consulta = $this->ventas_model->listar_detalle($ventas_id);
        $botellas = $this->ventas_model->listar_botellas($ventas_id);
        $sacar_id=$this->ventas_model->get_venta($ventas_id);
        foreach($sacar_id as $lista1)
        {
            $cliente_id=$lista1->cliente_id;
        }
//fijar efecto de sombra en el texto
        $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 4, 'color' => array(255, 0, 0)));
        $pdf->SetFillColor(255,255,128);
        $pdf->SetTextColor(0,0,0);
        $pdf->setTextShadow(array('disable' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

        $pdf->Cell(0, 0, 'DETALLE DE LA VENTA', 0, 1, 'C', 0, 0);
        $pdf->SetFont('times', 'I', 13, '', true);
        $pdf->Cell(0, 0, ' ', 0, 1, 'C', 0, 0);
        $date="%d de %M de %Y";
        $fecha = human_to_unix(fecha_venta($ventas_id));
        $mostrar = mdate($date,$fecha);
        $text='Fecha de la Venta :'.' '. $mostrar .'';
        $pdf->Cell(0, 0, $text, 0, 1, 'L', 0, 0);
        $text2='Señor(es) :'.' '. nombre_cliente($cliente_id) .''.'                        '.'Cedula de Identidad :'.' '.ci_cliente($cliente_id);
        $pdf->Cell(0, 0, $text2, 0, 1, 'L', 0, 0);


        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background-color: #efefef;font-weight: 500; line-height: 2; text-align: left;font-weight:bold;font-size: 0.8em}";
        $html .= "td{padding: 5px 10px; border-bottom: #bbbbbb 1px solid; background: none;line-height: 2;font-size: 0.7em;}";
        $html .= "</style>";
        $html .= "<br><br>";


        $html .= '<table width="740" aling="center">';
        $html .= '<tr><th width="40">Nro</th><th width="70" >CANT.</th><th width="70" >UNIDAD</th><th width="250" >DETALLE</th><th width="70" >P.UNIT.</th><th>P.IMPORTE</th></tr>';

        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
        /* foreach ($institucion as $fila) {
             $id = $fila['i.nombre'];
             $localidad = $fila['i.direccion'];

             $html .= "<tr><td class='id'>" . $id . "</td><td class='localidad'>" . $localidad . "</td></tr>";
         }*/
       $num=1;
        foreach ($consulta as $fila) {
            $tipo=tipo_cliente($cliente_id);
            $precio=precio_unidad($fila->productos_id,$tipo);
            $html .= '<tr><td width="40" >' . $num++ . '</td><td>'.$fila->cantidad.'</td><td>' . 'unidad' . '</td><td>'.detalle_producto($fila->productos_id).'</td><td>'.$precio.'</td><td>'.$fila->precio_venta.'</td></tr>';
        }
        foreach ($botellas as $bote)
        {
            $html .= '<tr><td width="40" >' . $num++ . '</td><td>'.$bote->botellas_rotas.'</td><td>' . 'unidad' . '</td><td>'.'Botellas Defectuosas: '. detalle_producto1($bote->productos_id).'</td><td>'.'1.5'.'</td><td>'.$bote->importe.'</td></tr>';

        }

        $html .= '<tr><td width="40" >'.''.'</td><td>'.''.'</td><td>' . '' . '</td><td>'.'TOTAL EN BOLIVIANOS'.'</td><td>'.''.'</td><td>'.costo_total_venta($ventas_id).' .-'.'</td></tr>';

        $html .= "</table>";
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("detalle venta");
        $pdf->Output($nombre_archivo, 'I');

    }
    function reporte_ventas_clientes(){
        $data['titulo'] = 'Clientes Con Ventas';
        #$dato['clientes'] = $this->cliente_model->get_clientes();
        $dato['clientes'] = $this->cliente_model->cantidad_ventas_clientes();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/select_clientes_venta', $dato);
        $this->load->view('footer');
    }
    function ventas_cliente($cliente_id){
        $data['titulo'] = 'Ventas Cliente';
        $dato['ventas'] = $this->ventas_model->ventas_cliente($cliente_id);
        $dato['cliente'] = $this->cliente_model->get_cliente($cliente_id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/clientes_venta', $dato);
        $this->load->view('footer');
    }
    function ventas_dia(){
        $fecha = $this->input->get('fecha');
        if ($fecha == '') {
            $datestring = " %Y-%m-%d";
            $now = time() - 14400;
            $fecha =  mdate($datestring, $now);
        }
        $data['titulo'] = 'Ventas del Dia | '.$fecha;
        $dato['fecha'] = $fecha;
        $dato['ventas'] = $this->ventas_model->ventas_fecha($fecha);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/ventas_dia', $dato);
        $this->load->view('footer');

    }
    function ventas_mes()
    {
        $mes = $this->input->post('mes');
        $ano = $this->input->post('ano');
        $dato['ventas'] = $this->ventas_model->ventas_mes($ano,$mes);
        $data['titulo'] = 'Ventas del Dia | '.$mes.' '.$ano ;
        $dato['mes'] = $mes;
        $dato['ano'] = $ano;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/ventas_mes', $dato);
        $this->load->view('footer');

    }
    function ventas_ano()
    {
        $data['titulo'] = 'Ventas por Año';
        $ano = $this->input->post('ano');
        $dato['ventas'] = $this->ventas_model->ventas_ano($ano);
        $dato['ano'] = $ano;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('ventas/ventas_ano', $dato);
        $this->load->view('footer');
    }
    function ventas_fechas()
    {
        $data['titulo'] = 'Ventas por Fechas';
        $fechauno = $this->input->post('fechauno');
        $fechados = $this->input->post('fechados');
        if($fechados>=$fechauno)
        {
            $dato['ventas'] = $this->ventas_model->ventas_entre_fechas($fechauno,$fechados);
            $dato['fecha1'] = $fechauno;
            $dato['mensaje'] = '';
            $dato['fecha2'] = $fechados;
            $this->load->view('header', $data);
            $this->load->view('menu');
            $this->load->view('ventas/ventas_fechas', $dato);
            $this->load->view('footer');
        }
        else
        {
            $dato['ventas'] = $this->ventas_model->ventas_entre_fechas($fechauno,$fechados);
            $dato['mensaje'] = 'La Fecha uno debe ser Menor o igual a la Fecha dos';
             $dato['fecha1'] = $fechauno;
            $dato['fecha2'] = $fechados;
            $this->load->view('header', $data);
            $this->load->view('menu');
            $this->load->view('ventas/ventas_fechas', $dato);
            $this->load->view('footer');
        }

    }



}