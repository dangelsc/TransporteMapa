<div class="grid">
    <div class="row">
        <div class="span3">
        </div>
        <div class="span7">
            <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
            <?if($mensaje!=''):?>
                <div>
                    <p><b>Error :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>

            <?foreach ($consulta as $fila):?>
                <?php echo form_open("welcome/reg_cambio/$fila->id");?>
                    <fieldset>
                        <legend> <h2 id="_default "><i class="icon-user on-left"></i>Modificar Datos</h2></legend>
                        <label>Nombre de Usuario</label>
                        <div class="input-control text" data-role="input-control">
                            <?php echo form_input(array('name'=>'username', 'type'=>'text', 'value'=>$fila->nick, 'placeholder' => 'Ingrese su nombre de usuario', 'required' => 'required', 'autofocus'=>'autofocus'))?>

                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>
                        <label>Correo Electronico</label>
                        <div class="input-control password" data-role="input-control">
                            <?php echo form_input(array('name'=>'email', 'type'=>'email', 'value'=>$fila->email, 'placeholder' => 'Ingrese su Correo Electronico', 'required' => 'required'))?>
                            <button class="btn-reveal" tabindex="-1" type="button"></button>
                        </div>
                        <br/>
                        <br/>
                        <button type="submit"  class="default"><i class="icon-floppy bg-green fg-white"></i>Modificar</button>&nbsp &nbsp &nbsp
                        <button type="reset" class="button danger">   <i class="icon-remove bg-red"></i>  Limpiar</button>



                    </fieldset>
                <?php echo form_close();?>
        <?endforeach?>
        </div>
        <div class="span2">
        </div>
    </div>