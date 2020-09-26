<header class="wrapper height-60 bg-grey shadow-buttom" style="position: fixed; z-index: 1000; margin-top: -6px !important;">
    <div class="content ">
        <div class="menu-nav">
            <?php
            $is_logued_in = $this->session->userdata('is_logued_in');
            if($is_logued_in != TRUE)
            {
                ?>
                <a href="<?= base_url()?>" class="">
                    <!--span class="icon-grid-view" ></span> <img class="imagen"--> COCA - COLA <sup>1.0</sup>
                </a>
                <span class="element-divider"></span>
                <!--a class="element1 pull-menu" href="#">responsivo</a-->
                <ul class=" menu-inicio">
                    <li class=" icon-add-user ">
                            <?=anchor("welcome/iniciar_sesion","Iniciar Sesión",array('class'=>'fi-power'))?></i>
                    </li>
                </ul>
            <?php
            }
            else
            { ?>
                <?php
                $super = $this->session->userdata('super');
                if($super==1)
                {
                ?>
                    <?php
                    $is_logued_in = $this->session->userdata('is_logued_in');
                    if($is_logued_in != TRUE)
                    {
                        ?>
                        <a href="<?= base_url()?>" class="element"><span class="icon-grid-view"></span> coca cola <sup>1.0</sup></a>
                    <?php
                    }
                    else
                    { ?>
                        <a href="<?= base_url()?>" class="element"><span class="fi-torso" ></span> <?=$this->session->userdata('nick');?> !!!</a>

                    <?php } ?>
                    <span class="element-divider"></span>
                    <!--a class="element1 pull-menu" href="#">responsivo</a-->
                    <ul class="menu-ul">

                        <li>
                            <?=anchor('cliente',"Clientes",array('class'=>'menu-a'))?>
                        </li>
                        <li>
                            <?=anchor('empleados',"Empleados",array('class'=>'menu-a'))?>
                        </li>

                        <li>
                            <?=anchor('camiones',"Camiones",array('class'=>'menu-a'))?>
                        </li>

                        <li>
                            <?=anchor("productos/index","Productos",array('class'=>'menu-a'))?>
                        </li>
                        <li>
                            <?= anchor('reservas', 'Reservas',array('class'=>'menu-a'));?>
                        </li>

                        <li>
                            <?= anchor('ventas', 'Ventas',array('class'=>'menu-a'));?>
                        </li>
                        
                        <li style="line-height:20px !important;">
                            <?=anchor('usuario/listar_usuarios',"Gestionar Usuarios",array('class'=>'menu-a'))?>
                        </li>
                        
                        <li>
                            <?php
                            $is_logued_in = $this->session->userdata('is_logued_in');
                            if($is_logued_in != TRUE)
                            {
                                ?>
                                <?=anchor("welcome/iniciar_sesion","Iniciar Sesion",array('class'=>'menu-a'))?></i>
                            <?php
                            }
                            else
                            { ?>
                                <?=anchor("welcome/cerrar_sesion","Cerrar Sesion",array('class'=>'menu-a'))?>
                            <?php } ?>
                        </li>
                    </ul>
                <?php }
                else
                { ?>
                    <?php
                    $is_logued_in = $this->session->userdata('is_logued_in');
                    if($is_logued_in != TRUE)
                    {
                        ?>
                        <a href="<?= base_url()?>" class="element"><span class="icon-grid-view"></span> COCA - COLA <sup>1.0</sup></a>
                    <?php
                    }
                    else
                    { ?>
                        <a href="<?= base_url()?>" class="element"><span class=" icon-user fg-green on-right on-left"></span> Bienvenido  <?=$this->session->userdata('nick');?> !!!</a>
                    <?php } ?>
                    <span class="element-divider"></span>
                    <a class="element1 pull-menu" href="#"></a>
                    <ul class="element-menu">
                        <li>
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-cog"></span>
                            </a>
                            <ul style="display: none;" class="dropdown-menu dark" data-role="dropdown">
                                <li>
                                    <?= anchor('welcome/modificar_contrasena', 'Cambiar Contraseña');?>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <?= anchor('welcome/modificar_cuenta', 'Modificar Cuenta');?>
                                </li>
                            </ul>
                         <ul class=""><br>
                        </li>
                        <?php if ($this->session->userdata('camion') == 1): ?>
                            <span class="element-divider"></span>
                            <br><br>
                            <li>
                                <?= anchor('welcome/ruta_camion', 'Ver Ruta');?>
                            </li>
                            <br><br>
                        <?php endif ?>
                        <?php if ($this->session->userdata('cliente') == 1): ?>
                            <li>
                                <?= anchor('reserva_cliente', 'Reservar Productos');?>
                            </li>
                        </ul>
                        <?php endif ?>
                        <span class="element-divider"></span>
                        <?php $permiso=$this->session->userdata('permisos'); ?>
                        <?php if($permiso): ?>
                                <?php foreach($permiso as $per): ?>
                                    <?php if($per->permisos_id==1): ?>
                                        <li>
                                                 <li><?=anchor('cliente',"Clientes")?></li>
                                        </li>
                                    <?php endif ?>
                                    <?php if($per->permisos_id==2): ?>
                                        <li>
                                                <li><?=anchor('empleados',"Empleados")?></li>
                                        </li>
                                    <?php endif ?>
                                    <?php if($per->permisos_id==3): ?>
                                        <li>
                                                 <li><?=anchor('camiones',"Camiones")?></li>
                                        </li>
                                    <?php endif ?>
                                    <?php if($per->permisos_id==4): ?>
                                        <li >
                                                <li><?=anchor("productos/index","Productos")?></li>


                                        </li>
                                    <?php endif ?>
                                    <?php if($per->permisos_id==5): ?>

                                        <li>
                                            <?= anchor('reservas', 'Reservas');?>
                                        </li>
                                    <?php endif ?>
                                    <?php if($per->permisos_id==6): ?>
                                        <li>
                                            <?= anchor('ventas', 'Ventas');?>
                                        </li>
                                    <?php endif ?>
                                    <?php if($per->permisos_id==7): ?>

                                        <li>
                                             <li><?=anchor('usuario/listar_usuarios',"Gestionar Usuarios")?></li>

                                        </li>
                                    <?php endif ?>
                                <?php endforeach ?>
                                    <li>
                                        <?php
                                        $is_logued_in = $this->session->userdata('is_logued_in');
                                        if($is_logued_in != TRUE)
                                        {
                                            ?>
                                            <?=anchor("welcome/iniciar_sesion","Iniciar Sesion")?></i>
                                        <?php
                                        }
                                        else
                                        { ?>
                                            <?=anchor("welcome/cerrar_sesion","Cerrar Sesion")?>
                                        <?php } ?>
                                    </li>
                            <?php else: ?>
                                <li>
                                    <?php
                                    $is_logued_in = $this->session->userdata('is_logued_in');
                                    if($is_logued_in != TRUE)
                                    {
                                        ?>
                                        <?=anchor("welcome/iniciar_sesion","Iniciar Sesion")?></i>
                                    <?php
                                    }
                                    else
                                    { ?>
                                        <?=anchor("welcome/cerrar_sesion","Cerrar Sesion")?>
                                    <?php } ?>
                                </li>
                         <?php endif ?>
                    </ul>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</header>
<div class="body">