<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">
	            <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails"> Nuestros Empleados</strong></h1>
	            <button class=" table-print " style="color: white !important;">
	                
	                <?php echo anchor("empleados/pdf_empleado/",' ',array('class'=>'block fi-print'))?>
	            </button>
	        </div>
            <table class="table-ctn">
				<thead>
					<tr>
						<th class="text-left">#</th>
						<th class="text-left">Cedula</th>
						<th class="text-left">Nombre Completo</th>
						<th class="text-left">Dirección</th>
						<th class="text-left">Email</th>
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