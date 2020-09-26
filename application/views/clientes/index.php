<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu" >
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex flex-around">	
	            <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails"> Nuestros Clientes</strong></h1>
	            
	                <!--i class="icon-file-pdf on-left fg-white"></i-->
	                <?php echo anchor("cliente/pdf_clientes/",' ',array('class'=>'btn table-print block fi-print', 'style'=>'','title'=>'IMPRIMIR EN PDF'))?>
	            
            </div>
            <table class="table-ctn">
				<thead >
					<tr>
						<th class="text-left"><strong>Nro.<strong></th>
						<th class="text-left"><strong>Cedula</strong></th>
						<th class="text-left"><strong>Nombre Completo</strong></th>
						<th class="text-left"><strong>Dirección</strong></th>
						<th class="text-left"><strong>Telefono / Celular</strong></th>
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
							<td style="text-align:center;"><?= $fila->fono?></td>
						</tr>					
					<? endforeach ?>
				</tbody>
			</table>
        </div>
    </div>
</div>