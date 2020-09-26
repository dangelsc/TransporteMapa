<div class="grid">
    <div class="row">
        <div class="span3">
            <? include ('menu.php');?>
        </div>
        <div class="span9">
            <table class="table hovered">
                <thead>
                <tr>
                    <th class="text-left"><strong>Nro.</strong></th>
                    <th class="text-left"><strong>Fecha Reserva</strong></th>
                    <th class="text-left">Estado</th>
                    <th class="text-left"><strong>Opciones</strong></th>
                </tr>
                </thead>
                <tbody>
                    <? $num = 1 ?>
                    <? foreach($reservas as $fila): ?>
                        <tr>
                            <td><?= $num++ ?></td>
                            <td><?= $fila->fecha_registro ?></td>
                            <td>
                                <? if($fila->confirmacion == 1){?>
                                    Reserva Entregada
                                <? }else{
                                    if($fila->estado == 1){?>
                                        Reserva Confirmada
                                    <?}
                                    else{
                                        echo "Reserva Sin Confirmar";
                                    }
                                }?>
                            </td>
                            <td>
                                <? if($fila->confirmacion == 1){?>
                                    <?= anchor("reserva_cliente/reserva_realizada/$fila->id", 'Ver Productos', array('class'=>'button warning'))?>
                                <? }else{
                                    if($fila->estado == 1){?>
                                        <?= anchor("reserva_cliente/reserva_realizada/$fila->id", 'Ver Productos', array('class'=>'button success'))?>
                                    <?}
                                    else{

                                    }
                                }?>
                            </td>
                        </tr>
                    <? endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>