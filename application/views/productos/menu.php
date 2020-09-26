
    <ul class="menu-lateral">
        <div class="menu-logo">
            <div class="img-menu-logo"></div>
                <li class="menu-title-lateral">
                    <?= anchor('productos/index', ' Productos', array('class'=>' fg-white menu-title-lateral'))?>
                </li>
        </div>
        <li class="bg-darkgrey">
            <?= anchor('productos/index', ' Opciones de Productos', array('class'=>'bg-text-white fi-widget'))?>
        </li>
        <li>
            <?= anchor('productos/index', 'Listar Productos',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('productos/reg_nuevo', 'Registrar Nuevo',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('productos/modificar_producto', 'Modificar Producto',array('class'=>'colo-menu'))?>
        </li>
        <li class="bg-darkgrey">
            <?= anchor('productos/agregar_tipo', ' Presentacion', array('class'=>'bg-text-white fi-widget'))?>
        </li>
        <li>
            <?= anchor('productos/agregar_tipo', 'Listar Presentacion',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('productos/new_tipo', 'Nueva Presentacion',array('class'=>'colo-menu'))?>
        </li>
        <li class="">
            <?= anchor('productos/agregar_tipo', ' Almacen',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('productos/agregar_almacen', 'Actualizar stock de Almacen',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('productos/listar_productos_almacen', 'Productos en Almacen',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('productos/almacen_con_stock', 'Productos con Stock',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('productos/almacen_sin_stock', 'Productos sin Stock',array('class'=>'colo-menu'))?>
        </li>
    </ul>
