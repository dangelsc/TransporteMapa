<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Detalle de Producto</strong></h1>
            </div>
                    
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>

            <?foreach($lista_productos as $lista):?>
                <div class="span10">
                    <div class="image-container span2 bg-white selected">
                        <img  src="<?=base_url()?>imagenes/<?=$lista->avatar?>" height="200px" class="shadow rounded">
                        <div class="overlay">
                            <span class="text">
                                <b>Presentacion: <b/>  <?=sacar_nombre_tipo($lista->tipo_id)?>
                            </span>
                        </div>
                    </div>
                    <p class="text-muted"> &nbsp <b>contenido:</b>  <?=$lista->contenido?></p>
                    <p class="text-muted"> &nbsp <b>Envase:</b>
                        <?if($lista->retornable==0):?>
                            Retornable</p>
                        <?endif?>
                        <?if($lista->retornable==1):?>
                            No Retornable</p>
                            <?endif?>
                    <p class="text-muted"> &nbsp <b>Precio Normal:</b>  <?=$lista->precio_normal?> Bs.</p>
                    <p class="text-muted"> &nbsp <b>Precio Tienda:</b>  <?=$lista->precio_tienda?> Bs.</p>
                    <p class="text-muted"> &nbsp <b>Precio Agencia:</b>  <?=$lista->precio_agencia?> Bs.</p>
                    <p class="text-muted"> &nbsp <b>Fecha de Registro:</b>  <?=$lista->fecha_registro?></p>
                    <p class="text-muted"> &nbsp <b>Descripcion:</b>  <?=$lista->descripcion?></p>


                    &nbsp
                </div>
            <?endforeach?>
        </div>
    </div>
</div>