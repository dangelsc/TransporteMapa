<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner">Vehiculos Registrados</strong></h1>
            </div>
            
			<table class="table-ctn">
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
								<? $id_camion = get_id_camion($fila->id)?>
								<?= anchor("reservas/horario_camion/$id_camion", 'Ver Monitoreo', array('class' => 'btn-table-see-detail','style'=>'margin-top:-9px'));?>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>