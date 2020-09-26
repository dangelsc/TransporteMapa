
<ul class="menu-lateral">
    <div class="menu-logo">
                <div class="img-menu-logo"></div>
                    <li class="menu-title-lateral">
                        <?= anchor('usuario/nuevo', ' Ventas', array('class'=>' fg-white menu-title-lateral'))?>
                    </li>
    </div>
    <li class="bg-darkgrey">
        <?= anchor('ventas/index', ' Opciones de Ventas', array('class'=>'bg-text-white fi-widget'))?>
    </li>
    <li>
        <?= anchor('ventas/index', 'Listar Productos',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('ventas/listar_v_confirmadas', 'Listar Ventas Confirmadas',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('ventas/listar_v_sinconfirmar', 'Listar Ventas por Confirmar',array('class'=>'colo-menu'))?>
    </li>
    <li class="bg-darkgrey">
        <?= anchor('', ' Reportes', array('class'=>'bg-text-white fi-widget'))?>
    </li>
    <li>
        <?= anchor('ventas/reporte_ventas_clientes', 'Ventas Clientes',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('ventas/ventas_dia/', 'Ventas Dia',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('ventas/ventas_mes/', 'Ventas por Mes',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('ventas/ventas_ano/', 'Ventas por Año',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('ventas/ventas_fechas/', 'Ventas por Fechas',array('class'=>'colo-menu'));?>
    </li>
</ul>
