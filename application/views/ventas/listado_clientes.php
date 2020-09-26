<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include ('menu.php');?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex flex-around">
                    <h1 id="_description" class="table-title"> <strong class="table-title-inner fi-clipboard-pencil">Seleccione un Cliente</strong> </h1>
                                    
                   
                </div>
            
            <div class="row">
                <form action="" method="get">
                    <div class="span3">
                        <label for="ci">Cedula de Identidad: </label>
                        <div class="input-control text" data-role="input-control">
                            <input id="ci" type="number" name="ci" placeholder="Cedula de Identidad" value="<?=$ci?>">
                            <button class="btn-clear " tabindex="-1" type="button"></button>
                        </div>

                    </div>

                    <div class="span3">
                                <div class="input-control select">
                                    <label for="tipo">Tipo de Cliente:</label>
                                    <select id="tipo" name="tipo">
                                        <? if($tipo == ''): ?>
                                            <option value="" selected="selected">----------</option>
                                            <option value="Agencia">Agencia</option>
                                            <option value="Tienda">Tienda</option>
                                            <option value="Normal">Normal</option>
                                        <?endif?>
                                        <? if($tipo == 'Agencia'): ?>
                                            <option value="">----------</option>
                                            <option value="Agencia" selected="selected">Agencia</option>
                                            <option value="Tienda">Tienda</option>
                                            <option value="Normal">Normal</option>
                                        <?endif?>
                                        <?if($tipo == 'Tienda'):?>
                                            <option value="">----------</option>
                                            <option value="Agencia">Agencia</option>
                                            <option value="Tienda" selected="selected">Tienda</option>
                                            <option value="Normal">Normal</option>
                                        <? endif ?>
                                        <?if($tipo == 'Normal'):?>
                                            <option value="">----------</option>
                                            <option value="Agencia">Agencia</option>
                                            <option value="Tienda">Tienda</option>
                                            <option value="Normal" selected="selected">Normal</option>
                                        <? endif ?>
                                    </select>
                            </div>
                     </div>
                    <div class="span3">
                        <label for="">&nbsp</label>
                        <button class="default icon-search btn-search"> Buscar</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <table class="table-ctn">
                    <thead>
                    <tr>
                        <th class="text-left"><strong>Nro</strong></th>
                        <th class="text-left"><strong>Cedula</strong></th>
                        <th class="text-left"><strong>Nombre Completo</strong></th>
                        <th class="text-left"><strong>Dirección</strong></th>
                        <th class="text-left"><strong>Email</strong></th>
                        <th class="text-left"><strong>Opcion<strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? $num = 1 ?>
                    <? foreach ($clientes as $fila):?>
                        <tr>
                            <td class="text-left"><?= $num++ ?></td>
                            <td class="text-left"><?= $fila->ci?></td>
                            <td class="text-left"><?= $fila->paterno?> <?=$fila->materno?>, <?= $fila->nombre?></td>
                            <td class="text-left"><?= $fila->direccion?></td>
                            <td class="text-left"><?= $fila->email?></td>
                            <td>
                                <p ><?=anchor("ventas/new_venta/$fila->id","Seleccione", array('class'=>'btn-table-see-detail'))?></p>
                            </td>
                        </tr>
                    <? endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>