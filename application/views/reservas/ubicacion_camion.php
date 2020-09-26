<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
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
                    <div id="mapa" class="border bd-black" style="height: 500px;">
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript">

    var map;

    (function() {   
        var geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(-19.5722805,-65.75500629999999);
        var myOptions = {
            center: latLng,//centro del mapa
            zoom: 15,//zoom del mapa
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var div = document.getElementById('mapa');              
        map = new google.maps.Map(document.getElementById("mapa"), myOptions);

        var lad;
        var longi;
        var posicion;
        <?foreach ($ubicaciones as $fila):?>
            lad = "<?= $fila->latitud?>";
            longi = "<?= $fila->longitud?>";
            posicion = new google.maps.LatLng(lad,longi);
            //var a = [posicion]


            var marcador = new google.maps.Marker({
                //title: nombre,
                position : posicion,//new google.maps.LatLng(lad,longi),
                map : map,
            });
            //alert(lad);
        <?endforeach?>
        
    })();
</script>