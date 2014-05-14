<?php
include_once '../inicio/valido.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Expediente - Certificados</title>
        <?php include_once "../includes/php/estilos.php"; ?>
        <!--<script type="text/javascript" src="js/funciones.js"></script>-->
    </head>
    <body>
        <?php
        include_once "../includes/php/header.php";

        ?>
        <div class="container">
            <legend>Expediente Certificados</legend>
            <div class="form-group col-lg-12">
                <?php
                /* Buscar a travez del id del expediente los datos para poder buscar el historial del mismo. */
                echo $_GET['id'];
                ?>
            </div>
        </div>
        <div id="divResultado"></div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
