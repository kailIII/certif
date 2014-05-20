<?php
/**
 * veamos veamos...
 * Obtengo los expediente.idCertificacíon con los cuales puedo buscar los certificacion.idObra y de esta manera
 * obtengo los obrasejecutadas.denominacion (nombre de la obra).
 * Ahora que ya tengo los nombres de las obras puedo recorrer todos los expedientes por cada certificacion.
 * 
 */
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

        /* Busco los expediente.idCertificacion y los agrego a una lista para 
         * poder buscar los nombres de las obras y poder recorrerlo. */
        $oExpedientes = $oMysqlExpediente->buscarIdCertificaciones();
        $lista = '';
        foreach ($oExpedientes as $expediente) {
            $lista .= $expediente->getIdCertificacion().',';
        }
        $lista = substr($lista, 0, strlen($lista)-1);
        $lista = explode(',', $lista);
        /* En $lista poseo los idCertificacion. */
        
        $oMysqlObra = $oMysql->getObrasEjecutadasActiveRecord();
        $oMysqlCertificacion = $oMysql->getCertificacionActiveRecord();
        include_once '../clases/ValueObject/CertificacionValueObject.php';
        $oCertificacion = new CertificacionValueObject();
//        
//        $oMysqlObra = $oMysql->getObrasEjecutadasActiveRecord();
//        
//        $oExpediente = $oMysqlExpediente->buscarIdExpedientes();
        ?>
        <div class="container">
            <legend>Certificados</legend>
            <div class="form-group col-lg-12">
                <?php
                foreach($lista as $lista_){
                    /* Busco el nombre de la obra. */
                    $oCertificacion->setId($lista_);
                    $oCertificacion = $oMysqlCertificacion->buscar($oCertificacion);
                    
                    unset($oObra);
                    $oObra = new ObrasEjecutadasValueObject();
                    $oObra->setID($oCertificacion->getIdObra());
                    $oObra = $oMysqlObra->buscar($oObra);

                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <td colspan="10" class="success"><?php echo utf8_encode($oObra->getDenominacion()); ?></td>
                        </tr>
                        <tr>
                            <th>Cert. DPV</th>
                            <th>Cert. DNV</th>
                            <th>Expediente DNV</th>
                            <th>Expediente DPV</th>
                            <th>Mes</th>
                            <th>Dependencia</th>
                            <!--<th>Comentario</th>-->
                            <th>Importe</th>
                            <th>Vto.</th>
                            <th>Restante&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <!--<th>Cedido</th>-->
                        </tr>
                        <?php
                        unset($oExpediente);
                        $oExpediente = new ExpedienteValueObject();
                        $oExpediente->setIdCertificacion($lista_);
                        $oExpediente = $oMysqlExpediente->buscarPorCertificacion($oExpediente);
                        $total = 0;
                        foreach ($oExpediente as $expe) {
                            unset($oExpediente1);
                            $oExpediente1 = new ExpedienteValueObject();
                            $oExpediente1->setIdexpediente($expe->getIdexpediente());
                            $oExpediente1 = $oMysqlExpediente->buscarPorExpediente($oExpediente1);
                            foreach ($oExpediente1 as $expediente) {
                                unset($oMysqlExpHistoria);
                                unset($oExpHistoria);
                                $oMysqlExpHistoria = $oMysql->getExpHistotiaActiveRecord();
                                $oExpHistoria = new ExpHistoriaValueObject();
                                $oExpHistoria->setIdexpediente($expe->getIdexpediente());
                                $oExpHistoria = $oMysqlExpHistoria->buscar($oExpHistoria);
                                if($oExpHistoria){
                                    $diaTabla = new DateTime($oExpHistoria[0]->getFecha());
                                } else {
                                    $diaTabla = new DateTime(date('Y-m-d'));
                                }
                                $diaHoy = new DateTime(date('Y-m-d'));
                                $dias = $diaTabla->diff($diaHoy);
                                ?>
                                <tr ondblclick="javascript:window.location.href='../historiaCertificado/'+<?php echo $expediente->getIdexpediente(); ?>;">
                                    <td><?php echo $expediente->getCertDpv(); ?></td>
                                    <td><?php echo $expediente->getCertDnv(); ?></td>
                                    <td><?php echo $expediente->getExpDnv(); ?></td>
                                    <td><?php echo $expediente->getExpDpv(); ?></td>
                                    <td><?php echo $expediente->getMes(); ?></td>
                                    <td><?php echo $expediente->getDependencia(); ?></td>
                                    <!--<td><?php // echo $expediente->getComentario(); ?></td>-->
                                    <td><?php echo $expediente->getImporte(); $total += $expediente->getImporte(); ?></td>
                                    <td><?php echo $expediente->getVencimiento(); ?></td>
                                    <?php if ((($dias->format('%a')*100)/7)<50) $progreso = 'progress-bar-susses'; ?>
                                    <?php if ((($dias->format('%a')*100)/7)>=50) $progreso = 'progress-bar-warning'; ?>
                                    <?php if ((($dias->format('%a')*100)/7)>=85) $progreso = 'progress-bar-danger'; ?>
                                    <td><div class="progress"><div class="progress-bar <?php echo $progreso; ?>" style="width: <?php echo ($dias->format('%a')*100)/7; ?>%;"></div></div>
                                    </td>
                                    <!--<td><?php // echo $expediente->getCedido(); ?></td>-->
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="5"></td>
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
