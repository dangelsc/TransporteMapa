<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
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
                    
                </div>
            </div>
            <div class="row">
                <div class="span9">
                    <table class="table hovered">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Fecha de Reserva</th>
                                <th class="text-left">Nombre Completo</th>
                                <th class="text-left">Cedula de Identidad</th>
                                <th class="text-left">Monto Total</th>
                                <th class="test-left">Hora de Entrega</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <? $num = 1 ?>
                            <? foreach($reservas as $fila):?>
                                <? if($fila->confirmacion == False):?>
                                    <tr class="warning">
                                <? else :?>
                                    <tr>
                                <? endif ?>
                                    <td><?= $num++ ?></td>
                                    <td><?= $fila->fecha_registro ?></td>
                                    <td><?= nombre_cliente($fila->cliente_id) ?></td>
                                    <td><?= ci_cliente($fila->cliente_id) ?></td>
                                    <td><?= $fila->monto_total ?></td>
                                    <td><?= $fila->hora_entrega ?></td>
                                    <td>
                                        <?= anchor("reservas/reserva_realizada/$fila->id",'Detalle', array('class'=>'button info')) ?>
                                    </td>
                                </tr>
                            <? endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>