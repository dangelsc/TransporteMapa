<div class="grid">
    <div class="row">
        <div class="span3">
            <? include('menu.php') ?>
        </div>
        <div class="span9">
            <h2 id="_description"><i class=" icon-cart"></i>  <strong>Stock del Producto</strong></h2>
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <?foreach($detalle as $lista):?>
                    <div class="row">
                        <div class="span9">
                            <div class="image-container span2">
                                <div class="tile-content image">
                                    <img src="<?=base_url()?>imagenes/<?=$lista->foto?>">
                                </div>
                                <div class="overlay-fluid">
                                    <span class="text">
                                        <strong>Presentacion: </strong>  <?=sacar_nombre_tipo($lista->tipo_id)?>
                                    </span>
                                </div>
                            </div>
                            <p class="text-muted"> &nbsp <strong>Contenido:</strong>  <?=$lista->contenido?></p>
                            <p class="text-muted"> &nbsp <strong>Envase:</strong>
                                <?if($lista->retornable==0):?>
                                Retornable</p>
                            <?endif?>
                            <?if($lista->retornable==1):?>
                                No Retornable</p>
                            <?endif?>
                            <p class="text-muted"> &nbsp <strong>Entradas:</strong>  <?=$lista->entrada?> Unidades</p>
                            <p class="text-muted"> &nbsp <strong>Salidas:</strong>  <?=$lista->salida?> Unidades</p>
                            <p class="text-muted"> &nbsp <strong>Stock:</strong>  <?=$lista->stock?> Unidades</p>
                            &nbsp <p class="button success"><?=anchor("productos/actulizar_stock/$lista->prod_id","  Actualizar Stock", array('class'=>'icon-database'))?></p>
                        </div>
                    </div>
                    <div class="row border bg-black"></div>
            <?endforeach?>
        </div>
    </div>
</div>