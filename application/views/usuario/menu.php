
<ul class="menu-lateral">
    <div class="menu-logo">
            <div class="img-menu-logo"></div>
                <li class="menu-title-lateral">
                    <?= anchor('usuario/nuevo', ' Usuarios', array('class'=>' fg-white menu-title-lateral'))?>
                </li>
    </div>


    <li class="bg-darkgrey">
        <?= anchor('usuario/nuevo', ' Registro Usuario', array('class'=>'fg-white icon-user-3'))?>
    </li>
    <li>
        <?= anchor('usuario/modificar_cuenta', 'Modificar Cuenta',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('usuario/modificar_contrasena', 'Cambiar Constraseña',array('class'=>'colo-menu'))?>
    </li>
    <li class="bg-darkgrey">
        <?= anchor('usuario/listar_usuarios', ' Opciones de Usuario', array('class'=>'fg-white icon-user-3'))?>
    </li>
    <li>
        <?= anchor('usuario/nuevo', ' Registrar Nuevo Usuario',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('camiones/list_camiones_usuario/', 'Crear Usuario Camion',array('class'=>'colo-menu'));?>
    </li>
    <li>
        <?= anchor('usuario/list_clientes', 'Crear Usuario Cliente',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('usuario/listar_usuarios', 'Listar Usuarios',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('usuario/usu_activo', 'Listar Usuarios Activos',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('usuario/usu_inactivo', 'Listar Usuarios Inactivos',array('class'=>'colo-menu'))?>
    </li>
    <li class="bg-darkgrey">
        <?= anchor('usuario/administrador', ' Administrador', array('class'=>'fg-white icon-user-3'))?>
    </li>
    <li>
        <?= anchor('usuario/activar_administrador', 'Administrador Activo',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('usuario/desac_administrador', 'Administrador Inactivo',array('class'=>'colo-menu'))?>
    </li>
    <li class="bg-darkgrey">
        <?= anchor('usuario/gestionar_permisos', ' Permisos', array('class'=>'fg-white icon-user-3'))?>
    </li>
    <li>
        <?= anchor('usuario/gestionar_permisos', 'Gestionar Permisos',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('usuario/listar_permisos', 'Listar Permisos',array('class'=>'colo-menu'))?>
    </li>
    <li class="bg-darkgrey">
        <?= anchor('usuario/copias_seguridad', ' Seguridad', array('class'=>'fg-white icon-user-3'))?>
    </li>
    <li>
        <?= anchor('usuario/copias_seguridad', 'Copias de Seguridad',array('class'=>'colo-menu'))?>
    </li>
    <li>
        <?= anchor('usuario/generar_bitacora', 'Bitacoras de Seguridad',array('class'=>'colo-menu'))?>
    </li>
</ul>
