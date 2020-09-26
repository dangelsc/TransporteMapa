<div class="wrapper margin-top5"  >
    <div class="content content-wrapper margin-top60" style="height: 71vh;">
        
        <div class=" flex flex-center content-33 ">
            <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-red fg-white padding5"><b>ERROR :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <?= form_open('welcome/sesion_inic')?>
            <fieldset>
                <legend><i class="fi-torsos-male-female"></i>    Iniciar Sesion</legend>

                <?= form_label('Nombre de Usuario', 'nick')?>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'username', 'type'=>'text', 'value'=>set_value('username'), 'placeholder' => 'Ingrese su nombre de usuario', 'required' => 'required', 'autofocus'=>'autofocus'))?>
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>

                <?= form_label('Password', 'password')?>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'pass', 'type'=>'password', 'value'=>set_value('password'), 'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>

                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <button type="submit" name="submit" class="btn-ingresar fi-lock"> Ingresar</button>
                <?= anchor('', 'Cancelar', array('class'=>' btn-cancel fi-x'))?>
            </fieldset>
            <?= form_close()?>
            <form action="" class="horizon"></form>
        </div>
        
    </div>
</div>