<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
                <h1 class="table-title"><strong class="table-title-inner fi-clipboard-pencil"> Registrar Reserva</strong></h1>
            </div>
            <?foreach ($productos as $fila):?>

                <div class="form product flex flex-center">
                    <div class="product-image mage-container span2 bg-white">
                        
                            <img src="<?= base_url()?>imagenes/<?=$fila->avatar?>">
                        
                        <!--div class="overlay-fluid">
                            <span class="text">
                                <b>Presentacion: </b>  <?=sacar_nombre_tipo($fila->tipo_id)?>
                            </span>
                        </div-->
                    </div>
                    <div class="product-description">
                        <p class="show-date"><strong>Contenido:</strong>  <?=$fila->contenido?></p>
                        <p class="show-date"><strong>Envase: </strong>
                        <?if($fila->retornable==0):?>
                             Retornable
                        <?else:?>
                            No Retornable
                        <?endif?>
                        <p class=""><?=anchor("reservas/detalle_producto/$fila->id","  Ver Detalle", array('class'=>'btn-see-detail margin-top5'))?></p>
                    </div>
                </div>
                <div class="border-button"></div>

            <?endforeach?>
            <div class="bd-black padding5">
                    <?= anchor('reservas/list_clientes', 'Ir a  Reservas', array('class' => 'button large bg-lightOrange fg-white', ));?>
                </div>
        </div>
        
    </div>
</div>
