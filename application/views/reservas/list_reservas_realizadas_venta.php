<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
            <div class="row">
                <form action="" method="get">
                    <div class="span9">
                        <label for="fecha"><strong>Fecha de Reserva:</strong> </label>
                        <div class="input-control text span4">
                        <input id="fecha" type="date" name="fecha" value="<?=$fecha?>">
                        </div>
                        <div class="span5">
                        <button class="default icon-search"> Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <? $datestring = "%d de %M de %Y";?>
                <? $fecha1 = human_to_unix($fecha)?>
                <h3><strong>Reservas en Fecha: <?= mdate($datestring, $fecha1)?></strong></h3>
                <div class="span9">
                    <table class="table hovered">
                        <thead>
                            <tr>
                                <th class="text-left"><strong>Nro.</strong></th>
                                <th class="text-left"><strong>Cedula</strong></th>
                                <th class="text-left"><strong>Nombre Completo</strong></th>
                                <th class="text-left"><strong>Dirección</strong></th>
                                <th class="text-left"><strong>Opciones</strong></th>

                            </tr>
                        </thead>
                        <tbody>
                            <? $num = 1 ?>
                            <?php foreach ($clientes as $fila): ?>
                                <tr>
                                    <td><?=$num++?></td>
                                    <td><?= $fila->ci?></td>
                                    <td><?=$fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
                                    <td><?= $fila->direccion?></td>
                                    <?$reserva_id = id_reserva($fecha, $fila->id)?>
                                    <td><p class="button success"><?= anchor("reservas/create_venta_reserva/$reserva_id", 'Realizar Venta');?></p></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>