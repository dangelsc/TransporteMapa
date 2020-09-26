<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner">Tiempos de Entrega Realizados</strong></h1>
            </div>
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
                <div class="">
                    <?= anchor("reservas/ver_ubicacion_camion/$camion_id", 'Ver Ubicación', array('class'=>'btn-table-see-detail'))?>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <h3>Tiempos de Entrega Realizados</h3>
                    <table class="table-ctn">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha de Salida</th>
                                <th>Hora de Salida</th>
                                <th>Hora de Llegada</th>
                                <th>Tiempo Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?$num = 1?>
                            <? foreach($horarios as $fila):?>
                                <?if($fila->estado==False):?>
                                    <tr class="warning">
                                <? else: ?>
                                    <tr>
                                <? endif ?>
                                    <td><?= $num++ ?></td>
                                    <?$date="%d de %M de %Y"?>
                                    <? $fecha = human_to_unix($fila->fecha." 00:00:00")?>
                                    <td><?= mdate($date, $fecha)?></td>
                                    <td class="text-right"><?= $fila->salida ?></td>
                                    <td class="text-right"><?= $fila->llegada ?></td>
                                    <td class="text-right"><?= $fila->total_horas ?></td>
                                    <td>
                                        <?= anchor("reservas/reservas_entregadas/$fila->camion_id/?fecha=$fila->fecha", 'Ver Entregas', array('class'=>'button success'))?>
                                    </td>
                                </tr>
                            <? endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>