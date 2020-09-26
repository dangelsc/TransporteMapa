<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Administradores Activos</strong></h1>
            </div>
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <table class="table-ctn">
                <thead>
                <tr>
                    <th class="text-left">#</th>
                    <th class="text-left">Nombre de Usuario</th>
                    <th class="text-left">Fecha de Registro</th>
                    <th class="text-center">Opciones</th>

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
                            <?$id=$fila->id?>
                            <td><?=anchor("usuario/inactivar_adm/$id","  inactivar", array('class'=>'btn-table-bloquear'))?></td>
                        </tr>

                    <?endforeach?>
                <?endif?>

                </tbody>

                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>