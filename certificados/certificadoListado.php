<?php
include_once '../inicio/valido.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SGO - Certificados</title>
        <?php include_once "../includes/php/estilos.php"; ?>
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body>
        <?php
        include_once "../includes/php/header.php";
        require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
        $oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
        $oMysql->conectar();
        
        /* Cargo todos los expedientes para procesarlos y generar el listado. 
         * Para poder procesar los datos obtenidos de la bases, voy a necesitar un for anidado,
         * dado que con uno se controlara la cantidad de expedientes de una obra y con el otro
         * la cantidad de obras que hay en la base.
         */
//        $oExpediente = $oMysql->getExpedienteActiveRecord();
        ?>
        <div class="container">
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th>Certificado DPV</th>
                    <th>Certificado DNV</th>
                    <th>Expediente DNV</th>
                    <th>Expediente DPV</th>
                    <th>Mes</th>
                    <th>Dependencia</th>
                    <th>Comentario</th>
                    <th>Importe</th>
                    <th>Vto.</th>
                    <th>Cedido</th>
                </tr>
                <tr>
                    <td>27 R.P.</td>
                    <td>31 R.P.</td>
                    <td>3452/12</td>
                    <td>81639/12</td>
                    <td>Jun.-11</td>
                    <td>Marcha de Contratos</td>
                    <td></td>
                    <td>$183085.46</td>
                    <td>27-Abr.-2012</td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div id="divResultado"></div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
