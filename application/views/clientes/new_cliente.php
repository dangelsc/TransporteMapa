<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
           <div class="row">
               <div class="span9">
                   <p id="errorgeo" class="bg-red fg-white padding5 none">
                       Tu Navegador No Soporta Geolocalizacion
                   </p>
               </div>
               <div class="content-table-title flex flex-around">
                    <h1 class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Registrar Nuevo Cliente</strong></h1>
                </div>
           </div>
            <div class="form margin-top5">
                <?php echo validation_errors('<div><p class="bg-red fg-white padding5">', '</p></div>'); ?>
            <?= form_open('cliente/save_cliente')?>
                <fieldset>
                    <?= form_label('Cedula de Identidad', 'ci')?>
                    <div class="input-control text" data-role="input-control">
                        <?= form_input(array('id'=>'ci', 'name'=>'ci', 'type'=>'number', 'value'=>set_value('ci'), 'placeholder'=>'Cedula de Identidad', 'required'=>'required'))?>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                    </div>

                    <?= form_label('Nombres', 'nombre')?>
                    <div class="input-control text" data-role="input-control">
                        <?= form_input(array('id'=>'nombre', 'name'=>'nombre', 'value'=>set_value('nombre'), 'placeholder'=>'Nombres', 'required'=>'required'))?>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                    </div>

                    <?= form_label('Apellido Paterno', 'paterno')?>
                    <div class="input-control text" data-role="input-control">
                        <?= form_input(array('id'=>'paterno', 'name'=>'paterno', 'value'=>set_value('paterno'), 'placeholder'=>'Apellido Paterno', 'required'=>'required'))?>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                    </div>

                    <?= form_label('Apellido Materno', 'materno')?>
                    <div class="input-control text" data-role="input-control">
                        <?= form_input(array('id'=>'materno', 'name'=>'materno', 'value'=>set_value('materno'), 'placeholder'=>'Apellido Materno', 'required'=>'required'))?>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                    </div>

                    <?= form_label('Dirección', 'direccion')?>
                    <div class="input-control text" data-role="input-control">
                        <?= form_input(array('id'=>'direccion', 'name'=>'direccion', 'value'=>set_value('direccion'), 'placeholder'=>'Dirección', 'required'=>'required'))?>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                    </div>

                    <?= form_label('Telefono / Celular', 'fono')?>
                    <div class="input-control text" data-role="input-control">
                        <?= form_input(array('id'=>'fono', 'name'=>'fono', 'type'=>'tel', 'value'=>set_value('fono'), 'placeholder'=>'Telefono / Celular', 'required'=>'required'))?>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                    </div>

                    <?= form_label('Fecha de Nacimiento', 'fecha')?>
                    <div class="input-control text" data-role="input-control">
                        <?= form_input(array('id'=>'fecha', 'name'=>'fecha', 'type'=>'date', 'value'=>set_value('fecha'), 'placeholder'=>'Fecha de Nacimiento', 'required'=>'required'))?>
                    </div>

                    <?= form_label('Correo Electronico', 'email')?>
                    <div class="input-control text" data-role="input-control">
                        <?= form_input(array('id'=>'email', 'name'=>'email', 'type'=>'email', 'value'=>set_value('email'), 'placeholder'=>'Correo Electronico'))?>
                    </div>

                    <?= form_label('Tipo de Cliente', 'tipo')?>
                    <div class="input-control select" data-role="input-control">
                        <? $opciones = array(
                            'Agencia'=>'Agencia',
                            'Tienda'=>'Tienda',
                            'Normal'=>'Normal',
                            'Brosteria' =>'Brosteria',
                        )?>
                        <?= form_dropdown('tipo', $opciones)?>
                    </div>

                    <?= form_label('Seleccione una Zona', 'zona');?>
                    <div class="input-control select">
                        <select name="zona" id="">
                            <? foreach ($zonas as $fila):?>
                                <option value="<?= $fila->id ?>"><?= $fila->nombre?></option>
                            <? endforeach ?>
                        </select>
                    </div>

                    <input hidden="hidden" id="latitud" name="latitud" type="text" value="-19.5711374" placeholder="latitud">
                    <input hidden="hidden" id="longitud" name="longitud" type="text" value="-65.7502556" placeholder="longitud">

                    <button type="submit" name="submit" class="btn-save"><i class="icon-user"></i> Guardar</button>
                    <a href="javascript:history.go(-1)" class="btn-cancel ">Cancelar</a>
                    <div class="wrapper margin-top5">
                        <div class="form">
                            <div id="mapa" class="border bd-black" style="height: 500px; widht:90%;">
                                
                            </div>
                        </div>
                    </div>
                </fieldset>
            <?= form_close()?>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script language="javascript">
    $(document).ready(function(){
        var map;
        var centro = new google.maps.LatLng(-19.5711374,-65.7502556);
        var geocoder = new google.maps.Geocoder();

        var opciones = {
            zoom : 15,
            center: centro,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("mapa"), opciones);

        var marker = new google.maps.Marker({
            title:"Mi Posicion",
            map: map,
            position: new google.maps.LatLng(-19.5711374,-65.7502556),
            draggable: true,
            animation: google.maps.Animation.DROP
        });
        google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
        google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
    });
    function openInfoWindow(markerdgg){
        var markerLatLng = markerdgg.getPosition();
        updatePosition(markerLatLng);
    }
    function updatePosition(latLng)
    {
        $('#latitud').val(latLng.lat());
        $('#longitud').val(latLng.lng());
    }
</script>
