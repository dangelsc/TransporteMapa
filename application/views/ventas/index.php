<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
                <h1 id="_description" class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Registre su Venta</strong> </h1></br>

                <?= anchor('ventas/list_clientes', 'Ir a Ventas', array('class' => 'table-print  block padding-6' ));?>
               
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>
            </div>
            <?foreach($lista_productos as $lista):?>

                <div class="form product  flex flex-center">
                    
                        <div class="tile product-image">
                            
                                <img src="<?=base_url()?>imagenes/<?=$lista->avatar?>">
                            
                                <div class="brand">
                                    <span class="label fg-white"><?=$lista->nombre?></span>
                                    <span class="badge bg-orange"><?=$lista->id?></span>
                                </div>
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
                                <div class="flex  flex-around align-center" style="width:100%;">
                                    <p class="show-date-precio"> &nbsp <strong>Precio Normal:</strong>  <?=$lista->precio_normal?> Bs.</p>
                                    <p class="show-date-precio"> &nbsp <strong>Precio Agencia:</strong>  <?=$lista->precio_agencia?> Bs.</p>
                                    <p class="show-date-precio"> &nbsp <strong>Precio Tienda:</strong>  <?=$lista->precio_tienda?> Bs.</p>
                                </div>
                                <div class="flex flex-center align-center" style=" width:100%; height:80px;margin-top:20px;">
                                     <p class="" style="margin-left:-130px;">&nbsp <?=anchor("ventas/ver_detalle/$lista->id"," Ver Detalle", array('class'=>'btn-see-detail'))?></p> 
                                     <p class="" style="margin-left:-150px;"> &nbsp<?=anchor("ventas/detalle_stock/$lista->id"," Verificar Stock", array('class'=>'btn-stock'))?></p>
                                </div>
                        </div>

                </div>
                <div class="border-button"></div>

            <?endforeach?>
            
        </div>
        
    </div>
</div>