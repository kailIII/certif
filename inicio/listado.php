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
        <title>SGO - Obras</title>
        <script type="text/javascript" src="js/funciones.js"></script>
        <?php include_once "../includes/php/estilos.php";?>
    </head>
    <body>
        <?php include_once "../includes/php/header.php"; ?>
        <div class="container">
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th style="width: 4%">Id</th>
                    <th style="width: 30%">Denominacion</th>
                    <th style="width: 30%">Ubicaci&oacute;n</th>
                    <th style="width: 30%">Comitente</th>
                    <th style="width: 4%">Ver</th>
                </tr>
                <?php
                include_once '../clases/ActiveRecord/MysqlObrasEjecutadasActiveRecord.php';
                $oObras = new MysqlObrasEjecutadasActiveRecord();
                $aObras = $oObras->buscarTodo();
                foreach ($aObras as $llave => $valor) { ?>
                    <tr>
                        <td><?php echo $valor->getID(); ?></td>
                        <td><?php echo substr(utf8_encode($valor->getDenominacion()), 0, 60); ?></td>
                        <td><?php echo substr(utf8_encode($valor->getDenominacion()), 0, 60); ?></td>
                        <td><?php echo substr(utf8_encode($valor->getIdcomitente()), 0, 60); ?></td>
                        <td><a href="../obras/muestra.php?id=<?php echo $valor->getID(); ?>"><img src="../images/todo/search.png" /></a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
