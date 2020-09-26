<div class="grid">
    <div class="row">
        <div class="span3">
            <? include('menu.php') ?>
        </div>
        <div class="span9">
            <div class="row">
                <div class="span6">
                    <h3>Stock de Producto</h3>
                    <?foreach($producto as $p):?>
                    <? $producto_id = $p->id?>
                        <div class="image-container span2 bg-white selected">
                            <img src="<?=base_url()?>imagenes/<?=$p->avatar?>" alt="<?=$p->contenido?>">
                            <div class="overlay">
                                <span class="text">
                                    <strong>Presentacion: </strong><??><?=sacar_nombre_tipo($p->tipo_id)?>
                                </span>
                            </div>
                        </div>
                        <p class="tertiary-text">
                            <strong>Contenido: </strong><?= $p->contenido?>
                        </p>
                        <p class="tertiary-text"><strong>Envase: </strong>
                            <?if($p->retornable==0):?>
                                 Retornable
                            <?else:?>
                                No Retornable
                            <?endif?>
                        </p>
                        <p class="tertiary-text">
                            <strong>Precio de Producto: </strong>
                            <? $tipo = tipo_cliente($cliente_id)?>
                            <? if($tipo == 'Tienda'):?>
                                <?= $p->precio_tienda?>
                            <? endif?>
                            <? if($tipo == 'Normal'):?>
                                <?= $precio = $p->precio_normal?>
                            <? endif?>
                            <? if($tipo == 'Agencia'):?>
                                <?= $p->precio_agencia?>
                            <? endif?>
                             Bs.
                        </p>
                        <?foreach (almacen_producto($p->id) as $detalle):?>
                            <p class="tertiary-text">
                                <strong>Stock: </strong><?= $detalle->stock?> Unidades.
                            </p>
                            <? $almacen_id = $detalle->id?>
                        <?endforeach?>
                        <p>
                            <?= form_open("reserva_cliente/add_producto/$cliente_id/$reserva_id/$producto_id");?>
                                <?= form_label('Cantidad', 'cantidad');?>
                                <?= form_input(array('id' =>'cantidad' , 'name'=>'cantidad', 'placeholder'=>'Cantidad de Producto' ));?>
                                <button id="guardar" class="button default">Reservar</button>
                            <?= form_close();?>
                        </p>
                    <?endforeach?>
                </div>
                <div class="span3">
                    <div class="row">
                        <div class="span3 text-right">
                            <?= anchor("reserva_cliente/seleccion_productos/$cliente_id/$reserva_id", 'Volver Atras', array('class' => 'button large bg-yellow fg-white', ));?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span3">
                            <div class="row">
                                <div class="span3">
                                    <p class="tertiary-text">
                                        <strong>Sr(a): </strong><?= nombre_cliente($cliente_id)?>
                                    </p>
                                    <p class="tertiary-text">
                                        <strong>Cedula Identidad: </strong><?= ci_cliente($cliente_id)?>
                                    </p>
                                </div>
                            </div>
                            <?foreach ($productosr as $pr):?>
                                <div class="row">
                                    <div class="span3">
                                        <p>
                                            <?= $pr->nombre?>
                                        </p>
                                        <p class="tertiary-text">
                                            <strong>Presentacion: </strong><??><?=sacar_nombre_tipo($pr->tipo_id)?>
                                        </p>
                                    </div>
                                </div>
                            <?endforeach?>
                        </div>
                    </div>
                </div>
            </div>
            <p id="sms" class="mostrar tertiary-text padding5"></p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#cantidad').keyup(function(event) {
            var can = $('#cantidad').val();
            if(can != ''){
                $.ajax({
                    url: "<?= base_url()?>"+"index.php/reservas/verificar_cantidad",
                    type: 'GET',
                    data: {almacen: "<?= $almacen_id?>", cantidad: can },
                    success: function(msj){
                        //alert (msj);
                        if(msj == 'si'){
                            $('#sms').addClass('bg-red');
                            $('#sms').addClass('fg-white');
                            $('#sms').addClass('border');
                            $('#sms').addClass('bd-black');
                            $('#sms').html("Stock Insuficiente");
                        }
                        else{
                            $('#sms').html("");
                            $('#sms').removeClass('mostrar');
                            $('#sms').removeClass('bg-red');
                            $('#sms').removeClass('fg-white');
                            $('#sms').removeClass('border');
                            $('#sms').removeClass('bd-black');
                        }
                    }
                });
            }
            else{
                $('#sms').html("");
                $('#sms').removeClass('mostrar');
                $('#sms').removeClass('bg-red');
                $('#sms').removeClass('fg-white');
                $('#sms').removeClass('border');
                $('#sms').removeClass('bd-black');
            }
            return false;
        });
    });
</script>
<style type="text/css">
    .mostrar{
        display: none;
    }
</style>