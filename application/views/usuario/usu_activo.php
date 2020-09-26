<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Usuarios Activos</strong></h1>
            </div>
            
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <table class="table-ctn">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-left">Nombre de Usuario</th>
                    <th class="text-center">Fecha de Registro</th>
                    <th class="text-center">Opciones</th>

                </tr>
                </thead>

                <tbody>
                <?if($lista_usuarios):?>
                    <?$num = 0?>
                    <?foreach ($lista_usuarios as $fila):?>

                        <tr>
                            <?$num += 1?>
                            <td class="text-center"><?=$num?></td>
                            <td ><?=$fila->nick?></td>
                            <td class="text-center"><?=$fila->fecha_reg?></td>
                            <?$id=$fila->id?>
                            <td class="text-center"><?=anchor("usuario/inactivar_usu/$id","  inactivar", array('class'=>'btn-table-bloquear', 'style'=>'margin-top:-6px'))?></td>
                        </tr>

                    <?endforeach?>
                <?endif?>

                </tbody>

                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>