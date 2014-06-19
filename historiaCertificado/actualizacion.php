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
                    <!--<div class="col-lg-11">-->
                        <div class="progress">
                            <input type="hidden" id="progreso" name="progreso" value="0" />
                            <input type="hidden" id="total" name="total" value="<?php echo count($aExpediente); ?>" />
                            <div class="progress-bar progress-bar-susses" style="width: 0%;" id="barra"></div>
                        </div>
                        <div id="divResultado" style="text-align: center;">
                            <img src="../images/todo/preload.GIF">
                            <br/>Actualizando los datos...
                        </div>
                        <div id="divResultado1" style="display: none;" ></div>
                        <div id="divResultado2" style="display: none;" >
                            <div class="form-group has-success">
                                <div class="col-xs6">
                                    <a href="../listaCertificado/" class="form-control" >Los Datos Se Actualizaron Correctamente.</a>
                                    <!--<span class="input-icon fui-check-inverted"></span>-->
                                </div>
                            </div>
                        </div>
                        <?php
                        /* 
                         * tengo los id de los expedientes, ahora tengo que recorrerlos
                         * para poder de esta manera ir actualizando.
                         */
                        ?>
                    <!--</div>-->
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