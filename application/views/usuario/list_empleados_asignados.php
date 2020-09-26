<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Empleados Asignados a una Movilidad</strong></h1>
            </div>
            
			<table class="table hovered">
				<thead>
					<tr>
						<th class="text-left"><strong>Nro.</strong></th>
						<th class="text-left"><strong>Cedula</strong></th>
						<th class="text-left"><strong>Nombre Completo</strong></th>
						<th class="text-left"><strong>Dirección</strong></th>
						<th></th>
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
								<?= anchor("camiones/crear_usuario/$fila->id", 'Crear Usuario', array('class'=>'btn-table-new ','style'=>'margin-top:-6px'));?>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>