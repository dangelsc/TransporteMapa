<div class="grid">
    <div class="row">
        <div class="span3">
            <? include('menu_adm.php') ?>
        </div>
        <div class="span9">
            <h2 id="_description"><i class="icon-user-3 on-left"></i>Gestionar Administradores</h2></br>
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <table class="table hovered">
                <thead>
                <tr>
                    <th class="text-left">#</th>
                    <th class="text-left">Nombre de Usuario</th>
                    <th class="text-left">Fecha de Registro</th>
                    <th class="text-left">Estado</th>

                </tr>
                </thead>

                <tbody>
                <?if($lista_usuarios):?>
                    <?$num = 0?>
                    <?foreach ($lista_usuarios as $fila):?>

                        <tr>
                            <?$num += 1?>
                            <td><?=$num?></td>
                            <td><?=$fila->nick?></td>
                            <td><?=$fila->fecha_reg?></td>
                            <?if($fila->estado==1):?>
                                <td>Activo</td>
                            <?endif?>
                            <?if($fila->estado==0):?>
                                <td>Inactivo</td>
                            <?endif?>
                        </tr>

                    <?endforeach?>
                <?endif?>

                </tbody>

                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>