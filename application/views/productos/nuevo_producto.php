<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <?include('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Registrar Nuevo Producto</strong></h1>
            </div>
            <div class="wrapper margin-top5">
            <div class=" form">
            <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
            <?if($mensaje!=''):?>
                <div>
                    <p><b>Error :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <?if($error!=''):?>
                <div>
                    <p><b>Error :   </b> <?=$error?></p>
                </div>
            <?endif?>
            <?php echo form_open_multipart('productos/reg_producto');?>
            <fieldset>
                
                <label>Nombre del Producto</label>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'nombre', 'type'=>'text', 'value'=>set_value('nombre'), 'placeholder' => 'Ingrese el nombre del producto', 'required' => 'required', 'autofocus'=>'autofocus'))?>
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label>Contenido</label>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'contenido', 'type'=>'text', 'value'=>set_value('username'), 'placeholder' => 'Ingrese el contenido del producto', 'required' => 'required', 'autofocus'=>'autofocus'))?>

                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label>Descripcion</label>
                <div class="input-control textarea" data-role="input-control">
                    <?php echo form_textarea(array('name'=>'descripcion', 'type'=>'text', 'value'=>set_value('password'), 'placeholder' => 'Ingrese la descripcion', 'required' => 'required'))?>
                </div>
                <label>Precio Normal</label>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'p_normal', 'type'=>'text', 'value'=>set_value('p_normal'), 'placeholder' => 'Precio Normal', 'required' => 'required'))?>
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label>Precio tienda</label>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'p_tienda', 'type'=>'text', 'value'=>set_value('p_tienda'), 'placeholder' => 'Precio Tienda', 'required' => 'required'))?>
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div><label>Precio Agencia</label>
                <div class="input-control text" data-role="input-control">
                    <?php echo form_input(array('name'=>'p_agencia', 'type'=>'text', 'value'=>set_value('p_agencia'), 'placeholder' => 'Precio Agencia', 'required' => 'required'))?>
                    <button class="btn-clear" tabindex="-1" type="button"></button>
                </div>
                <label>Seleccione una imagen para el producto</label>
                <div class="input-control">
                        <?=form_input(array('name'=>'userfile', 'type'=>'file', 'value'=>set_value('userfile'), 'autofocus'=>'autofocus'))?></div><br/>
                <label>Presentacion del Producto</label>
                <div class="input-control select">
                    <select name="presentacion">
                        <?foreach ($tipo as $lista):?>
                            <option value="<?=$lista->id?>"><?=$lista->nombre?></option>
                        <?endforeach?>
                    </select>
                </div>
                <label>Envase</label>
                <div class="input-control select">
                    <select name="envase">
                        <option value="0">Retornable</option>
                        <option value="1">No Retornable</option>
                    </select>
                </div>
                <br/>
                <br/>
                <button type="submit"  class="btn-save"><i class="icon-floppy bg-green fg-white"></i>Guardar</button>&nbsp &nbsp &nbsp
                <button type="reset" class="btn-cancel">   <i class="icon-remove bg-red"></i>  Limpiar</button>
            </fieldset>
            <?php echo form_close();?>
            </div>
            </div>
        </div>
        
    </div>