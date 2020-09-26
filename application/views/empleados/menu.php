<nav>
    <ul class="menu-lateral">
        <div class="menu-logo">
            <div class="img-menu-logo"></div>
                <li class="menu-title-lateral">
                    <?= anchor('empleados', ' Empleados', array('class'=>' fg-white menu-title-lateral'))?>
                </li>
        </div>
        <li>
            <?= anchor('empleados', ' Listar Empleados',array('class'=>'colo-menu'))?>
        </li>
        <li>
            <?= anchor('empleados/new_empleado', 'Registro Empleado',array('class'=>'colo-menu'));?>
        </li>
        <li>
            <?= anchor('empleados/list_empleados_modificar', 'Modificar Empleado',array('class'=>'colo-menu'));?>
        </li>
    </ul>
</nav>