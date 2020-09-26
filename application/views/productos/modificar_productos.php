<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Nuestros Productos</strong></h1>
            </div>
            <div class="wrapper margin-top5">
                <div class="">
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>

                <?foreach($lista_productos as $lista):?>
                    <div class="form product flex-center">
                        
                            <div class="product-image image-container span2 bg-white">
                                <div class="imagenn">
                                    <img  src="<?=base_url()?>imagenes/<?=$lista->avatar?>" class="shadow rounded">
                                </div>
                                <!--div class="overlay-fluid">
                                <span class="text">
                                    <b>Presentacion: <b/>  <?=sacar_nombre_tipo($lista->tipo_id)?>
                                </span>
                                </div-->
                            </div>
                            <div class="product-description">
                                <p class="show-date"> &nbsp <strong>contenido:</strong>  <?=$lista->contenido?></p>
                                <p class="show-date"> &nbsp <strong>Envase:</strong>
                                    <?if($lista->retornable==0):?>
                                    Retornable</p>
                                <?endif?>
                                <?if($lista->retornable==1):?>
                                    No Retornable</p>
                                <?endif?>
                                &nbsp <p class=""><?=anchor("productos/guardar_cambios/$lista->id","  Modificar Producto", array('class'=>'btn-see-detail margin-top5'))?></p>
                            </div>
                    </div>
                <?endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>