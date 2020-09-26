<div class="wrapper margin-top5">
	<div class="content content-wrapper">
		<div class="menu">
			<? include 'menu.php';?>
		</div>
		<div class="content-table">
			<div class="content-table-title flex flex-around">
				<h1 class="table-title"><strong class="table-title-inner fi-marker">Ubicacion de los Clientes</strong></h1>
				<!--a  class="table-print" href="#" id="mostrar">  <p class="button info">Ver Ruta</p></a-->
				<?php echo anchor("camiones/pdf_camiones/",'Ruta ',array('class'=>' table-print block fi-eye','title'=>'IMPRIMIR EN PDF'))?>
			</div>
			<div id="mapa" class="border bd-black" style="height: 500px; margin-top:5px;">
				
			</div>
		</div>
		<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script-->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<script type="text/javascript">

			var map;
			var directionsDisplay;
			var directionsService;

			(function() {	
				
				directionsService = new google.maps.DirectionsService();
				directionsDisplay = new google.maps.DirectionsRenderer();


				var espana = new google.maps.LatLng(-19.5711374,-65.7502556);
				var opciones = {
					zoom : 15,
					center: espana,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var div = document.getElementById('mapa');				
				var map = new google.maps.Map($('#mapa').get(0), opciones);

				directionsDisplay.setMap(map);


				var ruta = [];
				<?foreach ($clientes as $fila):?>
					var nombre = "<?= $fila->nombre?> <?=$fila->paterno?> <?=$fila->materno?>";
					var lad = "<?= $fila->latitud?>";
					var longi = "<?= $fila->longitud?>";
					posicion = new google.maps.LatLng(lad,longi);
					var a = [posicion]

					ruta = ruta.concat(a);

					/*var marcador = new google.maps.Marker({
						title: nombre,
						position : posicion,//new google.maps.LatLng(lad,longi),
						map : map,
					});*/
					//alert(lad);
				<?endforeach?>
				/*var lineas = new google.maps.Polyline({
					path: ruta,
					map: map,
					strokeColor: '#222000',
					strokeWeight: 4,
					strokeOpacity: 0.6,
					clickable: false
				});*/
				
			})();


			function calcRoute() {
				var start = new google.maps.LatLng(-19.584319, -65.7504595);
				//-19.5857089,-65.7471121
				var end = new google.maps.LatLng(-19.5857089, -65.7471121);	

				var waypts = [];

				//var checkboxArray = document.getElementById('waypoints');
				
				<?foreach ($clientes as $fila):?>
					var lad = "<?= $fila->latitud?>";
					var longi = "<?= $fila->longitud?>";	
					waypts.push({
						location:new google.maps.LatLng(lad, longi),
						stopover:true});
				<?endforeach?>
				/*for (var i = 0; i < checkboxArray.length; i++) {
					if (checkboxArray.options[i].selected == true) {
						waypts.push({
						location:checkboxArray[i].value,
						stopover:true});
					}
				}*/

				var request = {
						origin: start,
						destination: end,
						waypoints: waypts,
						optimizeWaypoints: true,
						travelMode: google.maps.TravelMode.DRIVING
					};
				directionsService.route(request, function(response, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(response);
						var route = response.routes[0];
						var summaryPanel = document.getElementById('directions_panel');
						summaryPanel.innerHTML = '';
						// For each route, display summary information.
						for (var i = 0; i < route.legs.length; i++) {
							var routeSegment = i + 1;
							summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment + '</b><br>';
							summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
							summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
							summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
						}
					}
				});
			}



			function getDirections(){
				//-19.584319,-65.7504595,17
				var start = new google.maps.LatLng(-19.584319, -65.7504595);
				//'Bolivia, Potosi, tapia';
				var end = new google.maps.LatLng(-19.584319, -65.7504595);
				if(!start || !end){
					alert("Start and End addresses are required");
					return;
				}
				var request = {
				        origin: start,
				        destination: end,
				        travelMode: google.maps.TravelMode.DRIVING
				        //unitSystem: google.maps.DirectionsUnitSystem['METRIC'],
				        //provideRouteAlternatives: true
			    };
				directionsService.route(request, function(response, status) {
			        if (status == google.maps.DirectionsStatus.OK) {
			        	alert('Funcion');
			            //directionsDisplay.setMap(map);
			            //directionsDisplay.setPanel($("#directions_panel").get(0));
			            directionsDisplay.setDirections(response);
			        } else {
			            alert("There is no directions available between these two points");
			        }
			    });
		    }


		    jQuery(document).ready(function(){
				jQuery('#mostrar').click(function(){
				//getDirections();
				calcRoute();
				return false;
				});
			});
		</script>
	</div>
</div>