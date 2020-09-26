<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
                <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails">Lista de Usuarios</strong></h1>
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>

                
                         <?php echo anchor("usuario/pdf_listar_usuario",' ',array('class'=>'table-print block fi-print','title'=>'IMPRIMIR EN PDF'))?>
                
            </div>
            <table class="table hovered">
                <thead>
                <tr>
                    <th class="text-left"><strong>Nro.</strong></th>
                    <th class="text-left"><strong>Nombre de Usuario</strong></th>
                    <th class="text-left"><strong>Fecha de Registro</strong></th>
                    <th class="text-left"><strong>Estado</strong></th>
                    <th class="text-left"><strong>Administrador<strong></th>
                    <th>Camion</th>
                    <th>Cliente</th>
                </tr>
                </thead>

                <tbody>
                <?if($lista_usuarios):?>
                    <?$num = 0?>
                    <?foreach ($lista_usuarios as $fila):?>

                        <tr>
                            <?$num += 1?>
                            <td><?=$num?></td>
                            <td><?=$fila->nick?></td>
                            <td><?=$fila->fecha_reg?></td>
                            <?if($fila->estado==1):?>
                                <td>Activo</td>
                            <?endif?>
                            <?if($fila->estado==0):?>
                                <td>Inactivo</td>
                            <?endif?>
                            <?if($fila->super_user==1):?>
                                <td>Activo</td>
                            <?endif?>
                            <?if($fila->super_user==0):?>
                                <td>Inactivo</td>
                            <?endif?>
                            <td>
                                <? if($fila->camion): ?>
                                    SI
                                <? endif ?>
                            </td>
                            <td>
                                <? if($fila->cliente):?>
                                    SI
                                <? endif ?>
                            </td>
                        </tr>

                    <?endforeach?>
                <?endif?>

                </tbody>

                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>