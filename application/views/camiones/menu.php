<ul class="menu-lateral">
    <div class="menu-logo">
            <div class="img-menu-logo"></div>
                <li class="menu-title-lateral">
                    <?= anchor('camiones', ' Camiones', array('class'=>' fg-white menu-title-lateral'))?>
                </li>
    </div>
    <li class="bg-darkgrey">
        <?= anchor('camiones', ' Camiones', array('class'=>'bg-text-white fi-widget'))?>
    </li>
    <li>
        <?= anchor('camiones', ' Listar Camiones',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('camiones/new_camion', 'Registrar Camion',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('camiones/list_update_camion', 'Modificar Camion',array('class'=>'colo-menu'));?>
    </li>

    <li class="">
        <?= anchor('camiones/empleados', ' Empleados',array('class' =>'colo-menu' ));?>
    </li>
    <li>
        <?= anchor('camiones/buscar_camion', 'Asignar Empleado',array('class'=>'colo-menu'));?>
    </li>
    <li class="bg-darkgrey">
        <?= anchor('camiones/list_empleados_asignados', ' Asignaciones', array('class' => 'bg-text-white fi-widget'));?>
    </li>
    <li>
        <?= anchor('camiones/list_empleados_asignados', ' Empleados Asignados',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('camiones/list_movilidades_asignadas', 'Movilidades Asignadas',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('camiones/list_asignaciones_terminar', 'Terminar Asignacion',array('class'=>'colo-menu'));?>
    </li>
</ul>