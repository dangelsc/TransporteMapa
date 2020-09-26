<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Selección Clientes</strong></h1>
            </div>
            
            <table class="table hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cedula de Identidad</th>
                        <th>Nombre Completo</th>
                        <th>Cantidad de Ventas</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <? $num = 1?>
                    <?php foreach ($clientes as $fila): ?>
                        <?php if ($fila->cantidad > 0): ?>
                            <tr>
                                <td><?= $num++ ?></td>
                                <td><?= $fila->ci?></td>
                                <td><?= $fila->paterno?> <?= $fila->materno?>, <?= $fila->nombre?></td>
                                <td><?= $fila->cantidad?></td>
                                <td>
                                    <?= anchor("usuario/crear_usuario_cliente/$fila->id", 'Crear Usuario', array('class' => 'btn-table-new','style'=>'margin-top:-6px'));?>
                                </td>                            
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>