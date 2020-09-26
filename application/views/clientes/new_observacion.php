<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
                <h1 class="table-title"><strong class="table-title-inner fi-clipboard-pencil">Registrar Observación</strong></h1>
            </div>
            <div class="row">
                <? foreach ($cliente as $fila):?>
                    <div class="span6 border bd-darkEmerald">
                        <? $id = $fila->id?>
                        <p class="readable-text"><strong>Cliente: </strong><?= $fila->paterno?> <?= $fila->materno?>, <?= $fila->nombre?></p>
                        <p class="readable-text"><strong>Cedula de Identidad: </strong><?= $fila->ci?></p>
                    </div>
                <? endforeach?>
                <div class="span3"></div>
            </div>
            <div class="row">
                <div class="span9">
                    <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                    <?= form_open("cliente/save_observacion/$id")?>
                        <fieldset>
                            <legend>Registro de Observación</legend>

                            <?= form_label('Descripcion de Observación', 'obs')?>
                            <div class="input-control textarea" data-role="input-control">
                                <?= form_textarea(array('id'=>'obs', 'name'=>'obs', 'value'=>set_value('obs'), 'required'=>'required'))?>
                            </div>

                            <button type="submit" name="submit" class="default"><i class="icon-user"></i> Guardar</button>
                            <a href="javascript:history.go(-1)" class="button danger">Cancelar</a>
                        </fieldset>
                    <?= form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>

