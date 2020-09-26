<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex flex-around">
	            <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails"> Nuestros Empleados</strong></h1>
	            
	                
	                <?php echo anchor("empleados/pdf_empleado/",' ',array('class'=>' table-print block fi-print','title'=>'IMPRIMIR EN PDF'))?>
	            
	        </div>
            <table class=" table-ctn">
				<thead>
					<tr>
						<th class="text-left"><strong>Nro.</strong></th>
						<th class="text-left"><strong>Cedula</strong></th>
						<th class="text-left"><strong>Nombre Completo</strong></th>
						<th class="text-left"><strong>Dirección</strong></th>
						<th class="text-left"><strong>Email</strong></th>
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
						</tr>
					<?endforeach?>
				</tbody>
			</table>
        </div>
    </div>
</div>