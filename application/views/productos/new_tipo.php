<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
                <?php include('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner fi-list-thumbnails">Registrar Nueva Presentacion</strong></h1>
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>
                
            </div>
            <div class="wrapper margin-top5">
                    <div class=" form">
                        <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                        <?if($mensaje!=''):?>
                            <div>
                                <p class="bg-red fg-white padding5"><b>ERROR :   </b> <?=$mensaje?></p>
                            </div>
                        <?endif?>
                        <?= form_open('productos/guardar_presentacion')?>
                        <fieldset>
                           
                            <?= form_label('Nombre de la Presentacion', 'nick')?>
                            <div class="input-control textarea" data-role="input-control">
                                <?php echo form_textarea(array('name'=>'descripcion', 'type'=>'text', 'value'=>set_value('username'), 'placeholder' => 'Ingrese la presentacion', 'required' => 'required', 'autofocus'=>'autofocus'))?>
                            </div>

                            <button type="submit"  class="btn-save"><i class="icon-floppy bg-green fg-white"></i>Guardar</button>&nbsp &nbsp &nbsp
                            <button type="reset" class="btn-cancel">   <i class="icon-remove bg-red"></i>  Limpiar</button>


                        </fieldset>
                        <?= form_close()?>
                    </div>
            
            </div>
        </div>
        
    </div>
</div>