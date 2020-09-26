<div class="grid">
    <div class="row">
        <div class="span4">
            <? include('menu.php') ?>
        </div>
        <h2 id="_description"> &nbsp &nbsp<i class="icon-user-3 on-left"></i> Asignar y/o Quitar Permisos</h2>
        <?if($usuario):?>
            <?foreach ($usuario as $usuario):?>
                <?$nick=$usuario->nick?>
                <?$email=$usuario->email?>
            <?endforeach?>
            <?$usuario_id=$usuario->id?>
        <?endif?>
        <p><b>&nbsp &nbsp Nombre de Usuario:</b> <?=$nick?></p>
        <p><b>&nbsp &nbsp Correo Electronico:</b> <?=$email?></p><br/>

                <div class="span4 border bd-blue" >
                    <h5 class="text-center">Permisos de Usuario Disponibles</h5 >
                    <?if($mensaje!=''):?>

                        <div>
                            <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                        </div>
                    <?endif?>
                    <div class="panel-header text-center">
                        <? foreach($permisos as $per):?>
                            <?= anchor("usuario/guardar_permiso/$usuario_id/$per->id", "$per->nombre", array('class'=>'button info','style'=>'width:100px; margin-bottom: 5px'))?><br/>
                        <? endforeach?>
                    </div>
                </div>
                <div class="span4 border bd-blue">
                    <div class="panel-header">
                        <h5 class="text-center">Permisos de Usuario Elegidos</h5>
                        <div class="panel-header text-center">

                            <?if($listar):?>
                                <?foreach($listar as $lista):?>
                                            <?= anchor("usuario/eliminar_permiso/$lista->usu_per_id/$lista->user_id", "$lista->nombre_perm", array('class'=>'button info','style'=>'width:100px; margin-bottom: 5px'))?><br/>
                                <?endforeach?>
                            <?endif?>
                        <div/>
                    </div>
                </div>
    </div>
</div>
