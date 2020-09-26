<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
            <h3><i class="icon-bus"></i><strong> Movilidades Con Reservas</strong></h3>
			<table class="table hovered">
				<thead>
					<tr>
						<th class="text-left"><strong>Nro.</strong></th>
						<th class="text-left"><strong>Cedula</strong></th>
						<th class="text-left"><strong>Nombre Completo</strong></th>
						<th class="text-left"><strong>Vehiculo Asignado - Placa</strong></th>
						<th><strong>Opciones</strong></th>
					</tr>
				</thead>
				<tbody>
					<? $num = 1 ?>
					<? foreach ($empleados as $fila) :?>
						<tr>
							<td><?= $num++ ?></td>
							<td><?= $fila->ci?></td>
							<td><?= $fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
							<td><?= $placa = placa_asignacion_empleado($fila->id)?></td>
							<? $camion_id = get_camion_id($placa)?>	
							<td>
								<p class="button success"><?= anchor("reservas/reservas_camion/$camion_id", 'Ver Reservas');?></p>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>