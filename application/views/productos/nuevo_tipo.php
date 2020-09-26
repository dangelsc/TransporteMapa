<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                <h1 class="table-title" id="_description"> <strong class="table-title-inner fi-list-thumbnails">Presentación</strong></h1>
                <?if($mensaje!=''):?>
                    <div>
                        <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                    </div>
                <?endif?>
                
            </div>
            
            <table class="table-ctn">
                <thead>
                <tr>
                    <th class="text-left"><strong>Nro.</strong></th>
                    <th class="text-left"><strong>Presentacion del Producto</strong></th>
                    <th class="text-left"><strong>Fecha de Registro</strong></th>
                    <th class="text-left"><strong>Opciones<strong></th>
                </tr>
                </thead>

                <tbody>
                <?$num=0?>
                <?foreach ($seleccionar as $sele):?>

                    <tr>
                        <?$num += 1?>
                        <td><?=$num?></td>
                        <td><?=$sele->nombre?></td>
                        <td><?=$sele->fecha?></td>
                        <td class="text-left"><p class=""><?=anchor("productos/modificar_presentacion/$sele->id","  Modificar", array('class'=>'fi-eye btn-table-see-detail'))?></p></td>
                    </tr>
                <?endforeach?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
      
    </div>
</div>