<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
        	<h2><strong><i class="icon-user-3"></i>   Seleccione Un Cliente</strong></h2>
            <div class="row">
        		<form action="" method="get">
        			<div class="span3">
        				<label for="ci"><strong>Cedula de Identidad: </strong></label>
                        <div class="input-control text" data-role="input-control">
        				    <input id="ci" type="number" name="ci" placeholder="Cedula de Identidad" value="<?=$ci?>">
                        </div>
        			</div>

        			<div class="span3">
                        <div class="input-control select">
                            <label for="tipo"><strong>Tipo de Cliente:</strong></label>
                            <select id="tipo" name="tipo">
                                <? if($tipo == ''): ?>
                                    <option value="" selected="selected">----------</option>
                                    <option value="Agencia">Agencia</option>
                                    <option value="Tienda">Tienda</option>
                                    <option value="Normal">Normal</option>
                                <?endif?>
                                <? if($tipo == 'Agencia'): ?>
                                    <option value="">----------</option>
                                    <option value="Agencia" selected="selected">Agencia</option>
                                    <option value="Tienda">Tienda</option>
                                    <option value="Normal">Normal</option>
                                <?endif?>
                                <?if($tipo == 'Tienda'):?>
                                    <option value="">----------</option>
                                    <option value="Agencia">Agencia</option>
                                    <option value="Tienda" selected="selected">Tienda</option>
                                    <option value="Normal">Normal</option>
                                <? endif ?>
                                <?if($tipo == 'Normal'):?>
                                    <option value="">----------</option>
                                    <option value="Agencia">Agencia</option>
                                    <option value="Tienda">Tienda</option>
                                    <option value="Normal" selected="selected">Normal</option>
                                <? endif ?>
                            </select>
                        </div>
        			</div>
        			<div class="span3">
	        			<label for="">&nbsp</label>	
	            		<button class="default icon-search"> Buscar</button>
        			</div>
            	</form>
            </div>
            <div class="row">
	            <table class="table hovered">
					<thead>
						<tr>
							<th class="text-left"><strong>Nro.</strong></th>
							<th class="text-left"><strong>Cedula</strong></th>
							<th class="text-left"><strong>Nombre Completo</strong></th>
							<th class="text-left"><strong>Dirección</strong></th>
							<th class="text-left"><strong>Email</strong></th>
							<th class="text-left"><strong>Opciones</strong></th>
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
								<td><?= $fila->email?></td>
								<td>
									<p class="button success"><?= anchor("reservas/new_venta/$fila->id", 'Seleccionar');?></p>
								</td>
							</tr>					
						<? endforeach ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>