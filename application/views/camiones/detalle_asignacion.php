<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">
	            <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails">Detalle de Asignacion de Camión</strong></h1>
	        </div>
            
            <div class="row">
				<div class="span4 bd-black padding15">
					<h3>Datos de Empleado</h3>
					<? foreach ($empleado as $fila):?>
						<blockquote>
							<p class="readable-text">
								<strong>Nombre Compleado: </strong><?= $fila->paterno?> <?= $fila->materno?>, <?= $fila->nombre?>
							</p>
						</blockquote>
						<blockquote>
							<p class="readable-text">
								<strong>Cedula de Identidad: </strong><?= $fila->ci?>
							</p>
						</blockquote>
						<blockquote>
							<p class="readable-text">
								<strong>Dirección: </strong><?= $fila->direccion?>
							</p>
						</blockquote>
						<blockquote>
							<p class="readable-text">
								<strong>Telefono/Celular: </strong><?= $fila->fono?>
							</p>
						</blockquote>
					<? endforeach?>
				</div>
				<div class="span1"></div>
				<div class="span4 padding15">
					<h3>Asignado a la Movilidad</h3>
					<? foreach ($camion as $fila):?>
						<blockquote>
							<p class="readable-text">
								<strong>Placa de Vehiculo: </strong><?= $fila->placa?>
							</p>
						</blockquote>
						<blockquote>
							<p class="readable-text">
								<strong>Descripcion de vehiculo: </strong><?= $fila->descripcion?>
							</p>
						</blockquote>
					<?endforeach?>
				</div>
			</div>	
        </div>
    </div>
</div>