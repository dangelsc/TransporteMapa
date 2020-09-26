<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
            <h3><i class="icon-bus"></i><strong>  Empleados Asignados a un Camion<strong></h3>
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
							<td><?= placa_asignacion_empleado($fila->id)?></td>
							<td>
								<? $asig_id = get_id_asignacion($fila->id)?>
								<p class="button success"><?= anchor("reservas/seleccionar_reserva_asignacion/$asig_id", 'Seleccionar Vehiculo');?></p>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>