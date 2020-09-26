<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">
	            <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails"> Asignar Camión a Empleado</strong></h1>
	            
	        </div>
            <h3><i class="icon-list"></i><strong>   Seleccione la Movilidad para Asignar</strong></h3>
            <div class="row">
            	<div class="span2">
            		
            	</div>
            	<div class="span5">
            		<form action="">
            			<label for="plana">Placa Movlidad</label>
            			<input type="text" id="placa" name="placa" value="<?= $placa?>">
            			<button type="submit" class="btn-search"> Buscar</button>
            		</form>
            	</div>
            	<div class="span2"></div>
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
					<?foreach ($camiones as $fila):?>
						<tr>
							<td><?= $num++?></td>
							<td><?= $fila->placa ?></td>
							<td><?=$fila->descripcion?></td>
							<td>
								<p class=""><?= anchor("camiones/buscar_empleado/$fila->id", 'Asignar Empleado', array('class' => 'btn-table-see-detail' ));?></p>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>