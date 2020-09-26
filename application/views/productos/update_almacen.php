<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner fi-list-thumbnails">Actualizar stock del Producto</strong></h1>
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>
                
            </div>
            
            <?foreach($detalle as $lista):?>
                <div class="form product flex-center">
                    <div class="product-image image-container span2 bg-white">
                        <img  src="<?=base_url()?>imagenes/<?=$lista->foto?>"  class="shadow rounded">
                        <div class="overlay">
                            <span class="text">
                                <strong>Presentacion: </strong>  <?=sacar_nombre_tipo($lista->tipo_id)?>
                            </span>
                        </div>
                    </div>
                    <div class="product-description " >
                        <p class="show-date" > &nbsp <strong >contenido:</strong>  <?=$lista->contenido?></p>
                        <p class="show-date"> &nbsp <strong>Envase:</strong>
                            <?if($lista->retornable==0):?>
                            Retornable</p>
                        <?endif?>
                        <?if($lista->retornable==1):?>
                            No Retornable</p>
                        <?endif?>
                        <p class="show-date"> &nbsp <strong>Entradas:</strong>  <?=$lista->entrada?> Unidades</p>
                        <p class="show-date"> &nbsp <strong>Salidas:</strong>  <?=$lista->salida?> Unidades</p>
                        <p class="show-date"> &nbsp <strong>Stock:</strong>  <?=$lista->stock?> Unidades</p>
                    </div>
                </div>
                <div class="form product flex-center" style=" margin-top: 10px;">
                
                    <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                    <?php echo form_open("productos/update_almacen/$lista->prod_id?");?>

                            <fieldset>

                                
                                <label class="show-date" style="padding: 5px 50px 5px 0 !important;">Cantidad de Productos a Registrar</label>
                                <div class="input-control text" data-role="input-control">
                                    <input type="text" name="ingreso" id="numLicenses" placeholder="Ingrese solo numeros" required="required"/>
                                    <input type="text" hidden="hidden" name="id" value="<?=$lista->almacen_id?>"/>
                                </div>

                                    <br/>
                                    <br/>
                                    <button type="submit"  class="fi-save btn-save"><i class=""></i>Guardar</button>&nbsp &nbsp &nbsp
                                    <button type="reset" class="btn-cancel fi-x">   <i class=""></i>  Limpiar</button>
                            </fieldset>
                     <?php echo form_close();?>
                <?endforeach?>
                </div>
        </div>
    </div>
</div>