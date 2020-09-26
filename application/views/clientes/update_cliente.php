<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
                <h1 class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Modificar Datos de Cliente</strong></h1>
            </div>
            <div class="wrapper margin-top5">
                <div class=" form">
                  <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                  <? foreach ($cliente as $fila):?>
                      <?= form_open("cliente/update_save_clieten/$fila->id")?>
                          <fieldset>
                              <?= form_label('Cedula de Identidad', 'ci')?>
                              <div class="input-control text" data-role="input-control">
                                  <?= form_input(array('id'=>'ci', 'name'=>'ci', 'type'=>'number', 'value'=>$fila->ci, 'placeholder'=>'Cedula de Identidad', 'required'=>'required'))?>
                                  <button class="btn-clear" tabindex="-1" type="button"></button>
                              </div>

                              <?= form_label('Nombres', 'nombre')?>
                              <div class="input-control text" data-role="input-control">
                                  <?= form_input(array('id'=>'nombre', 'name'=>'nombre', 'value'=>$fila->nombre, 'placeholder'=>'Nombres', 'required'=>'required'))?>
                                  <button class="btn-clear" tabindex="-1" type="button"></button>
                              </div>

                              <?= form_label('Apellido Paterno', 'paterno')?>
                              <div class="input-control text" data-role="input-control">
                                  <?= form_input(array('id'=>'paterno', 'name'=>'paterno', 'value'=>$fila->paterno, 'placeholder'=>'Apellido Paterno', 'required'=>'required'))?>
                                  <button class="btn-clear" tabindex="-1" type="button"></button>
                              </div>

                              <?= form_label('Apellido Materno', 'materno')?>
                              <div class="input-control text" data-role="input-control">
                                  <?= form_input(array('id'=>'materno', 'name'=>'materno', 'value'=>$fila->materno, 'placeholder'=>'Apellido Materno', 'required'=>'required'))?>
                                  <button class="btn-clear" tabindex="-1" type="button"></button>
                              </div>

                              <?= form_label('Dirección', 'direccion')?>
                              <div class="input-control text" data-role="input-control">
                                  <?= form_input(array('id'=>'direccion', 'name'=>'direccion', 'value'=>$fila->direccion, 'placeholder'=>'Dirección', 'required'=>'required'))?>
                                  <button class="btn-clear" tabindex="-1" type="button"></button>
                              </div>

                              <?= form_label('Telefono / Celular', 'fono')?>
                              <div class="input-control text" data-role="input-control">
                                  <?= form_input(array('id'=>'fono', 'name'=>'fono', 'type'=>'tel', 'value'=>$fila->fono, 'placeholder'=>'Telefono / Celular', 'required'=>'required'))?>
                                  <button class="btn-clear" tabindex="-1" type="button"></button>
                              </div>

                              <?= form_label('Fecha de Nacimiento', 'fecha')?>
                              <div class="input-control text" data-role="input-control">
                                  <?= form_input(array('id'=>'fecha', 'name'=>'fecha', 'type'=>'date', 'value'=>$fila->fecha, 'placeholder'=>'Fecha de Nacimiento', 'required'=>'required'))?>
                              </div>

                              <?= form_label('Correo Electronico', 'email')?>
                              <div class="input-control text" data-role="input-control">
                                  <?= form_input(array('id'=>'email', 'name'=>'email', 'type'=>'email', 'value'=>$fila->email, 'placeholder'=>'Correo Electronico'))?>
                              </div>

                              <?= form_label('Tipo de Cliente', 'tipo')?>
                              <div class="input-control select" data-role="input-control">
                                  <select id="tipo" name="tipo">
                                      <? if($fila->tipo == 'Agencia'): ?>
                                          <option value="Agencia" selected="selected">Agencia</option>
                                          <option value="Tienda">Tienda</option>
                                          <option value="Kinder">Normal</option>
                                      <?endif?>
                                      <?if($fila->tipo == 'Tienda'):?>
                                          <option value="Agencia">Agencia</option>
                                          <option value="Tienda" selected="selected">Tienda</option>
                                          <option value="Normal">Normal</option>
                                      <? endif ?>
                                      <?if($fila->tipo == 'Normal'):?>
                                          <option value="Agencia">ParvAgenciaulario</option>
                                          <option value="Tienda">Tienda</option>
                                          <option value="Normal" selected="selected">Normal</option>
                                      <? endif ?>
                                  </select>
                              </div>
                              
                              <?= form_label('Seleccione una Zona', 'zona');?>
                              <div class="input-control select">
                                  <select name="zona" id="">
                                      <? foreach ($zonas as $z):?>
                                          <option value="<?= $z->id ?>"><?= $z->nombre?></option>
                                      <? endforeach ?>
                                  </select>
                              </div>
                              <div class="form margin-top5">
                                <input hidden="hidden" type="text" id="address" name="address" value="Bolivia, Potosi"/>
                                <a href="#" id="pasar" style="width:200px; margin-left:-50px; margin-top:-20px;" class="btn-maps">Cambiar Ubicación</a> 
                                <div id="map_canvas" style="height: 300px; border:1px solid grey;margin-top:10px;">
                                </div>
                              </div>
                              <input hidden="hidden" id="latitud" name="latitud" type="text" placeholder="latitud" value="<?= $fila->latitud?>">
                              <input hidden="hidden" id="longitud" name="longitud" type="text" placeholder="longitud" value="<?= $fila->longitud?>">
                              <button type="submit" name="submit" class="btn-update fi-refresh"> Modificar</button>
                              <a href="javascript:history.go(-1)" class="btn-cancel">Cancelar</a>
                          </fieldset>
                      <?= form_close()?>
                  <? endforeach ?>
                  <form action="#">
                      
                  </form>
              </div>
          </div>
      </div>
    </div>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    //Declaramos las variables que vamos a user
    var lat = null;
    var lng = null;
    var map = null;
    var geocoder = null;
    var marker = null;
             
    jQuery(document).ready(function(){
         //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
         lat = jQuery('#latitud').val();
         lng = jQuery('#longitud').val();
         //Asignamos al evento click del boton la funcion codeAddress
         jQuery('#pasar').click(function(){
            codeAddress();
            return false;
         });
         //Inicializamos la función de google maps una vez el DOM este cargado
        initialize();
    });
         
        function initialize() {
         
          geocoder = new google.maps.Geocoder();
            
           //Si hay valores creamos un objeto Latlng
           if(lat !='' && lng != '')
          {
             var latLng = new google.maps.LatLng(lat,lng);
          }
          else
          {
            //-19.5711374,-65.7502556,13
             var latLng = new google.maps.LatLng(-19.5711374,-65.7502556);
          }
          //Definimos algunas opciones del mapa a crear
           var myOptions = {
              center: latLng,//centro del mapa
              zoom: 15,//zoom del mapa
              mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
            };
            //creamos el mapa con las opciones anteriores y le pasamos el elemento div
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
             
            //creamos el marcador en el mapa
            marker = new google.maps.Marker({
                map: map,//el mapa creado en el paso anterior
                position: latLng,//objeto con latitud y longitud
                draggable: true //que el marcador se pueda arrastrar
            });
            
           //función que actualiza los input del formulario con las nuevas latitudes
           //Estos campos suelen ser hidden
            updatePosition(latLng);
             
             
        }
         
        //funcion que traduce la direccion en coordenadas
        function codeAddress() {
             
            //obtengo la direccion del formulario
            var address = document.getElementById("address").value;
            //hago la llamada al geodecoder
            geocoder.geocode( { 'address': address}, function(results, status) {
             

            //si el estado de la llamado es OK
            if (status == google.maps.GeocoderStatus.OK) {
                //centro el mapa en las coordenadas obtenidas
                map.setCenter(results[0].geometry.location);
                //coloco el marcador en dichas coordenadas
                marker.setPosition(results[0].geometry.location);
                //actualizo el formulario      
                updatePosition(results[0].geometry.location);
                 
                //Añado un listener para cuando el markador se termine de arrastrar
                //actualize el formulario con las nuevas coordenadas
                google.maps.event.addListener(marker, 'dragend', function(){
                    updatePosition(marker.getPosition());
                });
          } else {
              //si no es OK devuelvo error
              alert("No podemos encontrar la direcci&oacute;n, error: " + status);
          }
        });
      }
       
      //funcion que simplemente actualiza los campos del formulario
      function updatePosition(latLng)
      {
           //alert(latLng.lat());
           //alert(latLng.lng());
           $('#latitud').val(latLng.lat());
           $('#longitud').val(latLng.lng());
      }
</script>