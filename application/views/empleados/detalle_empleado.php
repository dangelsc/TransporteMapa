<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<h3>Detalle de Empleado</h3>
            <? foreach ($empleado as $fila): ?>
				<div class="row">
					<div class="span6">
						<p class="readable-text">
							<strong>Cedula de Identidad: </strong><?= $fila->ci ?>
						</p>
						<p class="readable-text">
							<strong>Nombre Completo: </strong><?= $fila->paterno ?> <?= $fila->materno ?>, <?= $fila->nombre ?>
						</p>
						<p class="readable-text">
							<strong>Dirección: </strong><?= $fila->direccion ?>
						</p>
						<p class="readable-text">
							<strong>Telefono/Celular: </strong><?=$fila->fono?>
						</p>
						<p class="readable-text">
							<strong>Correo Electronico: </strong><?= $fila->email?>
						</p>
						<p class="readable-text">
							<strong>Fecha de Nacimiento: </strong><?= $fila->fecha_nacimiento?>
						</p>
					</div>
				</div>
        	<? endforeach ?>
        </div>
    </div>
</div>