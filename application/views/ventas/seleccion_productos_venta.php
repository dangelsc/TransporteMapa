<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"><strong class="table-title-inner"> Seleccione su Producto</strong></h1>
            </div>
           
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>ERROR :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <?foreach ($productos_venta as $fila):?>
                <div class="row">
                    <div class="image-container span2">
                        <img src="<?= base_url()?>imagenes/<?=$fila->avatar?>">
                        <div class="overlay-fluid">
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
                                <?$precio = $fila->precio_tienda?>
                            <? endif?>
                            <? if($tipo == 'Normal'):?>
                                <?= $fila->precio_normal?>
                                <?$precio = $fila->precio_normal?>
                            <? endif?>
                            <? if($tipo == 'Agencia'):?>
                                <?= $fila->precio_agencia?>
                                <?$precio = $fila->precio_agencia?>
                            <? endif?>
                            Bs.
                        </p>
                        <?php echo validation_errors('<p class="bg-red fg-white padding5">', '</p>'); ?>
                        <?if($mensaje!=''):?>
                            <div>
                                <p class="bg-red fg-white padding5"><b>ERROR :   </b> <?=$mensaje?></p>
                            </div>
                        <?endif?>
                        <?= form_open('ventas/guardar_venta')?>
                        <fieldset>
                            <i class="icon-cart"></i> <strong>Cantidad Disponible: </strong><?= cantidad_disponible($fila->id)?>
                            <?$cantidad=cantidad_disponible($fila->id) ?>
                            <?= form_label('', 'nick')?>
                            <div class="input-control text" data-role="input-control">
                                <?php echo form_input(array('id'=>$fila->id ,'name'=>'cantidad', 'type'=>'number', 'value'=>set_value('cantidad'), 'placeholder' => 'Ingrese la Cantidad a Solicitar', 'required' => 'required', 'autofocus'=>'autofocus', 'max' => $cantidad, 'min' => '0' ))?>
                            </div>
                            <?if($fila->retornable==0):?>
                                <p id="error<?=$fila->id?>"></p>
                                <strong><?= form_label('Botellas Defectuosas', 'nick')?></strong>
                                <div class="input-control text" data-role="input-control">
                                    <?php echo form_input(array('id'=>"d$fila->id", 'name'=>'defectuosas', 'type'=>'number', 'value'=>set_value('cantidad'), 'placeholder' => 'Cantidad de Botellas defectuosas', 'autofocus'=>'autofocus', 'max' => $cantidad, 'min' => '0' ))?>
                                </div>
                                <script>
                                    //var input = "";

                                    $("#d<?= $fila->id ?>").keyup(function(event){
                                        var cantidad = $("#<?= $fila->id ?>").val();
                                        if(parseInt(cantidad) < parseInt($("#d<?= $fila->id ?>").val()) ){
                                            $("#error<?=$fila->id?>").addClass('bg-red');
                                            $("#error<?=$fila->id?>").addClass('fg-white');
                                            $("#error<?=$fila->id?>").addClass('border');
                                            $("#error<?=$fila->id?>").addClass('bd-black');
                                            $("#error<?=$fila->id?>").html("El Campo Botellas Defectuosas no Puede ser Mayor a La Cantidad A solicitar");
                                        }
                                        else{
                                            $("#error<?=$fila->id?>").removeClass('bg-red');
                                            $("#error<?=$fila->id?>").removeClass('fg-white');
                                            $("#error<?=$fila->id?>").removeClass('border');
                                            $("#error<?=$fila->id?>").removeClass('bd-black');
                                            $("#error<?=$fila->id?>").html("");
                                        }
                                    });
                                </script>
                            <?endif?>

                            <input type="hidden" name="ventas_id" value="<?=$ventas_id?>"/>
                            <input type="hidden" name="productos_id" value="<?=$fila->id?>"/>
                            <input type="hidden" name="precio" value="<?=$precio?>"/>
                            <input type="hidden" name="cliente_id" value="<?=$cliente_id?>"/>
                            <button type="submit"  class="default"><i class="icon-floppy bd-green fg-white"></i> Vender</button>&nbsp &nbsp &nbsp
                            <button type="reset" class="button danger">   <i class="icon-remove bg-red"></i>  Limpiar</button>
                        </fieldset>

                        <?= form_close()?>
                        <!--<p class="button success"><?=anchor("ventas/new_venta/"," Vender", array('class'=>'icon-checkmark'))?></p>-->
                    </div>
                </div>
                <div class="row border bg-black"></div>
            <?endforeach?>
        </div>
        <div class="span3  bd-black padding5">
            <div class="row">
                <div class="span3  text-center">
                    <?= anchor("ventas/cance_venta/$ventas_id", 'Cancelar Venta', array('class' => 'button large bg-blue fg-white', ));?><p class="icon-cancel-2 button large bg-blue fg-white"></p>
                </div>
            </div>
            <div class="row">
                <div class="span3">

                    <p class="tertiary-text">
                        <strong>Cliente: </strong><?= nombre_cliente($cliente_id)?>
                    </p>
                    <p class="tertiary-text">
                        <strong>Cedula Identidad: </strong><?= ci_cliente($cliente_id)?>
                    </p>
                    <div class="span3 text-left">
                        <?= anchor("ventas/confirmar_venta/$ventas_id/", 'Confirmar Venta', array('class' => 'btn-table-see-detail', ));?>
                    </div>
                    <p class="text-center"><strong> DETALLE DE LA VENTA </strong></p>
                    <table class="table hovered">
                        <thead>
                        <tr>
                            <th class="text-left">#</th>
                            <th class="text-left">Detalle</th>
                            <th class="text-left">Cant.</th>
                            <th class="text-left">Costo</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?$num = 0?>
                            <?if($botellas):?>
                                <?foreach ($botellas as $bote):?>

                                    <tr>
                                        <?$num += 1?>
                                        <td><?=$num?></td>
                                        <td>
                                            <?$deta='Botellas Defectuosas'?>
                                            <?= anchor("ventas/cancelar_botella/$bote->id/$cliente_id/$bote->ventas_id", "$deta")?>
                                        </td>
                                        <td><?=$bote->botellas_rotas?></td>
                                        <td><?=$bote->importe?></td>
                                    </tr>
                                <?endforeach?>

                            <?endif?>
                            <?foreach ($detalle as $detalle):?>

                                <tr>
                                    <?$num += 1?>
                                    <td><?=$num?></td>
                                    <td>
                                        <?$deta=detalle_producto($detalle->productos_id)?>
                                        <?= anchor("ventas/cancelar_detalle/$detalle->id/$cliente_id", "$deta")?>
                                    </td>
                                    <td><?=$detalle->cantidad?></td>
                                    <td><?=$detalle->precio_venta?></td>
                                </tr>
                            <?endforeach?>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                    <p class="text-right">
                        <strong>Costo Total: </strong> <?= costo_total_venta($ventas_id)?> Bs.
                    </p>

                </div>
            </div>
        </div>

    </div>
</div>
