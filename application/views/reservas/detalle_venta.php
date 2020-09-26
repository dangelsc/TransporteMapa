<div class="grid">
    <div class="row">
        <div class="span3">
            <? include('menu.php') ?>
        </div>
        <div class="span9">
            <h2 id="_description" class="text-center"><strong> Detalle de la Venta</strong></h2>
            <button class="large bg-blue">
                <i class="icon-file-pdf on-left fg-white"></i>
                <?php echo anchor("ventas/pdf_detalle/$ventas_id",' Imprimir Detalle',array('class'=>'fg-white'))?>
            </button>
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <div class="row">
                <div class="span9">

                    <?$date="%d de %M de %Y"?>
                    <?$fecha = human_to_unix(fecha_venta($ventas_id))?>
                    <strong>Fecha de la Venta: </strong> Potosi, <?=mdate($date,$fecha)?>
                    <div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <p class="tertiary-text">
                                <strong>Señor(es): </strong><?= nombre_cliente($cliente_id)?>
                            </p>
                        </div>
                        <div>
                            <strong>Cedula Identidad: </strong><?= ci_cliente($cliente_id)?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="span9">
                            <table class="table hovered">
                                <thead>
                                <tr>
                                    <th class="text-left">Nro.</th>
                                    <th class="text-left">CANT</th>
                                    <th class="text-left">UNIDAD</th>
                                    <th class="text-left">DETALLE</th>
                                    <th class="text-left">P. UNIT</th>
                                    <th class="text-left">P. IMPORTE</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?$num=1?>
                                <?foreach ($detalle as $fila):?>
                                    <tr>
                                        <td><?=$num++?></td>
                                        <td><?=$fila->cantidad?></td>
                                        <td>Unidad</td>
                                        <td><?=detalle_producto($fila->productos_id)?></td>
                                        <?$tipo=tipo_cliente($cliente_id)?>
                                        <td><?=precio_unidad($fila->productos_id,$tipo)?></td>
                                        <td><?=$fila->precio_venta?> .-</td>
                                    </tr>
                                <?endforeach?>
                                <tr class="info">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total en Bolivianos</strong></td>
                                    <td></td>
                                    <td><strong><?= costo_total_venta($ventas_id)?> .-</strong></td>
                                </tr>

                                </tbody>

                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>