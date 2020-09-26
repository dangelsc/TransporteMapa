<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner">Detalle de Reservas</strong></h1>
            </div>
            <div class="wrapper margin-top5 width80 flex align-center" style="background-color: orange;">
                <form action="" method="get"  class="width100" style="background-color: teal;">
                    <div class="width80 flex  flex-around align-center" style="background-color: red;">
                        <label for="fecha width20 "><strong>Fecha de Reserva: </strong></label>
                            
                                <input class="width50" id="fecha" type="date" name="fecha" value="<?=$fecha?>" >

                            
                            <div class="width20">
                                <button class="default icon-search width100 "> Buscar</button>
                            </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <? $datestring = "%d de %M de %Y";?>
                <? $fecha1 = human_to_unix($fecha)?>
                <h3><strong>Reservas en Fecha: <?= mdate($datestring, $fecha1)?></strong></h3>
                <div class="">
                    <table class="table-ctn">
                        <thead>
                            <tr>
                                <th class="text-left"><strong>Nro.</strong></th>
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
                                    <?$reserva_id = id_reserva($fecha, $fila->id)?>
                                    <td><p class="button success"><?= anchor("reservas/reserva_realizada/$reserva_id", 'Detalle de Reserva');?></p></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>