
    <ul class=" menu-lateral" >
        <div class="menu-logo" >
            <div class="img-menu-logo"></div>
            <li class="menu-title-lateral">
                <?= anchor('cliente', ' Clientes', array('class'=>'fg-white menu-title-lateral'))?>
            </li>
        </div>
        <li>
            <?= anchor('cliente/new_zona', 'Registrar Zona',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor('cliente/new_cliente', 'Registrar Cliente',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('cliente/listado_cliente_update', 'Modificar Cliente',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor('cliente/listado_clientes', 'Detalle Clientes',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor("cliente/listado_clientes_tipo/Agencia", 'Clientes Tipo Agencia',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor("cliente/listado_clientes_tipo/Tienda", 'Clientes Tipo Tienda',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor("cliente/listado_clientes_tipo/Normal", 'Clientes Tipo Normal',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor('cliente/listado_clientes_observacion', 'Observaciones Clientes',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor('cliente/listado_clientes_observaciones', 'Clientes Con Observaciones',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor('cliente/listado_clientes_bloquear', 'Bloquear Cliente',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor('cliente/ruta_clientes', 'Ruta Clientes',array('class'=>'colo-menu'));?>
        </li>
    </ul>
