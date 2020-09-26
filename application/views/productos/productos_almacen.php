<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner fi-list-thumbnails">Seleccione un producto para actulizar Stock</strong></h1>
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>
            </div>
            
            <?foreach($lista_productos as $lista):?>
                <div class="form product flex-center">
                        <div class="product-image image-container span2 bg-white tile">
                            <div class="tile-content imagenn">
                                <img src="<?=base_url()?>imagenes/<?=$lista->avatar?>">
                            </div>
                            <div class="brand">
                                <span class="label fg-white"><?=$lista->nombre?></span>
                                <span class="badge bg-orange" ><?=$lista->id?></span>
                            </div>
                        </div>
                        <div class="product-description ">
                            <p class="show-date"> &nbsp <strong>contenido:</strong>  <?=$lista->contenido?></p>
                            <p class="show-date"> &nbsp <strong>Envase:</strong>
                            <?if($lista->retornable==0):?>
                                Retornable</p>
                            <?endif?>
                            <?if($lista->retornable==1):?>
                                No Retornable</p>
                            <?endif?>
                            &nbsp <p class=""><?=anchor("productos/actulizar_stock/$lista->id"," Actualizar Stock Almacen", array('class'=>'btn-see-detail margin-top5','style'=>'width: auto !important; margin-left:0px; padding:0 20px; '))?></p>
                        </div>
                    
                </div>
            <?endforeach?>
        </div>
    </div>
</div>