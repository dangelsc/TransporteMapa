<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
            <? foreach ($cliente as $fila): ?>
            	<script>
				$(document).ready(function() {
					mostrar_mapa();
				});
				function mostrar_mapa() {
				  var latitud = <?= $fila->latitud?>;//-19.5750574; //position.coords.latitude;
				  var longitud = <?= $fila->longitud?>;//-65.77187359999999; //position.coords.longitude;
				  var image_url = "http://maps.google.com/maps/api/staticmap?sensor=false&center=" + latitud + "," +
				                    longitud + "&zoom=16&size=300x400&markers=color:red|label:P|" +
				                    latitud + ',' + longitud;
				    $('#mapa').append(
				        $(document.createElement("img")).attr("src", image_url).attr('id','map').attr('class', 'span3 polaroid bd-white shadow')
				    );
				}
				</script>
				
                <div class="content-table-title flex flex-around">
                    <h1 class="table-title" id="_description"> <strong class="table-title-inner">Detalle del Cliente</strong></h1>
                    <button class=" table-print">
                        <?php echo anchor("cliente/pdf_detalle_cliente/$fila->id",' Imprimir',array('class'=>'fg-white'))?>
                    </button>
                </div>
				<div class="form">
					<div class="">
						<p class="show-date" >
							<strong>Cedula de Identidad: </strong><?= $fila->ci ?>
						</p>
						<p class="show-date" >
							<strong>Nombre Completo: </strong><?= $fila->paterno ?> <?= $fila->materno ?>, <?= $fila->nombre ?>
						</p>
						<p class="show-date" >
							<strong class="show-date-color">Dirección: </strong><?= $fila->direccion ?>
						</p>
						<p class="show-date" >
							<strong>Telefono/Celular: </strong><?=$fila->fono?>
						</p>
						<p class="show-date" >
							<strong>Tipo de Cliente: </strong><?=$fila->tipo?>
						</p>
						<p class="show-date" >
							<strong>Correo Electronico: </strong><?= $fila->email?>
						</p>
						<p class="show-date" >
							<strong>Fecha de Nacimiento: </strong><?= $fila->fecha?>
						</p>
						<p class="show-date">
							<?foreach ($zona as $fila):?>
								<strong>Zona a la que Pertence: </strong> <?= $fila->nombre?>
							<? endforeach ?>
						</p>
					</div>

					<div id="mapa" class="span12">
					</div>

				</div>
        	<? endforeach ?>
        </div>
    </div>
</div>