<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
              <h1 class="table-title"><strong class="table-title-inner">Detalle de Observación</strong></h1>
            </div>
            <div class="form">
                <? foreach ($cliente as $fila):?>
                    <div class="form">
                        <? $id = $fila->id?>
                        <p class="show-date"><strong>Cliente: </strong><?= $fila->paterno?> <?= $fila->materno?>, <?= $fila->nombre?></p>
                        <p class="show-date"><strong>Cedula de Identidad: </strong><?= $fila->ci?></p>
                    </div>
                <? endforeach?>
             </div>
            <div class="row">
                <div class="span9">
                   <table class="border bd-black table hovered">
                       <thead>
                           <tr>
                               <th><strong>Nro.</strong></th>
                               <th><strong>Fecha de Observación</strong></th>
                               <th><strong>Descripción de Observación</strong></th>
                           </tr>
                       </thead>
                       <tbody>
                            <? $num = 1?>
                            <? foreach ($obs_cliente as $fila) :?>
                                <tr>
                                    <td><?= $num++?></td>
                                    <td><?= $fila->fecha?></td>
                                    <td><?= $fila->descripcion?></td>
                                </tr>
                            <?endforeach?>
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

