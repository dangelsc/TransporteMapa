<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">
	            <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails"> Asignar Empleado a Camión</strong></h1>
	            
	        </div>
			<div class="row">
				
				<div class="span12">
					<? foreach ($camion as $fila):?>
						<? $camion_id = $fila->id ?>
						<p class="readable-text">
							<strong>Placa de Vehiculo: </strong><?= $fila->placa?>
						</p>
					<?endforeach?>
				</div>
			</div>
			<div class="row">
				<div class="span4"></div>
				<div class="span6">
				<h3><i class="icon-user"></i><strong>  Seleccionar Empleado</strong></h3>
					<form action="">
						<label for="ci"><strong>Cedula de Identidad</strong></label>
						<input type="number" id="ci" name="ci" value="<?= $ci?>" placeholder="Cedula de Indentidad">
						<button type="submit" class="btn-search"> Buscar</button>
					</form>
				</div>
				<div class="span2"></div>
			</div>
			
				
					<h2><i class="icon-user"></i><strong>  Seleccionar Empleado</strong></h2>
		            <table class="table-ctn">
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
							<? foreach ($empleados as $fila) :?>
								<tr>
									<td><?= $num++ ?></td>
									<td><?= $fila->ci?></td>
									<td><?= $fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
									<td><?= $fila->direccion?></td>
									<td>
										<p class="button success"><?= anchor("camiones/guardar_asignacion/$fila->id/$camion_id", 'Asignar Empleado')?></p>
									</td>
								</tr>
							<?endforeach?>
						</tbody>
					</table>
				
			         
        </div>
    </div>
</div>