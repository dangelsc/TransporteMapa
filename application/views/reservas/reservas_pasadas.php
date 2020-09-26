<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
            <div class="row">
                <h3><strong>Reservas Pasadas</strong></h3>
                <div class="span9">
                    <table class="table hovered">
                        <thead>
                            <tr>
                                <th class="text-left"><strong>Nro.</strong></th>
                                <th class="text-left"><strong>Cedula</strong></th>
                                <th class="text-left"><strong>Nombre Completo</strong></th>
                                <th class="text-left"><strong>Fecha de Reserva</strong></th>
                                <th class="text-left"><strong>Opciones</strong></th>

                            </tr>
                        </thead>
                        <tbody>
                            <? $num = 1 ?>
                            <?php foreach ($reservas as $fila): ?>
                                <tr>
                                    <td><?=$num++?></td>
                                    <? $cliente_id = $fila->cliente_id?>
                                    <td><?= ci_cliente($cliente_id)?></td>
                                    <td><?= nombre_cliente($cliente_id)?></td>
                                    <td>
                                        <? $datestring = "%d de %M de %Y";?>
                                        <? $fecha = human_to_unix($fila->fecha_registro." 00:00:00")?>
                                        <?= mdate($datestring, $fecha)?>
                                    </td>
                                    <td><p class="button success"><?= anchor("reservas/cancelar_reserva/$fila->id", 'Cancelar de Reserva');?></p></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>