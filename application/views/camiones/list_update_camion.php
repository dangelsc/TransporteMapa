<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">	
	            <h1 class="table-title "><strong class="table-title-inner fi-checkbox">Seleccione Un Camión para Modificar</strong></h1>
      		</div>
            <table class="table-ctn">
				<thead>
					<tr>
						<th class="text-left"><strong>Nro.</strong></th>
						<th class="text-left"><strong>Placa Movilidad</strong></th>
						<th class="text-left"><strong>Descipción</strong></th>
						<th class="text-left"><strong>Opciones</strong></th>
					</tr>
				</thead>
				<tbody>
					<?$num = 1?>
					<?foreach ($camion as $fila):?>
						<tr>
							<td><?= $num++?></td>
							<td><?= $fila->placa ?></td>
							<td><?=$fila->descripcion?></td>
							<td>
								<p class=""><?= anchor("camiones/update_camion/$fila->id", 'Modificar', array('class' => 'fi-page-edit btn-table-update' ));?></p>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>