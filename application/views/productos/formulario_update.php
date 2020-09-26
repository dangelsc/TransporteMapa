<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <?include('menu.php')?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner fi-list-thumbnails">Modificar  Producto</strong></h1>
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
            </div>
            
            <?foreach($lista_productos as $lista):?>
            <div class="form margin-top5">
                    <?php echo form_open_multipart("productos/update_producto/$lista->id");?>
                    <fieldset>
                        <label>Nombre del Producto</label>
                        <div class="input-control text" data-role="input-control">
                            <?php echo form_input(array('name'=>'nombre', 'type'=>'text', 'value'=>$lista->nombre, 'placeholder' => 'Ingrese el nombre del producto', 'required' => 'required', 'autofocus'=>'autofocus'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>
                        <label>Contenido</label>
                        <div class="input-control text" data-role="input-control">
                            <?php echo form_input(array('name'=>'contenido', 'type'=>'text', 'value'=>$lista->contenido, 'placeholder' => 'Ingrese el contenido del producto', 'required' => 'required', 'autofocus'=>'autofocus'))?>

                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>
                        <label>Descripcion</label>
                        <div class="input-control textarea" data-role="input-control">
                            <?php echo form_textarea(array('name'=>'descripcion', 'type'=>'text', 'value'=>$lista->descripcion, 'placeholder' => 'Ingrese la descripcion', 'required' => 'required'))?>
                        </div>
                        <label>Precio Normal</label>
                        <div class="input-control text" data-role="input-control">
                            <?php echo form_input(array('name'=>'p_normal', 'type'=>'text', 'value'=>$lista->precio_normal, 'placeholder' => 'Precio Normal', 'required' => 'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>
                        <label>Precio tienda</label>
                        <div class="input-control text" data-role="input-control">
                            <?php echo form_input(array('name'=>'p_tienda', 'type'=>'text', 'value'=>$lista->precio_tienda, 'placeholder' => 'Precio Tienda', 'required' => 'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div><label>Precio Agencia</label>
                        <div class="input-control text" data-role="input-control">
                            <?php echo form_input(array('name'=>'p_agencia', 'type'=>'text', 'value'=>$lista->precio_agencia, 'placeholder' => 'Precio Agencia', 'required' => 'required'))?>
                            <button class="btn-clear" tabindex="-1" type="button"></button>
                        </div>
                        <label>Seleccione una imagen para el producto</label>
                        <div class="tile">
                            <div class="tile-content image">
                            
                                <img src="<?=base_url()?>imagenes/<?=$lista->avatar?>">

                                <input type="hidden" name="imagen" value="<?=   $lista->avatar?>"><input/>

                            </div>
                            <div class="brand">
                                <span class="label fg-white"><?=$lista->nombre?></span>
                                <span class="badge bg-orange"><?=$lista->id?></span>
                            </div>
                        </div>
                        <div class="input-control"">
                        <?=form_input(array('name'=>'userfile', 'type'=>'file', 'value'=>set_value('userfile'), 'autofocus'=>'autofocus'))?>
                        </div><br/><br/><br/><br/><br/>
                        <label>Presentacion del Producto</label>
                        <div class="input-control select">
                            <select name="presentacion">
                                <?foreach ($tipo as $lista1):?>
                                    <?if($lista1->id==$lista->tipo_id):?>
                                        <option selected="selected" <?=$lista1->id?>"><?=$lista1->nombre?></option>
                                      <?else:?>
                                        <option value="<?=$lista1->id?>"><?=$lista1->nombre?></option>
                                    <?endif?>
                                <?endforeach?>
                            </select>
                        </div>

                        <label>Envase</label>
                        <div class="input-control select">
                            <select name="envase">
                                <?if($lista->retornable==0):?>
                                    <option selected="selected" value="0">Retornable</option>
                                <?else:?>
                                    <option value="1">No Retornable</option>
                                    <option value="0">Retornable</option>
                                <?endif?>
                            </select>
                        </div>
                <br/>
                <br/>
                <button type="submit"  class="btn-update"> Modificar</button>&nbsp &nbsp &nbsp
                <button type="reset" class="btn-cancel">    Limpiar</button>
                </fieldset>
                <?php echo form_close();?>
            </div>
            <?endforeach?>
    </div>

</div>