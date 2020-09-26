<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Detalle de Bitacora de Seguridad</strong></h1>
            </div>
            
            </br>
            
            <table class="table-ctn">
                <thead>
                </thead>
                <tbody>
                <?if($lista_detalle):?>
                    <?$num = 0?>
                    <?foreach ($lista_detalle as $fila):?>
                        <tr>
                            <th class="text-left"><strong>Tabla</strong></th> <td><?=$fila->name_tabla?></td>
                        </tr>
                        <tr>
                            <th class="text-left"><strong>Dato Actual</strong></th> <td><?=$fila->dato_antiguo?></td>
                        </tr>
                        <tr>
                            <th class="text-left"><strong>Dato Nuevo</strong></th><td><?=$fila->dato_nuevo?></td>
                        </tr>
                    <?endforeach?>
                <?endif?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>