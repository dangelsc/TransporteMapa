<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
                <h1 class="table-title"><strong class="table-title-inner fi-list-thumbnails">  Nuestros Camiones</strong></h1>
                
                    
                    <?php echo anchor("camiones/pdf_camiones/",' ',array('class'=>' table-print block fi-print','title'=>'IMPRIMIR EN PDF'))?>
                
            </div>
            <table class="table hovered">
            <thead>
            <tr>
                <th class="text-left"><strong>Nro.</strong></th>
                <th class="text-left"><strong>Placa Movilidad</strong></th>
                <th class="text-left"><strong>Descipción</strong></th>
                <th class="text-left"><strong>Fecha de Registro</strong></th>

            </tr>
            </thead>
            <tbody>
            <?$num = 1?>
            <?foreach ($camion as $fila):?>
                <tr>
                    <td><?= $num++?></td>
                    <td><?= $fila->placa ?></td>
                    <td><?=$fila->descripcion?></td>
                    <td><?=$fila->fecha_registro?></td>
                </tr>
            <?endforeach?>
            </table>
        </div>
    </div>
</div>