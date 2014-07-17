<?php
//UPDATE dependencia SET orden = orden + 1
//  WHERE orden >= 2
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
include_once '../inicio/valido.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Expediente - Certificados</title>
        <?php include_once "../includes/php/estilos.php"; ?>
        <script type="text/javascript" src="js/funciones.js"></script>
        <script type="text/javascript" src="js/ajax-dynamic-list.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
    </head>
    <body>
        <?php
        include_once "../includes/php/header.php";
        $oMysqlDependencia = $oMysql->getDependenciaActiveRecord();
//        $oDependencia = new DependenciaValueObject();
        $orden = $oMysqlDependencia->buscarOrden();
        ?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Dependencias</legend>
                <div class="form-group col-lg-12">
                    <div class="form-group col-lg-12">
                        <label class="control-label">Descripci&oacute;n de la dependencia</label><br />
                        <input class="form-control" data-toggle="tooltip" name="dependencia" id="dependencia" title="Descripci&oacute;n de la dependencia" alt="Descripci&oacute;n de la dependencia" placeholder="Descripci&oacute;n de la dependencia" type="text"
                               onkeyup="ajax_showOptionsDependencia(this,'getListadoByLetters',event);" /><br/>
                        <input type="hidden" id="dependencia_hidden" name="dependencia_ID" value="" />
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="control-label">D&iacute;as duraci&oacute;n</label><br />
                        <input class="form-control" data-toggle="tooltip" name="duracion" id="duracion" title="Duraci&oacute;n dentro de la oficina" alt="Duraci&oacute;n dentro de la oficina" type="number" min="0" value="7" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="control-label">Orden</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?=$orden;?>" value="<?=$orden;?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>

                    <div class="span3">
                        <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                    </div>
                </div>
                <br />
            </form>
            <div id="divResultado"></div>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>