<div class="wrapper margin-top5">
	<div class="content content-wrapper">
		<div class="menu">
			<? include 'menu.php';?>
		</div>
		<div class="content-table">
			<div class="content-table-title flex flex-around">	
	            <h1 class="table-title "><strong class="table-title-inner fi-checkbox">Seleccione el Cliente a Modificar</strong></h1>
      		</div>
      		<table class="table-ctn">
				<thead>
					<tr>
						<th class="text-left"><strong>Nro</strong></th>
						<th class="text-left"><strong>Cedula</strong></th>
						<th class="text-left"><strong>Nombre Completo</strong></th>
						<th class="text-left"><strong>Dirección</strong></th>
						<th class="text-left"><strong>Telf. / Cel.</strong></th>
                        <th class="text-left"><strong></strong></th>
						
					</tr>
				</thead>
				<tbody>
					<? $num = 1 ?>
					<? foreach ($clientes as $fila):?>
						<tr>
							<td><?= $num++ ?></td>
							<td><?= $fila->ci?></td>
							<td><?= $fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
							<td><?= $fila->direccion?></td>
							<td><?= $fila->fono?></td>
							<td>
                                <p class=""><?= anchor("cliente/update_cliente/$fila->id", 'Modificar', array('class' => 'fi-page-edit btn-table-update' ));?></p>
							</td>
						</tr>					
					<? endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>