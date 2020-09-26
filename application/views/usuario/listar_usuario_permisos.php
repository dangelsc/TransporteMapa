<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner">Permisos</strong></h1>
            </div>
           
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>

            <table class="table-ctn">
                <thead>
                <tr>
                    <th class="text-left"><strong>Nro.</strong></th>
                    <th class="text-left"><strong>Nombre de Usuario</strong></th>
                    <th class="text-left"><strong>Correo Electronico</strong></th>
                    <th class="text-left"><strong>Estado</strong></th>
                    <th class="text-left"><strong>Opciones<strong></th>

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
                            <td><?=anchor("usuario/ver_permisos/$fila->id","  Ver Permisos", array('class'=>'btn-table-see-detail', 'style'=>'margin-top:-11px'))?></td>
                        </tr>

                    <?endforeach?>
                <?endif?>

                </tbody>

                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>