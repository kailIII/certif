<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlObras = $oMysql->getObrasEjecutadasActiveRecord();
$oObra = new ObrasEjecutadasValueObject();
$oObra->setIdcomitente($_POST['comitente']);
$oObra = $oMysqlObras->buscarComitente($oObra);
$obras = "";
foreach ($oObra as $aObra) {
    $obras .= $aObra->getID().',';
}
$obras = substr($obras, 0, strlen($obras)-1);

?>

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
        
        
        
//        $obras = explode(',', $obras);
        
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
                /* Muestro los datos del expediente en las tablas correspondientes.
                 * Se busca en el historico el lugar acutal del expediente.
                 * Si no se encuentra se carga la fecha actual del sistema
                 * y se informa con dependencia desconocida.
                 */
                foreach ($oExpediente1 as $expediente) {
                    unset($oMysqlExpHistoria);
                    unset($oExpHistoria);
                    $oMysqlExpHistoria = $oMysql->getExpHistotiaActiveRecord();
                    $oExpHistoria = new ExpHistoriaValueObject();
                    $oExpHistoria->setIdexpediente($expe->getIdexpediente());
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
                    <tr ondblclick="javascript:window.location.href='../historiaCertificado/'+<?php echo $expediente->getIdexpediente(); ?>;">
                        <td><?php echo $expediente->getCertDpv(); ?></td>
                        <td><?php echo $expediente->getCertDnv(); ?></td>
                        <td><?php echo $expediente->getExpDnv(); ?></td>
                        <td><?php echo $expediente->getExpDpv(); ?></td>
                        <td><?php echo $expediente->getMes(); ?></td>
                        <!--<td><?php // echo $expediente->getDependencia(); ?></td>-->
                        <td><?php echo $dependencia[$dependenciaActual]; ?></td>
                        <!--<td><?php // echo $expediente->getComentario(); ?></td>-->
                        <td>$ <?php echo $expediente->getImporte(); $total += $expediente->getImporte(); ?></td>
                        <td><?php echo $expediente->getVencimiento(); ?></td>
                        <?php if ((($dias->format('%a')*100)/7)<50) $progreso = 'progress-bar-susses'; ?>
                        <?php if ((($dias->format('%a')*100)/7)>=50) $progreso = 'progress-bar-warning'; ?>
                        <?php if ((($dias->format('%a')*100)/7)>=85) $progreso = 'progress-bar-danger'; ?>
                        <td><div class="progress bajocinco"><div class="progress-bar <?php echo $progreso; ?>" style="width: <?php echo ($dias->format('%a')*100)/7; ?>%;"></div></div>
                            <div class="progress bajocero"><div class="progress-bar <?php echo $progreso; ?>" style="width: <?php echo ($dias->format('%a')*100)/7; ?>%;"></div></div>
                        </td>
                        <!--<td><?php // echo $expediente->getCedido(); ?></td>-->
                    </tr>
                    <?php
                }
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