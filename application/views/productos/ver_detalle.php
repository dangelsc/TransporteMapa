<div class="wrapper margin-top5" >
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
                <div class="form product flex-center " style="padding:10px 10px 170px 10px !important;border-bottom:2px solid #B7B7B7;">
                    
                        <div class="product-image image-container span2 bg-white">
                            <div class="imagenn">
                                <img src="<?=base_url()?>imagenes/<?=$lista->avatar?>">
                            </div>
                            <div class="overlay-fluid">
                                    <span class="text">
                                        <strong>Presentacion: </strong>  <?=sacar_nombre_tipo($lista->tipo_id)?>
                                    </span>
                            </div>
                        </div>
                    
                    <div class="product-description" style="font-size: 1em !important;padding-bottom: 2px !important;">
                        <p class="show-date"> &nbsp <strong>contenido:</strong>  <?=$lista->contenido?></p>
                        <p class="show-date"> &nbsp <strong>Envase:</strong>
                            <?if($lista->retornable==0):?>
                                Retornable</p>
                            <?endif?>
                            <?if($lista->retornable==1):?>
                                No Retornable</p>
                                <?endif?>
                    </div>
                    <div class="form">
                        <p class="show-date"> &nbsp <strong>Precio Normal:</strong>  <?=$lista->precio_normal?> Bs.</p>
                        <p class="show-date"> &nbsp <strong>Precio Tienda:</strong>  <?=$lista->precio_tienda?> Bs.</p>
                        <p class="show-date"> &nbsp <strong>Precio Agencia:</strong>  <?=$lista->precio_agencia?> Bs.</p>
                        <p class="show-date"> &nbsp <strong>Fecha de Registro:</strong>  <?=$lista->fecha_registro?></p>
                        <p class="show-date"> &nbsp <strong>Descripcion:</strong>  <?=$lista->descripcion?></p>
                    
                        
                       
                    </div>
                    <p >
                            
                        <?php echo anchor("productos/pdf_detalle_productos/$lista->id",' Imprimir Detalle del Producto',array('class'=>'btn-save margin-top5','style'=>'width: 280px !important; margin-left:0px; '))?>
                    </p>
                </div>
            <?endforeach?>
        </div>
        

    </div>

</div>