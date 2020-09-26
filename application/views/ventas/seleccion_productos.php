<br><br>
<div class="grid">
    <div class="row">
        <div class="span3">
            <? include('menu.php') ?>
        </div>

        <div class="span6">
            
            <h2>Seleccione su Producto</h2>
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>ERROR :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <?foreach ($productos as $fila):?>
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
            <!--form id="formulario123">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad">
                <input type="button" value="Calcula" id="lkjlkjlkj" />
            </form>
            Resultado: <span id="resultado">0</span-->
        </div>
        <div class="span3  bd-black padding5">
            <div class="row">
                <div class="span3 text-right text-center">
                        <?= anchor("ventas/cancelar_venta/$ventas_id", 'Cancelar Venta', array('class' => 'button large bg-blue fg-white', ));?><p class="icon-cancel-2 button large bg-blue fg-white"></p>
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
                    <p class="tertiary-text">
                        <strong>Costo Total: </strong> <?= costo_total_venta($ventas_id)?> Bs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
