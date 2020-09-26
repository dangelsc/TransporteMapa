<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
            <div class="row">
                <div class="span5">
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
                <div class="span4">
                    <div class="row">
                        <div class="span4">
                            <? if($horario):?>
                                <? foreach ($horario as $fila): ?>
                                    <? if($fila->estado == False):?>
                                        <?= anchor("reservas/llegada_vehiculo/$camion_id/$fila->id/", 'Llegada', array('class' => 'button success large', ));?>
                                    <? else :?>
                                        Completo
                                    <? endif?>
                                <? endforeach?>
                            <? else: ?>
                                <?= anchor("reservas/despachar_vehiculo/$camion_id", 'Despachar', array('class' => 'button primary large', ));?>
                            <?endif?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span9">
                    <table class="table hovered">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Cedula</th>
                                <th class="text-left">Nombre Completo</th>
                                <th class="text-left">Dirección</th>
                                <th class="text-left"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? $num = 1 ?>
                            <? foreach ($clientes as $fila): ?>
                                <tr>
                                    <td><?=$num++?></td>
                                    <td><?= $fila->ci?></td>
                                    <td><?=$fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
                                    <td><?= $fila->direccion?></td>
                                    <?$reserva_id = get_reserva_id_camion($camion_id, $fila->id)?>
                                    <td><?= anchor("reservas/detalle_reserva_camion/$reserva_id/$camion_id", 'Detalle de Reserva');?></td>
                                </tr>
                            <? endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
