<div class="grid">
    <div class="row">
        <div class="span3">
            <? include('menu.php') ?>
        </div>
        <div class="span9">
            <div class="row">
                <div class="span6">
                    <h3>Movilidad</h3>
                    <? foreach ($camion as $fila):?>
                        <? $camion_id = $fila->id?>
                        <blockquote>
                            <p class="">
                                <strong>Placa de Vehiculo: </strong><?= $fila->placa?>
                            </p>
                        </blockquote>
                    <?endforeach?>
                </div>
                <div class="span3">
                    <?= anchor("reservas/create_venta_camion/$reserva_id/$camion_id", 'Realizar Venta', array('class' => 'button default large', ));?>
                </div>
            </div>
            <div class="row">
                <h3>Reserva Realizada</h3>
                <div class="span9">
                    <? $datestring = "%d de %M de %Y";?>
                    <? foreach ($reserva as $fila):?>
                        <?$total = $fila->monto_total?>
                        <? $fecha = human_to_unix($fila->fecha_registro)?>
                        <p>
                            <strong>Potosí, </strong><?= mdate($datestring, $fecha)?>
                        </p>
                    <? endforeach?>
                </div>
            </div>
            <div class="row">
                <?php foreach ($cliente as $fila): ?>
                    <div class="span6">
                        <p>
                            <strong>Señor(es): </strong><?= $fila->paterno?> <?= $fila->materno?>, <?= $fila->nombre?>
                        </p>
                    </div>
                    <div class="span3">
                        <p>
                            <strong>C.I.: </strong><?= $fila->ci?>
                        </p>
                    </div>
                    <?$tipo = $fila->tipo?>
                <?php endforeach ?>
            </div>
            <div class="row">
                <div class="span9">
                    <table class="table hovered">
                        <thead>
                            <tr>
                                <th class="text-right">Cantidad</th>
                                <th class="text-right">Unidad</th>
                                <th>Detalle</th>
                                <th class="text-right">P. Unidad</th>
                                <th class="text-right">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detalle as $fila): ?>
                                <tr>
                                    <td class="text-right"><?= $fila->cantidad?></td>
                                    <td>Unidad</td>
                                    <td><?=detalle_producto($fila->producto_id)?></td>
                                    <td class="text-right"><?= precio_unidad($fila->producto_id, $tipo)?></td>
                                    <td class="text-right"><?= $fila->monto?></td>
                                </tr>
                            <?php endforeach ?>
                                <tr class="info">
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><strong>Total en Bolivianos</strong></td>
                                    <td></td>
                                    <td class="text-right"><strong><?=$total?></strong></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>