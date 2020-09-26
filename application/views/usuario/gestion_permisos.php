<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Gestionar Permisos</strong></h1>
            </div>
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <table class="table-ctn">
                <thead>
                <tr>
                    <th class="text-left">#</th>
                    <th class="text-left">Nombre de Usuario</th>
                    <th class="text-left">Fecha de Registro</th>
                    <th class="text-left">Estado</th>
                    <th class="text-left">Administrador</th>
                    <th class="text-center">Opciones</th>
                </tr>
                </thead>

                <tbody>
                <?if($lista_usuarios):?>
                    <?$num = 0?>
                    <?foreach ($lista_usuarios as $fila):?>

                        <tr>
                            <?$num += 1?>
                            <td class="text-left"><?=$num?></td>
                            <td class="text-left"><?=$fila->nick?></td>
                            <td class="text-left"><?=$fila->fecha_reg?></td>
                            <?if($fila->estado==1):?>
                                <td class="text-left">Activo</td>
                            <?endif?>
                            <?if($fila->estado==0):?>
                                <td class="text-left">Inactivo</td>
                            <?endif?>
                            <?if($fila->super_user==1):?>
                                <td class="text-left">Activo</td>
                            <?endif?>
                            <?if($fila->super_user==0):?>
                                <td  class="text-left">Inactivo</td>
                            <?endif?>
                            <?$id=$fila->id?>
                            <td class="text-left"><?=anchor("usuario/asignar_permisos/$id","  asignar / quitar", array('class'=>'btn-table-desbloquar', 'style'=>'margin-top:-11px'))?></td>
                        </tr>

                    <?endforeach?>
                <?endif?>

                </tbody>

                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>