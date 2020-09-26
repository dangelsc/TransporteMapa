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
               <div class="content-table-title flex-around">
                    <h1 class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Registrar Camión</strong></h1>
                </div>
           </div>
            <div class="form margin-top5">
                <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                <?= form_open('camiones/save_camion')?>
                    <fieldset>
                        <?= form_label('Placa de Camión', 'placa')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'placa', 'name'=>'placa', 'value'=>set_value('placa'), 'placeholder'=>'Placa de Movilidad', 'required'=>'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>

                        <?= form_label('Descripcion', 'desc')?>
                        <div class="input-control textarea" data-role="input-control">
                            <?= form_textarea(array('id'=>'desc', 'name'=>'desc', 'value'=>set_value('desc'), 'required'=>'required'))?>
                        </div>

                        <button type="submit" name="submit" class="btn-save"><i class="icon-user"></i> Guardar</button>
                        <a href="javascript:history.go(-1)" class="btn-cancel">Cancelar</a>
                    </fieldset>
                <?= form_close()?>
            </div>
        </div>
    </div>
</div>