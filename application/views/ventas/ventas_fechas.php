<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"><strong class="table-title-inner"> Ventas por Fecha</strong></h1>
            </div>
            <h3 id="_description" class="text-left"><strong> VENTAS  POR FECHA : </strong><?= $fecha1?> Y <?= $fecha2?></h3>
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-red fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <div class="row">
                <?= form_open('ventas/ventas_fechas')?>
                    <div class="row">
                        <div class="span3">
                            <label for="fecha"><strong>Fecha Uno:</strong> </label>
                            <div class="input-control text span3">
                                <input id="fecha" type="date" name="fechauno" value="">
                            </div>
                        </div>
                        <div class="span3">
                            <label for="fecha"><strong>Fecha Dos:</strong> </label>
                            <div class="input-control text span3">
                                <input id="fecha" type="date" name="fechados" value="">
                            </div>
                        </div>
                        </br>
                        <div class="span3">
                            <div>
                                <button class="btn-search"> Buscar</button>
                            </div>
                        </div>
                    </div>
                <?= form_close()?>
            </div>
            <div class="row">
                <div class="">
                    <table class="table-ctn">
                        <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Fecha Venta</th>
                            <th>Monto Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? $num = 1?>
                        <? $a = ''?>
                        <? $b = ''?>
                        <? $sum = ''?>
                        <?php foreach ($ventas as $fila): ?>


                            <tr>
                                <td><?= $num++ ?></td>
                                <td><?= $fila->fecha_venta?></td>
                                <td><?= $fila->monto_total ?> Bs.</td>
                                <?
                                if($a=='')
                                {
                                    $a= $fila->monto_total;
                                }
                                else
                                {
                                    $b=$a;
                                    $a=$fila->monto_total;
                                    $sum=$a+$b;
                                    $a=$sum;
                                    $b='';

                                }

                                ?>
                                <td>
                                    <?= anchor("ventas/ver_detalle_venta/$fila->id", 'Ver Detalle', array('class' => 'button success small'));?>
                                </td>
                            </tr>

                        <?php endforeach ?>
                        <?if($ventas):?>
                            <tr>
                                <th>Monto Total</th>
                                <td></td>
                                <th>
                                    <?if($sum==0)
                                    {
                                        echo $a;
                                    }
                                    ?>

                                    <?=$sum?> Bs.</th>
                                <td></td>
                            </tr>
                        <?endif?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>