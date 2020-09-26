<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"><strong class="table-title-inner"> Detalle de la Venta</strong></h1>
                <?php echo anchor("ventas/pdf_detalle/$ventas_id",' ',array('class'=>' table-print block fi-print','title'=>'IMPRIMIR EN PDF'))?>
            </div>
            
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            </br>
            <div class="row">
                <div class="span6">

                    <?$date="%d de %M de %Y"?>
                    <?$fecha = human_to_unix(fecha_venta($ventas_id))?>
                    <strong>Fecha de la Venta: </strong> Potosi, <?=mdate($date,$fecha)?>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="span6">
                    <p class="tertiary-text">
                        <strong>Señor(es): </strong><?= nombre_cliente($cliente_id)?>
                    </p>
                </div>
                <div class="span6">
                    <div>
                        <strong>Cedula Identidad: </strong><?= ci_cliente($cliente_id)?>
                    </div> 
                </div>


            </div>
            </br>
            <div class="row">
                 <div class="table-ctn">
                     <table class="table hovered">
                         <thead>
                         <tr>
                             <th class="text-left">Nro.</th>
                             <th class="text-left">CANT</th>
                             <th class="text-left">UNIDAD</th>
                             <th class="text-left">DETALLE</th>
                             <th class="text-left">P. UNIT</th>
                             <th class="text-left">P. IMPORTE</th>
                         </tr>
                         </thead>

                         <tbody>
                             <?$num=1?>
                             <?if($botellas):?>
                                 <?foreach ($botellas as $bote):?>
                                     <tr>
                                         <td><?=$num++?></td>
                                         <td><?=$bote->botellas_rotas?></td>
                                         <td>Unidad</td>
                                         <?$deta=detalle_producto1($bote->productos_id)?>
                                         <td>Botellas Defectuosas:  <?=$deta?></td>
                                         <td>1.50</td>
                                         <td><?=$bote->importe?> .-</td>
                                     </tr>
                                 <?endforeach?>
                             <?endif?>
                             <?foreach ($detalle as $fila):?>
                                 <tr>
                                     <td><?=$num++?></td>
                                     <td><?=$fila->cantidad?></td>
                                     <td>Unidad</td>
                                     <td><?=detalle_producto($fila->productos_id)?></td>
                                    <?$tipo=tipo_cliente($cliente_id)?>
                                     <td><?=precio_unidad($fila->productos_id,$tipo)?></td>
                                     <td><?=$fila->precio_venta?> .-</td>
                                 </tr>
                             <?endforeach?>
                             <tr class="info">
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td><strong>Total en Bolivianos</strong></td>
                                 <td></td>
                                 <td><strong><?= costo_total_venta($ventas_id)?> .-</strong></td>
                             </tr>

                         </tbody>
                     </table>
                 </div>
            </div>
        </div>
    </div>
</div>