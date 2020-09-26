<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"><strong class="table-title-inner"> Ventas Realizadas en el Dia </strong></h1>
            </div>
            <h2 id="_description" class="text-center"><strong > Ventas del Dia: </strong><?= $fecha?></h2>
        
            <div class="row">
                <form action="" method="get">
                    <div class="span9">
                        <label for="fecha"><strong>Fecha de Venta:</strong> </label>
                        <div class="input-control text span4">
                            <input id="fecha" type="date" name="fecha" value="<?= $fecha ?>">
                        </div>
                        <div class="span5">
                            <button class="btn-search"> Buscar</button>
                        </div>
                    </div>
                </form>
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
                                        <?= anchor("ventas/ver_detalle_venta/$fila->id", 'Ver Detalle', array('class' => 'btn-table-see-detail','style'=>'margin-top:-6px'));?>
                                    </td>                            
                                </tr>
                            <?php endforeach ?>
                            <?if($ventas):?>
                                    <tr>
                                        <th>Monto Total</th>
                                        <td></td>
                                        <td><?=$sum?> Bs.</td>
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