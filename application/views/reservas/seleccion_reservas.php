<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
                   </div>
        <div class="span9">
            <div class="row">
				<div class="span5 bd-black padding15"> <br><br>

					<h3>Datos de Empleado</h3>
					<? foreach ($empleado as $fila):?>
						<blockquote>
							<p class="">
								<strong>Nombre Compleado: </strong><?= $fila->paterno?> <?= $fila->materno?>, <?= $fila->nombre?>
							</p>
						</blockquote>
						<blockquote>
							<p class="">
								<strong>Cedula de Identidad: </strong><?= $fila->ci?>
							</p>
						</blockquote>
					<? endforeach?>
				</div>
				<div class="span1"></div>
				<div class="span4 padding15"><br><br>
					<h3>Asignado a la Movilidad</h3>
					<? foreach ($camion as $fila):?>
						<? $camion_id = $fila->id?>
						<blockquote>
							<p class="">
								<strong>Placa de Vehiculo: </strong><?= $fila->placa?>
							</p>
						</blockquote>
					<?endforeach?>
				</div>
			</div>
			<div class="row border bd-black"></div>
			<div class="row">
				<h3>Seleccion de Reservas</h3>
				<div class="span9">
					<div class="row">
		                <form action="" method="get">
		                    <div class="span9">
		                        <?= form_label('Seleccione una Zona', 'zona');?>
		                        <select name="zona" id="">
		                            <? foreach ($zonas as $fila):?>
		                                <option value="<?= $fila->id ?>"><?= $fila->nombre?></option>
		                            <? endforeach ?>
		                        </select>
		                        <button class="default icon-search"> Buscar</button>
		                    </div>
		                </form>
		            </div>
		            <div class="row">
		            	<?php if ($zona): ?>
							<h4><strong>Reservas en la Zona: </strong><?=nombre_zona($zona)?></h4>
		            	<?php endif ?>
		                <div class="span9">
		                    <table class="table hovered">
		                        <thead>
		                            <tr>
		                                <th class="text-left">#</th>
		                                <th class="text-left">Cedula</th>
		                                <th class="text-left">Nombre Completo</th>
		                                <th class="text-left">Fecha de Reserva</th>
		                                <th class="text-left"></th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <? $num = 1 ?>
		                            <?php foreach ($reservas as $fila): ?>
		                                <tr>
		                                    <td><?=$num++?></td>
		                                    <td><?= ci_cliente($fila->cliente_id)?></td>
		                                    <td><?= nombre_cliente($fila->cliente_id)?></td>
		                                    <td><?= $fila->fecha_registro?></td>
		                                    <td><?= anchor("reservas/save_asignacion_camion/$fila->id/$camion_id/$asig_id", 'Seleccionar Reserva');?></td>
		                                </tr>
		                            <?php endforeach ?>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
				</div>
			</div>
        </div>
    </div>
</div>