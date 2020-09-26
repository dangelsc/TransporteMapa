<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner"> Permisos del Usuario</strong></h1>
            </div>
            </br>
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            <div class="row">
                <div class="table-ctn">
                    <strong> Nombre de Usuario :</strong> <?=sacar_nombre($usuario_id)?>
                </div>
                </br>
                <div class="span6">
                    <strong> Correo Electronico :</strong> <?=sacar_email($usuario_id)?>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="span9">

                    <strong> Estado:</strong> <?=sacar_estado($usuario_id)?>

               </div>
            </div>
            </br>
            <div class="row">
                <div class="">
                    <table class="table-ctn"> 
                        <thead>
                        <tr>
                            <th class="text-center"><strong>Nro.</strong></th>
                            <th class="text-center"><strong>Permiso</strong></th>


                        </tr>
                        </thead>

                        <tbody>

                            <?$num=0?>
                            <?foreach ($lista_permisos as $fila):?>

                                <tr>
                                    <?$num += 1?>
                                    <td><?=$num?></td>
                                    <td><?=sacar_permiso($fila->permisos_id)?></td>

                                </tr>
                            <?endforeach?>
                        </tbody>
                    </table>
                </div>
                <div class="span4"></div>
        </div>
    </div>
</div>