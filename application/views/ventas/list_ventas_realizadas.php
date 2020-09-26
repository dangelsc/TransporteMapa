<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title"><strong class="table-title-inner"> Lista de Ventas Confirmadas</strong></h1>
            </div>
            <div class="wrapper margin-top5">
                <form action="" method="get" class="form">
                    <div class="flex-center">
                        <label for="fecha" class="width30"><strong>Fecha de la Venta: </strong></label>
                        <div class="input-control text width50">
                            <input class="" id="fecha" type="date" name="fecha" value="<?=$fecha?>">
                        </div>
                        <div class=" ">
                            <button class="btn-search"> Buscar</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="row">
                <h2><strong>Ventas en Fecha: <?= $fecha?></strong></h2>
                <div class="">
                    <table class="table-ctn">
                        <thead>
                        <tr>
                            <th class="text-left"><strong>Nro</strong></th>
                            <th class="text-left"><strong>Cedula</strong></th>
                            <th class="text-left"><strong>Nombre Completo</strong></th>
                            <th class="text-left"><strong>Dirección</strong></th>
                            <th class="text-left"><strong>Opciones</strong></th>

                        </tr>
                        </thead>
                        <tbody>
                        <? $num = 1 ?>
                        <?php foreach ($clientes as $fila): ?>
                            <tr>
                                <td><?=$num++?></td>
                                <td><?= $fila->ci?></td>
                                <td><?=$fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
                                <td><?= $fila->direccion?></td>
                                <?$ventas_id = id_ventas($fecha,$fila->id)?>
                                <td><?= anchor("ventas/ver_detalle_venta/$ventas_id/", 'Ver Detalle Venta');?></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>