<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php' );?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Modificar Contraseña</strong></h1>
            </div>
            <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-red fg-white padding5"><b>ERROR :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <?= form_open('usuario/update_contrasena')?>
            <fieldset>
                </br >

                
                <label><b>Contraseña Actual</b></label>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'password1', 'type'=>'password', 'value'=>set_value('password'), 'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>

                </div>

                
                <label><b>Password</b></label>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'password', 'type'=>'password', 'value'=>set_value('password'), 'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>

                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label><b>Password</b></label>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'passconf', 'type'=>'password', 'value'=>set_value('password'), 'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>

                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <button type="submit" name="submit" class="btn-update">Modificar</button>
                <?= anchor('cliente', 'Cancelar', array('class'=>'btn-cancel'))?>
            </fieldset>
            <?= form_close()?>
            <form action="" class="horizon"></form>
        </div>
        
    </div>
</div>