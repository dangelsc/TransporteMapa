<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around " style="">   
                <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails"> Lista de Productos con Stock</strong></h1>
                <button class="table-print">
                    
                    <?php echo anchor("productos/pdf_almacen_con_stock/",' ',array('class'=>'block fi-print'))?>
                </button>
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>
            </div>
                        
            <?php if ($detalle): ?>
                <?foreach($detalle as $lista):?>
                    <?if($lista->stock>0):?>
                        <div class="form product flex-center " style="border-bottom:2px solid #B7B7B7;">
                            
                                <div class="product-image image-container span2 bg-white">
                                    <div class="imagenn">
                                        <img src="<?=base_url()?>imagenes/<?=$lista->foto?>">
                                    </div>
                                    <div class="overlay-fluid">
                                        <span class="text">
                                            <strong>Presentacion: </strong>  <?=sacar_nombre_tipo($lista->tipo_id)?>
                                        </span>
                                    </div>
                                </div>
                                <div class="product-description" >
                                    <p class="show-date"> &nbsp <strong>Contenido:</strong>  <?=$lista->contenido?></p>
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
                                    &nbsp <p class=""><?=anchor("productos/actulizar_stock/$lista->prod_id","  Actualizar Stock", array('class'=>'btn-update margin-top5'))?></p>
                                </div>
                            
                        </div>
                       
                    <?endif?>

                <?endforeach?>
            <?php endif ?>
        </div>
    </div>
</div>