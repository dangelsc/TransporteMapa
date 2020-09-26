<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">	
				<h1 class="table-title">  <strong class="table-title-inner fi-checkbox">Empleados Asignados A una Movilidad</strong></h1>
			</div>
            <table class="table-ctn">
				<thead>
					<tr>
						<th class="text-left"><strong>Nro</strong></th>
						<th class="text-left"><strong>Cedula</strong></th>
						<th class="text-left"><strong>Nombre Completo</strong></th>
						<th class="text-left"><strong>Placa Asignada</strong></th>
						<th class="text-left"><strong>Opciones</strong></th>
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
								<p class=""><?= anchor("camiones/terminar_asignacion/$asig_id", 'Terminar Asignacion', array('class' => '  btn-table-see-detail' ));?></p>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>