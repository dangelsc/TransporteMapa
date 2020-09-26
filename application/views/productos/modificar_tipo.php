<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <?php include('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner fi-list-thumbnails">Modificar Presentación</strong></h1>
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-red fg-white padding5"><b>ERROR :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>
                
            </div>
            <div class="wrapper margin-top5">
                <div class=" form">
                    <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                        <?foreach($seleccionar as $sele):?>
                            <?= form_open("productos/update_presentacion/$sele->id")?>
                            <fieldset>

                                <?= form_label('Nombre de la Presentacion', 'nick')?>
                                <div class="input-control textarea" data-role="input-control">
                                    <?php echo form_textarea(array('name'=>'descripcion', 'type'=>'text', 'value'=>$sele->nombre, 'placeholder' => 'Ingrese la presentacion', 'required' => 'required', 'autofocus'=>'autofocus'))?>
                                </div>

                                <button type="submit"  class="btn-update fi-refresh"> Modificar </button>&nbsp &nbsp &nbsp
                                <button type="reset" class="btn-cancel fi-x"> Limpiar</button>


                            </fieldset>
                            <?= form_close()?>
                        <?endforeach?>
                    <form action="" class="horizon"></form>
                </div>
            </div>
        </div>

    </div>
</div>