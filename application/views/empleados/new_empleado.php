<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Registrar Empleado</strong></h1>
            </div>
            <div class="form margin-top5">
                <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                <?= form_open('empleados/save_empleado')?>
                    <fieldset>
                        <?= form_label('Cedula de Identidad', 'ci')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'ci', 'name'=>'ci', 'type'=>'number', 'value'=>set_value('ci'), 'placeholder'=>'Cedula de Identidad', 'required'=>'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>

                        <?= form_label('Nombres', 'nombre')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'nombre', 'name'=>'nombre', 'value'=>set_value('nombre'), 'placeholder'=>'Nombres', 'required'=>'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>

                        <?= form_label('Apellido Paterno', 'paterno')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'paterno', 'name'=>'paterno', 'value'=>set_value('paterno'), 'placeholder'=>'Apellido Paterno', 'required'=>'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>

                        <?= form_label('Apellido Materno', 'materno')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'materno', 'name'=>'materno', 'value'=>set_value('materno'), 'placeholder'=>'Apellido Materno', 'required'=>'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>

                        <?= form_label('Dirección', 'direccion')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'direccion', 'name'=>'direccion', 'value'=>set_value('direccion'), 'placeholder'=>'Dirección', 'required'=>'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>

                        <?= form_label('Telefono / Celular', 'fono')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'fono', 'name'=>'fono', 'type'=>'tel', 'value'=>set_value('fono'), 'placeholder'=>'Telefono / Celular', 'required'=>'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>

                        <?= form_label('Fecha de Nacimiento', 'fecha')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'fecha', 'name'=>'fecha', 'type'=>'date', 'value'=>set_value('fecha'), 'placeholder'=>'Fecha de Nacimiento', 'required'=>'required'))?>
                        </div>

                        <?= form_label('Correo Electronico', 'email')?>
                        <div class="input-control text" data-role="input-control">
                            <?= form_input(array('id'=>'email', 'name'=>'email', 'type'=>'email', 'value'=>set_value('email'), 'placeholder'=>'Correo Electronico'))?>
                        </div>

                        <button type="submit" name="submit" class="btn-save"><i class="icon-user"></i> Guardar</button>
                        <a href="javascript:history.go(-1)" class="btn-cancel">Cancelar</a>
                    </fieldset>
                <?= form_close()?>
            </div>
        </div>
    </div>
</div>