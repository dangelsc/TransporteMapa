<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
            <div class="row">
            	<div>
                    <p class="bg-red fg-white padding5"><b>Usuario Creado Correctamente</p>
                </div>
            </div>
            <div class="row">
            	<div class="span9">
            		<h3><i class="icon-bus"></i><strong>  Empleados Asignados a una Movilidad</strong></h3>
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
										<?= anchor("camiones/crear_usuario/$fila->id", 'Crear Usuario', array('class'=>'button success'));?>
									</td>
								</tr>
							<?endforeach?>
						</tbody>
					</table>
            	</div>
            </div>
        </div>
    </div>
</div>