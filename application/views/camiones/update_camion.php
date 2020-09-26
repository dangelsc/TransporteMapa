<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Modificar Datos de Camión</strong></h1>
            </div>
            <div class="wrapper margin-top5">
                <div class=" form">
                    <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                    <?foreach ($camion as $fila):?>
                        <?= form_open("camiones/save_update/$fila->id")?>
                            <fieldset>
                                

                                <?= form_label('Placa de Camión', 'placa')?>
                                <div class="input-control text" data-role="input-control">
                                    <?= form_input(array('id'=>'placa', 'name'=>'placa', 'value'=>$fila->placa, 'placeholder'=>'Placa de Movilidad', 'required'=>'required'))?>
                                    <button class="btn-clear" tabindex="-1" type="button"></button>
                                </div>

                                <?= form_label('Descripcion', 'desc')?>
                                <div class="input-control textarea" data-role="input-control">
                                    <?= form_textarea(array('id'=>'desc', 'name'=>'desc', 'value'=>$fila->descripcion, 'required'=>'required'))?>
                                </div>

                                <button type="submit" name="submit" class="btn-update fi-refresh"><i class="icon-user"></i> Modificar</button>
                                <a href="javascript:history.go(-1)" class="btn-cancel">Cancelar</a>
                            </fieldset>
                        <?= form_close()?>
                    <?endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>