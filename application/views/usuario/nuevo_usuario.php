<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <?include('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Registrar Nuevo Usuario</strong></h1>
            </div>
            <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
            <?if($mensaje!=''):?>
                <div>
                    <p><b>Error :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <?php echo form_open('usuario/reg_nuevo');?>
                <fieldset>
                    </br>
                    <label><b>Nombre de Usuario</b></label>
                    <div class="input-control text" data-role="input-control">
                        <?php echo form_input(array('name'=>'username', 'type'=>'text', 'value'=>set_value('username'), 'placeholder' => 'Ingrese su nombre de usuario', 'required' => 'required', 'autofocus'=>'autofocus'))?>

                        <button class="btn-clear" tabindex="-1" type="button"></button>
                    </div>
                    <label><b>Contraseña</b></label>
                    <div class="input-control password" data-role="input-control">

                        <?php echo form_input(array('name'=>'password', 'type'=>'password',  'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>

                        <button class="btn-reveal" tabindex="-1" type="button"></button>
                    </div>
                    <label><b>Repita Contraseña</b></label>
                    <div class="input-control password" data-role="input-control">
                        <?php echo form_input(array('name'=>'passconf', 'type'=>'password', 'placeholder' => 'Ingrese su contraseña', 'required' => 'required'))?>
                        <button class="btn-reveal" tabindex="-1" type="button"></button>
                    </div>
                    <label><b>Correo Electronico</b></label>
                    <div class="input-control password" data-role="input-control">
                        <?php echo form_input(array('name'=>'email', 'type'=>'email', 'value'=>set_value('email'), 'placeholder' => 'Ingrese su Correo Electronico', 'required' => 'required'))?>
                        <button class="btn-reveal" tabindex="-1" type="button"></button>
                    </div>
                    <br/>
                    <br/>
                    <button type="submit"  class="btn-save">Guardar</button>&nbsp &nbsp &nbsp
                    <button type="reset" class="btn-clear">    Limpiar</button>



                </fieldset>
            <?php echo form_close();?>
        </div>
        
</div>