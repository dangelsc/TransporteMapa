<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner">Ventas Cliente</strong></h1>
            </div>
            <div class="row">
                <div class="span5">
                    <p class="lead">
                        <strong>Señor(es): </strong> <?= $cliente[0]->paterno ?> <?= $cliente[0]->materno ?>, <?= $cliente[0]->nombre ?>
                    </p>
                </div>
                <div class="span4">
                    <p>
                        <strong>Cedula de Identidad: </strong><?= $cliente[0]->ci ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <table class="table-ctn">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-left">Fecha Venta</th>
                                <th class="text-left">Monto Total</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                        <? $num = 1?>
                            <?php foreach ($ventas as $fila): ?>
                                <tr>
                                    <td><?= $num++ ?></td>
                                    <td><?= $fila->fecha_venta?></td>
                                    <td class="text-left"><?= $fila->monto_total ?> Bs.</td>
                                    <td class="text-center">
                                        <?= anchor("ventas/ver_detalle_venta/$fila->id", 'Ver Detalle', array('class' => 'btn-table-see-detail'));?>
                                    </td>                            
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>