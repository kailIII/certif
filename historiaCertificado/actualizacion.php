<?php
/* 
 * Realiza la actualizacion de todos los datos que se encuentren en certuficados.
 */
include_once '../inicio/valido.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

/* Busco los datos de la tabla expediente para poder realizar un array. */
$oMysqlExpediente = $oMysql->getExpedienteActiveRecord();
$oExpediente = new ExpedienteValueObject();
$oExpediente = $oMysqlExpediente->buscarSinFin();
$aExpediente = array();
foreach ($oExpediente as $aExpe) {
    $aExpediente[] = $aExpe->getExpDnv();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Expediente - Certificados</title>
        <?php include_once "../includes/php/estilos.php"; ?>
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body>
        <?php include_once "../includes/php/header.php";?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Actualizacion Certificados.</legend>
                <div class="form-group col-lg-12">
                    <div class="col-lg-11">
                        <div class="progress">
                            <input type="hidden" id="total" value="1" />
                            <!--<div id="progreso" class="progress-bar progress-bar-success" style="width: <?php //echo ($total*100)/count($aExpediente); ?>%;"></div>-->
                            <div id="progreso" class="progress-bar progress-bar-success"></div>
                        </div>
                        <?php
                        /* 
                         * tengo los id de los expedientes, ahora tengo que recorrerlos
                         * para poder de esta manera ir actualizando.
                         */
                        $lista = '';
                        foreach ($aExpediente as $aExpe_1) {
                            $lista .= $aExpe_1 . ',';
                        }
                        $lista = substr($lista, 0, -1);
                        ?>
                    </div>
<!--                <div class="span3">
                    <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                </div>-->
                <br />
            </form>
            <div id="divResultado"></div>
            <div id="divResultado1"></div>
            <!--<div id="divResultado1" style="display: none;"></div>-->
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
        <script>actualizarExpediente('<?php echo $lista; ?>');</script>
        <!--<script>actualizarExpediente('<?php // echo "0010406/2013"; ?>');</script>-->
    </body>
</html>