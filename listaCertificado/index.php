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
        /* Cargo todos los expedientes para procesarlos y generar el listado. 
         * Para poder procesar los datos obtenidos de la bases, voy a necesitar un for anidado,
         * dado que con uno se controlara la cantidad de expedientes de una obra y con el otro
         * la cantidad de obras que hay en la base.
         */
        
        $oMysqlExpediente = $oMysql->getExpedienteActiveRecord();
        $oExpediente = new ExpedienteValueObject();
//        $oExpedientes = $oMysqlExpediente->buscarIdCertificaciones();
//        $lista = '';
//        foreach ($oExpedientes as $expediente) {
//            $lista .= $expediente->getIdCertificacion().',';
//        }
//        $lista = substr($lista, 0, strlen($lista)-1);
        $oExpediente = $oMysqlExpediente->buscarIdExpedientes();
        ?>
        <div class="container">
            <legend>Certificados</legend>
            <div class="form-group col-lg-12">
                <?php
                foreach ($oExpediente as $expe) {
                ?>
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <td colspan="10">Ruta 39 (UTE Losi-Pietroboni)</td>
                    </tr>
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
                    <?php
                    $total = 0;
                    $oExpediente1 = new ExpedienteValueObject();
                    $oExpediente1->setIdexpediente($expe->getIdexpediente());
//                    $oExpediente = $oMysqlExpediente->buscarPorCertificacion($oExpediente);
                    $oExpediente1 = $oMysqlExpediente->buscarPorExpediente($oExpediente1);
                    foreach ($oExpediente1 as $expediente) {
                    ?>
                    <tr>
                        <td><?php echo $expediente->getCertDpv(); ?></td>
                        <td><?php echo $expediente->getCertDnv(); ?></td>
                        <td><?php echo $expediente->getExpDnv(); ?></td>
                        <td><?php echo $expediente->getExpDpv(); ?></td>
                        <td><?php echo $expediente->getMes(); ?></td>
                        <td><?php echo $expediente->getDependencia(); ?></td>
                        <td><?php echo $expediente->getComentario(); ?></td>
                        <td><?php echo $expediente->getImporte(); $total += $expediente->getImporte(); ?></td>
                        <td><?php echo $expediente->getVencimiento(); ?></td>
                        <td><?php echo $expediente->getCedido(); ?></td>
                    </tr>
                    <?php
                    }
                    unset($oExpediente1);
                    ?>
                    <tr>
                        <td colspan="6"></td>
                        <td>Total</td>
                        <td><?php echo $total; ?></td>
                        <td colspan="2"></td>
                    </tr>
                </table>
                <?php
                }
                ?>
            </div>
        </div>
        <div id="divResultado"></div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
