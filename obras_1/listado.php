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
                    <th>Id</th>
                    <th>Denominacion</th>
                </tr>
                <?php
                include_once '../clases/ActiveRecord/MysqlObrasEjecutadasActiveRecord.php';
                $oObras = new MysqlObrasEjecutadasActiveRecord();
                $aObras = $oObras->buscarTodo();
                foreach ($aObras as $llave => $valor) { ?>
                    <tr>
                        <td><?php echo $valor->getID(); ?></td>
                        <td><a href="muestra.php?id=<?php echo $valor->getID(); ?>"><?php echo utf8_encode($valor->getDenominacion()); ?></a></td>
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
