<?php
set_time_limit(0);
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
                        <img src="../images/todo/preload.GIF">
                        <br/>Actualizando los datos...
                        <br/>Tiempo aproximado <?php echo count($aExpediente) * 4; ?> segundos
                        
                        <div id="divResultado"></div>
                        <div id="divResultado1" ></div>
                        <?php
                        /* 
                         * tengo los id de los expedientes, ahora tengo que recorrerlos
                         * para poder de esta manera ir actualizando.
                         */
                        ?>
                    </div>
<!--                <div class="span3">
                    <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                </div>-->
                    <br />
                </div>
            </form>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
<?php
/* 
 * tengo los id de los expedientes, ahora tengo que recorrerlos
 * para poder de esta manera ir actualizando.
 */
$seg = date("s");
$cont = 0;
foreach ($aExpediente as $aExpe_1) {
    ?>
    <br>
    <script>actualizarExpediente('<?php echo $aExpe_1; ?>', <?php echo $cont; ?>);</script>
    <?php
    $cont ++;
}
//$seg = date("s");
//foreach ($aExpediente as $aExpe_1) {
//    while (true) {
//        if(date("s")%4 === 0){
//            sleep(1);
//            ?>
            <!--<br>-->
            <!--<script>actualizarExpediente('//<?php // echo $aExpe_1; ?>');</script>-->
            <?php
//            break;
//        }
//    }
//}
