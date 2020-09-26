<div class="grid">
    <div class="row">
        <div class="span3">
        </div>
        <div class="span6">
            <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-red fg-white padding5"><b>ERROR :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <?= form_open('welcome/update_contrasena')?>
            <fieldset>
                <legend class="text-center"><i class="icon-locked-2"></i>    Modificar Contraseña</legend>

                <?= form_label('Contraseña Actual', 'actual')?>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'password1', 'type'=>'password', 'value'=>set_value('password'), 'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>

                </div>

                <?= form_label('Password', 'password')?>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'password', 'type'=>'password', 'value'=>set_value('password'), 'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>

                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <?= form_label('Password', 'password')?>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'passconf', 'type'=>'password', 'value'=>set_value('password'), 'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>

                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <button type="submit" name="submit" class="default"><i class="icon-key-2"></i> Modificar</button>
                <?= anchor('cliente', 'Cancelar', array('class'=>'button danger'))?>
            </fieldset>
            <?= form_close()?>
            <form action="" class="horizon"></form>
        </div>
        <div class="span3">

        </div>
    </div>
</div>