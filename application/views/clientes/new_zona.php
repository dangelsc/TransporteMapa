<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
                <h1 class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Registrar Zona</strong></h1>
            </div>
            <div class="wrapper margin-top5">
                <div class=" form">
                    <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                    <?= form_open("cliente/save_zona")?>
                        <fieldset>
                            <?= form_label('Nombre de Zona', 'zona')?>
                            <div class="input-control text" data-role="input-control">
                                <?= form_input(array('id'=>'zona', 'name'=>'zona', 'value'=>set_value('zona'), 'required'=>'required', 'placeholder'=>'Nombre de Zona'))?>
                                <button class="btn-clear" tabindex="-1" type="button"></button>
                            </div>

                            <button type="submit" name="submit" class="btn-save"><i class="fi-save"></i> Guardar</button>
                            <a href="javascript:history.go(-1)" class="btn-cancel fi-x">Cancelar</a>
                        </fieldset>
                    <?= form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>

