<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"><strong class="table-title-inner"> Ventas Realizadas por Año</strong></h1>
            </div>
            <h2 id="_description" class="text-center"><strong> VENTAS DEL AÑO : </strong><?= $ano?></h2>

            <div class="row">
                <?= form_open('ventas/ventas_ano')?>
                    <div class="span9 text-left">
                        <div class=" span4 input-control select" data-role="input-control">
                            <label for="fecha"><strong>Seleccione el Año:</strong> </label>
                            <select name="ano">
                                <?$ano= date("Y");?>
                                <?
                                for($i=0;$i<=10;$i++)
                                {
                                    $nuevafecha = strtotime ( '-'.$i.'year' , strtotime ( $ano ) ) ;
                                    $nuevafecha = date ( 'Y' , $nuevafecha );?>
                                    <option value="<?=$nuevafecha?>"><?=$nuevafecha?></option>

                                <?}?>
                            </select>

                        </div>
                        </br>
                        </br>
                        <div class="span5">
                            <button class="btn-search" type="submit">  Buscar </button>
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
                                        <?= anchor("ventas/ver_detalle_venta/$fila->id", 'Ver Detalle', array('class' => 'btn-table-see-detail','style'=>'margin-top:-11px'));?>
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