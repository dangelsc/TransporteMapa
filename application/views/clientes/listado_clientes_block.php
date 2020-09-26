<div class="wrapper margin-top5">
	<div class="content content-wrapper">
		<div class="menu">
			<? include 'menu.php';?>
		</div>
		<div class="content-table">
			<div class="content-table-title flex flex-around">
				<h1 class="table-title ">  <strong class="table-title-inner fi-checkbox">Seleccione Cliente Para Bloquear - Desbloquear</strong></h1>
			</div>
			<table class="table-ctn">
				<thead>
					<tr>
						<th class="text-left"><strong>Nro.</strong></th>
						<th class="text-left"><strong>Cedula</strong></th>
						<th class="text-left"><strong>Nombre Completo</strong></th>
						<th class="text-left"><strong>Dirección</strong></th>
						<th class="text-left"><strong>Observaciones</strong></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<? $num = 1 ?>
					<? foreach ($clientes as $fila):?>
						<? if($fila->activo == False):?>
							<tr class="color-bloqueo">
						<?else:?>
							<tr>
						<?endif?>
							<td><?= $num++ ?></td>
							<td><?= $fila->ci?></td>
							<td><?= $fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
							<td><?= $fila->direccion?></td>
							<td><?= count_obs($fila->id)?></td>
							<td>
								<? if($fila->activo == True):?>

                                        <p class=""><?= anchor("cliente/bloquear/$fila->id", 'Bloquear', array('class' => 'fi-prohibited btn-table-bloquear' ));?></p>
								<?else:?>
                                    <p class=""><?= anchor("cliente/desbloquear/$fila->id", 'Desbloquear', array('class' => 'fi-check btn-table-desbloquar' ));?></p>
								<?endif?>
							</td>
						</tr>					
					<? endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>