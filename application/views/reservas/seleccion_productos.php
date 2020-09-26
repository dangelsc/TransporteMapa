<div class="grid">
    <div class="row">
        <div class="span3">
            <? include('menu.php') ?>
        </div>
        <div class="span6">
            <h3>Nuestros Productos</h3>
            <?foreach ($productos as $fila):?>
                <div class="row">
                    <div class="image-container span2">
                        <img src="<?= base_url()?>imagenes/<?=$fila->avatar?>">
                        <div class="overlay">
                            <span class="text">
                                <strong>Presentacion:</strong> <?=sacar_nombre_tipo($fila->tipo_id)?>
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
                        </p>
                        <p>
                            <strong>Precio de Producto: </strong>
                            <? $tipo = tipo_cliente($cliente_id)?>
                            <? if($tipo == 'Tienda'):?>
                                <?= $fila->precio_tienda?>
                            <? endif?>
                            <? if($tipo == 'Normal'):?>
                                <?= $fila->precio_normal?>
                            <? endif?>
                            <? if($tipo == 'Agencia'):?>
                                <?= $fila->precio_agencia?>
                            <? endif?>
                             Bs.
                        </p>
                        <p>
                            <?= anchor("reservas/stock_producto/$cliente_id/$reserva_id/$fila->id", ' Reservar', array('class' => 'button icon-eye', ));?>
                        </p>
                    </div>
                </div>
                <div class="row border bd-black"></div>
            <?endforeach?>
        </div>
        <div class="span3  bd-black padding5">
            <div class="row">
                <div class="span3 text-right">
                    <?= anchor("reservas/cancelar_reserva/$reserva_id", 'Cancelar Reserva', array('class' => 'button large bg-yellow fg-white', ));?>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div class="row">
                        <div class="span3">
                            <p class="tertiary-text">
                                <strong>Cliente: </strong><?= nombre_cliente($cliente_id)?>
                            </p>
                            <p class="tertiary-text">
                                <strong>Cedula Identidad: </strong><?= ci_cliente($cliente_id)?>
                            </p>
                            <p class="tertiary-text">
                                <strong>Costo Total: </strong> <?= costo_total_reserva($reserva_id)?> Bs.
                            </p>
                            <p>
                                <?= anchor("reservas/confirmar_reserva/$reserva_id/$cliente_id", ' Confirmar Rerserva', array('class' => 'button info icon-newspaper', ));?>
                            </p>
                        </div>
                    </div>
                    <div class="row border bd-blue"></div>
                    <h4>Productos Reservados</h4>
                    <div class="row border bd-black"></div>
                    <?foreach ($productosr as $pr):?>
                        <div class="row">
                            <div class="span3">
                                <p>
                                    <strong>Producto: </strong><?= $pr->nombre?>
                                </p>
                                <p class="tertiary-text">
                                    <strong>Presentacion: </strong><??><?=sacar_nombre_tipo($pr->tipo_id)?>
                                </p>
                                 <p>
                                    <strong>Precio de Producto: </strong>
                                    <? $tipo = tipo_cliente($cliente_id)?>
                                    <? if($tipo == 'Tienda'):?>
                                        <?= $pr->precio_tienda?>
                                    <? endif?>
                                    <? if($tipo == 'Normal'):?>
                                        <?= $pr->precio_normal?>
                                    <? endif?>
                                    <? if($tipo == 'Agencia'):?>
                                        <?= $pr->precio_agencia?>
                                    <? endif?>
                                     Bs.
                                </p>
                                <?foreach (detalle_reserva($pr->id, $reserva_id) as $fila):?>
                                    <?$detalle_id = $fila->id?>
                                    <p class="tertiary-text">
                                        <strong>Cantidad: </strong><?=$fila->cantidad?> Unidades.
                                    </p>
                                    <p class="tertiary-text">
                                        <strong>Costo: </strong><?= $fila->monto?> Bs.
                                    </p>
                                <?endforeach?>
                                <p>
                                    <?= anchor("reservas/quitar_producto/$pr->id/$reserva_id/$cliente_id", ' Quitar Producto', array('class' => 'button danger icon-cancel', ));?>
                                </p>
                                <!--p>
                                    <?= anchor("reservas/modificar_cantidad/$cliente_id/$reserva_id/$pr->id/$detalle_id", ' Modificar Cantidad', array('class' => 'button success icon-plus-2', ));?>
                                </p-->
                            </div>
                        </div>
                        <div class="row border bd-black"></div>
                    <?endforeach?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#lkjlkjlkj').click(function() {
                    //alert('hola');
                    $.ajax({
                        url: "<?= base_url()?>"+"index.php/reservas/ajax",
                        type: 'GET',
                        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        data: {cliente: '3'},
                        success: function(msj){
                            alert (msj);
                        }
                    });
                return false;    
                })
            });
        </script>
    </div>
</div>