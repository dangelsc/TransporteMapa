<div class="grid">
    <div class="row">
        <div class="span3">
            
        </div>
        <div class="span9">
           <div class="row">
               <div class="span9">
                   <p id="errorgeo" class="bg-red fg-white padding5 none">
                       Tu Navegador No Soporta Geolocalizacion
                   </p>
               </div>
           </div>
            <div class="row">
                <div class="span6">
                    <h3>Movilidad</h3>
                    <? foreach ($camion as $fila):?>
                        <? $camion_id = $fila->id?>
                        <blockquote>
                            <p class="">
                                <strong>Placa de Vehiculo: </strong><?= $fila->placa?>
                            </p>
                        </blockquote>
                    <?endforeach?>
                </div>
                <div class="span3">
                
                </div>
            </div>
            <div class="row">
                <div class="span9">
                    <table class="table hovered">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Cedula</th>
                                <th class="text-left">Nombre Completo</th>
                                <th class="text-left">Dirección</th>
                                <th class="text-left"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? $num = 1 ?>
                            <?php foreach ($clientes as $fila): ?>
                                <tr>
                                    <td><?=$num++?></td>
                                    <td><?= $fila->ci?></td>
                                    <td><?=$fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
                                    <td><?= $fila->direccion?></td>
                                    <?$reserva_id = get_reserva_id_camion($camion_id, $fila->id)?>
                                    <td><?= anchor("reservas/detalle_reserva_camion/$reserva_id/$camion_id", 'Detalle de Reserva');?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="span9">
                    <h3>Ubicacion de los Clientes</h3>
                    <p>
                        <a href="#" id="mostrar" class="button primary large">Ver Ruta</a>
                    </p>
                    <div id="mapa" class="border bd-black" style="height: 500px;">
                        
                    </div>
                </div>
<script type="text/javascript">
    $(document).ready(function(){
        var refreshId = setInterval(refrescarTablaEstadoSala, 30000);
        $.ajaxSetup({ cache: false });  
        
        function refrescarTablaEstadoSala() {
            $('#errorgeo').addClass('none');
            if (navigator.geolocation){
                navigator.geolocation.getCurrentPosition(function(objPosition)
                {
                    var yolon = objPosition.coords.longitude;
                    var yolat = objPosition.coords.latitude;
                    var camion_id = "<?= $camion_id ?>";
                    $.ajax({
                        data:{'latitud': yolat, 'longitud':yolon, 'camion_id':camion_id},
                        url:"<?= base_url() ?>"+"index.php/posiciones/save_position",
                        type: "GET",
                        success: function(data){
                            if(data == 'no'){
                                refrescarTablaEstadoSala();
                            }
                            else{
                                console.log('ubicacion enviada correctamente');
                            }
                        },
                        failure: function(data){
                            console.log('error');
                        }
                    });
                    
                }, function(objPositionError)
                {
                    var div = $('#errorgeo');
                    div.removeClass('none');
                    switch (objPositionError.code)
                    {
                        case objPositionError.PERMISSION_DENIED:
                            div.html("No se ha permitido el acceso a la posición del usuario.");
                        break;
                        case objPositionError.POSITION_UNAVAILABLE:
                            div.html("No se ha podido acceder a la información de su posición.");
                        break;
                        case objPositionError.TIMEOUT:
                            div.html("El servicio ha tardado demasiado tiempo en responder.");
                        break;
                        default:
                            div.html("Error desconocido.");
                    }
                }, {
                    maximumAge: 30000,
                    timeout: 15000
                });
            }
            else{
                $('#errorgeo').removeClass('none');
                $('#errorgeo').html('Tu Navegador No Soporta Geolocalizacion');
            }
        }
    });
</script>
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
                        <?php foreach ($posicion as $fila): ?>
                            var latitud = <?= $fila->latitud?>;
                            var longitud = <?= $fila->longitud?>;
                        <?php endforeach ?>

                         var markerdgg = new google.maps.Marker({
                            map: map,
                            position: new google.maps.LatLng(latitud, longitud),
                            icon:new google.maps.MarkerImage("<?= base_url()?>images/icon_maps/pin2.png",new google.maps.Size(20, 30))
                        });
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
                        var start = new google.maps.LatLng(-19.582344, -65.74898);
                        //19.582344,-65.74898,
                        var end = new google.maps.LatLng(-19.5823061,-65.7495164); 
                        //-19.5823061,-65.7495164 

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
                        var start = new google.maps.LatLng(-19.582344, -65.74898);
                        //19.582344,-65.74898,
                        var end = new google.maps.LatLng(-19.5823061,-65.7495164); 
                        //-19.5823061,-65.7495164
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
    </div>
</div>