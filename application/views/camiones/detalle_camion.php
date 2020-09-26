<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
        	<div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Modificar Datos</strong></h1>
            </div>
            <h3>Detalle Camión</h3>
            <div class="row">
				<div class="span9">
					<?foreach ($camion as $fila):?>
						<p class="readable-text">
							<strong>Placa de Movilidad: </strong><?= $fila->placa ?>
						</p>
						<p class="readable-text">
							<strong>Descripción: </strong>
						</p>
						<p class="padding5 border bd-black"><?=$fila->descripcion?></p>
					<?endforeach?>
				</div>
			</div>	
        </div>
    </div>
</div>