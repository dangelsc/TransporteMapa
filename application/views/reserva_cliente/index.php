<div class="grid">
    <div class="row">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="span6">
            <h2><strong><i class=" icon- icon-cart-2"></i> Registrar Reserva</strong></h2>
            <?foreach ($productos as $fila):?>
                <div class="row">
                    <div class="image-container span2">
                        <img src="<?= base_url()?>imagenes/<?=$fila->avatar?>">
                        <div class="overlay-fluid">
                            <span class="text">
                                <b>Presentacion: </b>  <?=sacar_nombre_tipo($fila->tipo_id)?>
                            </span>
                        </div>
                    </div>
                    <div class="span4">
                        <p class="tertiary-text"><strong>Contenido:</strong>  <?=$fila->contenido?></p>
                        <p class="tertiary-text"><strong>Envase: </strong>
                        <?if($fila->retornable==0):?>
                             Retornable
                        <?else:?>
                            No Retornable
                        <?endif?>
                        <p class="button success"><?=anchor("reserva_cliente/detalle_producto/$fila->id","  Ver Detalle", array('class'=>'icon-clipboard-2'))?></p>
                    </div>
                </div>
                <div class="row border bg-black"></div>
            <?endforeach?>
        </div>
        <div class="span3  bd-black padding5">
            <? $id = $this->session->userdata('cliente_id')?>
            <?= anchor("reserva_cliente/new_venta/$id", 'Ir a Reservas', array('class' => 'button large bg-lightOrange fg-white', ));?>
        </div>
    </div>
</div>
