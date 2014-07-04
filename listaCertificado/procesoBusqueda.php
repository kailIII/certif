<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlExpediente = $oMysql->getExpedienteActiveRecord();
$oMysqlCertificacion = $oMysql->getCertificacionActiveRecord();
$oMysqlObras = $oMysql->getObrasEjecutadasActiveRecord();

/* Cargo todas las dependencias para poder consultarlas cuando necesite. */
$dependencia = array();
$oMysqlDependencia = $oMysql->getDependenciaActiveRecord();
$oDependencia = new DependenciaValueObject();
$oDependencia = $oMysqlDependencia->buscarTodo();
foreach ($oDependencia as $auxDep) {
    $dependencia[$auxDep->getIddependencia()] = $auxDep->getDependencia();
}

$totalfinal = 0;
$total = 0;
$oObra = new ObrasEjecutadasValueObject();
$oObra->setIdcomitente($_POST['comitente']);
$oObra = $oMysqlObras->buscarComitente($oObra);
?>
<div class="form-group col-lg-12">
    <?php
    foreach ($oObra as $aObra) {
        if($oMysqlObras->comprueba($aObra) >= 1){
        ?>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td colspan="10" class="success">
                    <?php echo utf8_encode($aObra->getID() . ' ' . $aObra->getDenominacion() . ' ' . $aObra->getExpPrincipal()); ?>
                </td>
            </tr>
            <tr>
                <th>Cert. DPV</th>
                <th>Cert. DNV</th>
                <th>Expediente DNV</th>
                <th>Expediente DPV</th>
                <th>Mes</th>
                <th>Dependencia</th>
                <th>Importe</th>
                <th>Vto.</th>
                <th>Restante&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
        <?
        unset($oCertificacion);
        $oCertificacion = new CertificacionValueObject();
        $oCertificacion->setIdObra($aObra->getId());
        $oCertificacion = $oMysqlCertificacion->buscarObra($oCertificacion);

        foreach ($oCertificacion as $certificacion) {
            unset($oExpediente);
            $oExpediente = new ExpedienteValueObject();
            $oExpediente->setIdCertificacion($certificacion->getId());
            
            $oExpediente = $oMysqlExpediente->buscarPorCertificacion($oExpediente);
            $total = 0;
            foreach ($oExpediente as $aExpediente) {
                unset($oMysqlExpHistoria);
                unset($oExpHistoria);
                $oMysqlExpHistoria = $oMysql->getExpHistotiaActiveRecord();
                $oExpHistoria = new ExpHistoriaValueObject();
                $oExpHistoria->setIdexpediente($aExpediente->getIdexpediente());
                $oExpHistoria = $oMysqlExpHistoria->buscar($oExpHistoria);
                if($oExpHistoria){
                    $diaTabla = new DateTime($oExpHistoria[0]->getFecha());
                    $dependenciaActual = $oExpHistoria[0]->getDependencia();
                } else {
                    $diaTabla = new DateTime(date('Y-m-d'));
                    $dependenciaActual = 9999;
                }
                $diaHoy = new DateTime(date('Y-m-d'));
                $dias = $diaTabla->diff($diaHoy);

               ?>
                <tr ondblclick="javascript:window.location.href='../historiaCertificado/'+<?php echo $aExpediente->getIdexpediente(); ?>;">
                    <td><?php echo $aExpediente->getCertDpv(); ?></td>
                    <td><?php echo $aExpediente->getCertDnv(); ?></td>
                    <td><?php echo $aExpediente->getExpDnv(); ?></td>
                    <td><?php echo $aExpediente->getExpDpv(); ?></td>
                    <td><?php echo $aExpediente->getMes(); ?></td>
                    <td><?php echo $dependencia[$dependenciaActual]; ?></td>
                    <td>$ <?php echo $aExpediente->getImporte(); $total += $aExpediente->getImporte(); ?></td>
                    <td><?php echo $aExpediente->getVencimiento(); ?></td>
                    <?php if ((($dias->format('%a')*100)/7)<50) $progreso = 'progress-bar-susses'; ?>
                    <?php if ((($dias->format('%a')*100)/7)>=50) $progreso = 'progress-bar-warning'; ?>
                    <?php if ((($dias->format('%a')*100)/7)>=85) $progreso = 'progress-bar-danger'; ?>
                    <td><div class="progress bajocinco"><div class="progress-bar <?php echo $progreso; ?>" style="width: <?php echo ($dias->format('%a')*100)/7; ?>%;"></div></div>
                        <div class="progress bajocero"><div class="progress-bar <?php echo $progreso; ?>" style="width: <?php echo ($dias->format('%a')*100)/7; ?>%;"></div></div>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="5"></td>
                <td>Total Parcial</td>
                <td> $
                    <?php
                    echo $total;
                    $totalfinal += $total;
                    ?>
                </td>
                <td colspan="2"></td>
            </tr>
        </table>
        <?php
        }
        }
    }

    ?>
    <div class="form-group col-lg-3" style="float: right;">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td>Total Final</td>
                <td> $
                    <?php
                    echo $totalfinal;
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>