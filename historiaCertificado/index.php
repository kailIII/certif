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
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body>
        <?php include_once "../includes/php/header.php"; ?>
        <div class="container">
            <legend>Expediente Certificados</legend>
            <div class="form-group col-lg-12">
                <ul class="pager">
                    <li class="previous">
                        <a href="javascript:history.back();">
                            <span class="fui-arrow-left"></span>
                            <span>Listado Expediente</span>
                        </a>
                    </li>
                </ul>
                <?php
                /* Buscar a travez del id del expediente los datos para poder buscar el historial del mismo. */
                $oExpediente = new ExpedienteValueObject();
                $oMysqlExpediente = $oMysql->getExpedienteActiveRecord();
                $oExpediente->setIdexpediente($_GET['id']);
                $oExpediente = $oMysqlExpediente->buscarPorExpediente($oExpediente);

                /* Falta mostrar el nombre de la obra */
                ?>
                
                <table class="table table-striped table-bordered table-hover">
<!--                    <tr>
                        <td colspan="10" class="success"><?php // echo utf8_encode($oObra->getDenominacion()); ?></td>
                    </tr>-->
                    <tr>
                        <th>Certificado DPV</th>
                        <th>Certificado DNV</th>
                        <th>Expediente DNV</th>
                        <th>Expediente DPV</th>
                        <th>Mes</th>
                        <th>Importe</th>
                        <th>Vto.</th>
                        <th>Cedido</th>
                    </tr>
                    <tr>
                        <td><?php echo $oExpediente[0]->getCertDpv(); ?></td>
                        <td><?php echo $oExpediente[0]->getCertDnv(); ?></td>
                        <td><?php echo $oExpediente[0]->getExpDnv(); ?></td>
                        <td><?php echo $oExpediente[0]->getExpDpv(); ?></td>
                        <td><?php echo $oExpediente[0]->getMes(); ?></td>
                        <td><?php echo $oExpediente[0]->getImporte(); ?></td>
                        <td><?php echo $oExpediente[0]->getVencimiento(); ?></td>
                        <td><?php echo $oExpediente[0]->getCedido(); ?></td>
                    </tr>
                </table>
                <?php
                /* Ahora tengo que mostrar el historial del expediente. */
                $oExpHistoria = new ExpHistoriaValueObject();
                $oMysqlExpHistoria = $oMysql->getExpHistotiaActiveRecord();
                $oExpHistoria->setIdexpediente($oExpediente[0]->getIdexpediente());
                $oExpHistoria = $oMysqlExpHistoria->buscar($oExpHistoria);
                ?>
                <legend>Hitorico</legend>
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>Fecha</th>
                        <th>Dependencia</th>
                        <th>Comentario</th>
                    </tr>
                    <?php
                    foreach ($oExpHistoria as $historia) {
                    ?>
                    <tr>
                        <td><?php echo $historia->getFecha(); ?></td>
                        <td><?php echo $historia->getDependencia(); ?></td>
                        <td><?php echo $historia->getComentario(); ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td><div id="fecha"></div></td>
                        <td><div id="depen"></div></td>
                        <td><div id="comen"></div></td>
                    </tr>
                </table>
            </div>
            <div id="divResultado"></div>
            <script> busquedaExpediente(<?php echo "'".$oExpediente[0]->getExpDnv()."'"; ?>); </script>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
