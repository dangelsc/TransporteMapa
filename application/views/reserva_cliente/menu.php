<ul class="menu-lateral">
	<div class="menu-logo">
	                <div class="img-menu-logo"></div>
	                    <li class="menu-title-lateral">
	                        <?= anchor('usuario/nuevo', ' Ventas', array('class'=>' fg-white menu-title-lateral'))?>
	                    </li>
    </div>
    <li class="bg-lightOrange">
        <?= anchor('reserva_cliente', ' Reservas', array('class'=>'fg-white icon-cart-2'))?>
    </li>
    <li>
        <?= anchor('reserva_cliente/mis_reservas', 'Mis Reservas')?>
    </li>
</ul>