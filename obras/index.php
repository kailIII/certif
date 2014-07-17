<?php
include_once '../inicio/valido.php';

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SGO - Obras</title>
        <script type="text/javascript" src="js/funciones.js"></script>
        <script type="text/javascript" src="js/ajax-dynamic-list.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <?php include_once "../includes/php/estilos.php";?>
    </head>
    <body>
        <?php
        include_once "../includes/php/header.php";
        $oMysqlObra = $oMysql->getObrasEjecutadasActiveRecord();

        ?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Obras en Ejecuci&oacute;n y Ejecutadas</legend>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label-success label">Identificaci&oacute;n</label>
                        <input class="form-control small" name="identificador" id="identificador" size="10" onKeypress="return soloNumeros(event);" value="<?php echo $oMysqlObra->buscarUltimo();?>" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <label class="label-success label"> Denominaci&oacute;n </label>
                        <!--<textarea class="form-control input-group" rows="2" maxlength="250" name="denominacion" id="denominacion" ></textarea>-->
                        <input class="form-control small" name="denominacion" id="denominacion" value="" />
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Expediente</label>
                        <input class="form-control small" name="expediente" id="expediente" value="" />
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label class="label-success label">Fecha Obra</label>
                        <input class="form-control small" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>" type="date" />
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4">
                        <label class="label-success label"> Comitente </label><br />
                        <?php
                        $oMysqlComitente = $oMysql->getComitenteActiveRecord();
                        $oComitente = new ComitenteValueObject();
                        $oComitente = $oMysqlComitente->buscarTodo();
                        ?>
                        <select name="comitente" id="comitente" class="select-block">
                        <?php
                        foreach ($oComitente as $aComitente) {
                            ?>
                            <option value="<?php echo $aComitente->getId(); ?>" ><?php echo utf8_encode($aComitente->getDescripcion()); ?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos();" />
                    </div>
                    <div class="col-lg-9" id="resultado"></div>
                </div>
            </form>
            <div id="mensaje" style="color:brown; "></div>
            <div id="div_listar"></div>
            <div id="div_oculto" ></div>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
