<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"><strong class="table-title-inner"> Detalle del Producto</strong></h1>
            </div>
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>

            <?foreach($lista_productos as $lista):?>
                <div class="span10">
                    <div class="image-container span2 bg-white">
                        <div class="image-container span2">
                            <div class="tile-content image">
                                <img src="<?=base_url()?>imagenes/<?=$lista->avatar?>">
                            </div>
                            <div class="overlay-fluid">
                                    <span class="text">
                                        <strong>Presentacion: </strong>  <?=sacar_nombre_tipo($lista->tipo_id)?>
                                    </span>
                            </div>
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
                    <p class="text-muted"> &nbsp <strong>Precio Normal:</strong>  <?=$lista->precio_normal?> Bs.</p>
                    <p class="text-muted"> &nbsp <strong>Precio Tienda:</strong>  <?=$lista->precio_tienda?> Bs.</p>
                    <p class="text-muted"> &nbsp <strong>Precio Agencia:</strong>  <?=$lista->precio_agencia?> Bs.</p>
                    <p class="text-muted"> &nbsp <strong>Fecha de Registro:</strong>  <?=$lista->fecha_registro?></p>
                    <p class="text-muted"> &nbsp <strong>Descripcion:</strong>  <?=$lista->descripcion?></p>


                    &nbsp
                </div>
            <?endforeach?>
        </div>
    </div>
</div>