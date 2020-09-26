<ul class="menu-lateral">
    <div class="menu-logo">
                        <div class="img-menu-logo"></div>
                            <li class="menu-title-lateral">
                                <?= anchor('reservas', ' Reservas', array('class'=>' fg-white menu-title-lateral'))?>
                            </li>
    </div>
    <li class="bg-darkgrey">
        <?= anchor('reservas', ' Reservas', array('class'=>'fg-white icon-cart-2'))?>
    </li>
    <li>
    	<?= anchor('reservas', 'Nuestros Productos',array('class'=>'colo-menu'));?>
    </li>
    <li>
    	<?= anchor('reservas/list_reservas_confirmadas', 'Detalle de Reserva',array('class'=>'colo-menu'));?>
    </li>
    <li>
    	<?= anchor('reservas/list_reservas_sin_confirmar', 'Reservas sin Confirmar',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('reservas/reservas_pasadas', 'Reservas Pasadas',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('reservas/list_reserva_venta', 'Realizar Venta de Reserva',array('class'=>'colo-menu'));?>
    </li>
    <li class="bg-darkgrey">
        <?= anchor('', ' Asignaciones', array('class'=>'fg-white icon-battery-half'))?>
    </li>
    <li>
        <?= anchor('reservas/seleccion_vehiculo_asignacion', 'Asignar Reserva a Vehiculo',array('class'=>'colo-menu'));?>
    </li>
    <li class="bg-darkgrey">
        <a href="#" class="fg-white icon-battery-half'"> <i class="icon-bus"></i> Asignaciones a Vehiculos</a>
    </li>
    <li>
        <?= anchor('reservas/list_camiones_con_reserva', 'Vehiculos Con Reservas',array('class'=>'colo-menu'));?>
    </li>
    <li class="bg-darkgrey">
        <a href="#" class="fg-white icon-battery-half'"> <i class="icon-cart"></i> Despacho de Vehiculos</a>
    </li>
    <li>
        <?= anchor('reservas/list_camiones_despacho', 'Despacho De Vehiculos',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('reservas/vehiculos_horario', 'Vehiculos',array('class'=>'colo-menu'));?>
    </li>
</ul>