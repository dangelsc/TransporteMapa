<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner">Bitacoras de Seguridad del Sistema</strong></h1>
            </div>
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            </br>
            </br>
            <table class="table hovered text-center">
                <thead>
                <tr>
                    <th class="text-left"><strong>Nro.</strong></th>
                    <th class="text-center"><strong>Accion</strong></th>
                    <th class="text-left"><strong>Fecha de Registro</strong></th>
                    <th class="text-center"><strong>Host</strong></th>
                    <th class="text-center"><strong>Usuario<strong></th>
                    <th class="text-left"><strong>Tipo<strong></th>
                    <th class="text-center"><strong>Detalle<strong></th>
                </tr>
                </thead>

                <tbody>

                        <?if($lista_bitacora):?>
                            <?$num = 0?>
                            <?foreach ($lista_bitacora as $fila):?>

                                <tr>
                                    <?$num += 1?>
                                    <td><?=$num?></td>
                                    <td><?=$fila->accion?></td>
                                    <td><?=$fila->fecha?></td>
                                    <td><?=$fila->host?></td>
                                    <td><?=sacar_nombre($fila->sesion_id)?></td>
                                    <td><?=sacar_tipo($fila->sesion_id)?></td>

                                    <td>
                                        <?if($lista_detalle)
                                            foreach ($lista_detalle as $lista)
                                            {
                                                if($fila->id == $lista->id_bitacora)
                                                {?>
                                                    <?=anchor("usuario/detalle_bitacora/$fila->id"," Ver detalle",array('class'=>'btn-table-see-detail'))?>
                                                <?}
                                                else
                                                {
                                                }
                                            }

                                        ?>

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