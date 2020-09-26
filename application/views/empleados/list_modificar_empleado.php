<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"> <strong class="table-title-inner fi-checkbox">Seleccion un Empleado Para Modificar</strong></h1>
            </div>
            <table class="table hovered">
				<thead>
					<tr>
						<th class="text-left"><strong>Nro.</strong></th>
						<th class="text-left"><strong>Cedula</strong></th>
						<th class="text-left"><strong>Nombre Completo</strong></th>
						<th class="text-left"><strong>Dirección<strong></th>
						<th class="text-left"><strong>Email</strong></th>
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
							<td><?= $fila->email?></td>
							<td>
								<p class=""><?= anchor("empleados/modificar_empleado/$fila->id", 'Modificar', array('class' => 'fi-page-edit btn-table-update' ));?></p>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>