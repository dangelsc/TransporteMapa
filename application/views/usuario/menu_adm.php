<nav>
    <ul class="menu-lateral">
        <div class="menu-logo">
                <div class="img-menu-logo"></div>
                    <li class="menu-title-lateral">
                        <?= anchor('usuario/listar administrador', ' Admin', array('class'=>' fg-white menu-title-lateral'))?>
                    </li>
        </div>
        <li class="bg-brown">
            <?= anchor('usuario/listar administrador', ' Opciones de  Usuario', array('class'=>'fg-white icon-user-3'))?>
        </li>
        <li>
            <?= anchor('usuario/activar_administrador', 'Administrador Activo')?>
        </li>
        <li>
            <?= anchor('usuario/desac_administrador', 'Administrador Inactivo')?>
        </li>
        <li>
            <?= anchor('usuario/listar_usuarios', 'Atras')?>
        </li>
    </ul>
</nav>