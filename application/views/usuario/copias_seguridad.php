<div class="wrapper margin-top5">
    <div class="content content-wrapper">
        <div class="menu">
            <? include('menu.php') ?>
        </div>
        <br>
        <div class="content-table">
            <div class="content-table-title flex-around">
                    <h1 class="table-title"><strong class="table-title-inner">Copias de Seguridad</strong></h1>
            </div>
            
            <?if($mensaje!=''):?>
                <div>
                    <p class="bg-green fg-white padding5"><b>Nota :   </b> <?=$mensaje?></p>
                </div>
            <?endif?>
            </br>
            </br>
                
                <?php echo anchor("usuario/generar_backup/",' Descargar Backup',array('class'=>' btn-table-upload'))?>

        </div>

    </div>
</div>