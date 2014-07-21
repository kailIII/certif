<?php
include_once '../inicio/valido.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
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

/* Cargo todas las dependencias para poder consultarlas cuando necesite. */
$dependencia = array();
$oMysqlDependencia = $oMysql->getDependenciaActiveRecord();
$ordenTotal = $oMysqlDependencia->buscarOrden() - 1;
$oDependencia = new DependenciaValueObject();
$oDependencia = $oMysqlDependencia->buscarTodo();
foreach ($oDependencia as $auxDep) {
    $dependencia[$auxDep->getIddependencia()][0] = $auxDep->getDependencia();
    if($auxDep->getOrden()!==''){
       $dependencia[$auxDep->getIddependencia()][1] = $auxDep->getOrden();
    } else {
        $dependencia[$auxDep->getIddependencia()][1] = 0;
    }
}
$totalfinal = 0;
?>
<div class="col-lg-12">
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
                <td colspan="10" class="success"><?php echo utf8_encode($oObra->getDenominacion().' -- '.$oObra->getExpPrincipal()); ?></td>
            </tr>
            <tr>
                <th>Cert.</th>
                <th>Cert. DNV</th>
                <th>Expediente DNV</th>
                <th>Expediente DPV</th>
                <th>Mes</th>
                <th>Dependencia</th>
                <!--<th>Comentario</th>-->
                <th>Importe</th>
                <th>Vto.</th>
                <th>Restante&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th></th>
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
                        $orden_ = $dependencia[$dependenciaActual][1];
                    } else {
                        $diaTabla = new DateTime(date('Y-m-d'));
                        $dependenciaActual = 9999;
                        $orden_ = 0;
                    }
                    $diaHoy = new DateTime(date('Y-m-d'));
                    $dias = $diaTabla->diff($diaHoy);
                    ?>
                    <tr ondblclick="javascript:window.location.href='../historiaCertificado/<?php echo $expediente->getIdexpediente(); ?>';">
                        <td><?php echo $expediente->getCertDpv(); ?></td>
                        <td><?php echo $expediente->getCertDnv(); ?></td>
                        <td><?php echo $expediente->getExpDnv(); ?></td>
                        <td><?php echo $expediente->getExpDpv(); ?></td>
                        <td><?php echo $expediente->getMes(); ?></td>
                        <!--<td><?php // echo $expediente->getDependencia(); ?></td>-->
                        <td><?php echo $dependencia[$dependenciaActual][0]; ?></td>
                        <!--<td><?php // echo $expediente->getComentario(); ?></td>-->
                        <td>$ <?php echo $expediente->getImporte(); $total += $expediente->getImporte(); ?></td>
                        <td><?php echo $expediente->getVencimiento(); ?></td>
                        <?php if ((($dias->format('%a')*100)/7)<50) $progreso = 'progress-bar-susses'; ?>
                        <?php if ((($dias->format('%a')*100)/7)>=50) $progreso = 'progress-bar-warning'; ?>
                        <?php if ((($dias->format('%a')*100)/7)>=85) $progreso = 'progress-bar-danger'; ?>
                        
                        <?php if ((($orden_*100)/7)<50) $progresoD = 'progress-bar-susses'; ?>
                        <?php if ((($orden_*100)/7)>=50) $progresoD = 'progress-bar-warning'; ?>
                        <?php if ((($orden_*100)/7)>=85) $progresoD = 'progress-bar-danger'; ?>
                        <td>
                            <div class="progress bajocinco">
                                <div class="progress-bar <?php echo $progreso; ?>" style="width: <?php echo ($dias->format('%a')*100)/7; ?>%;"
                                                                 title="<?php echo $diaTabla->format('d/m/Y'); ?>" ></div>
                                <div class="progress-bar progress-bar-info" style="width: <?php echo 100-($dias->format('%a')*100)/7; ?>%;"
                                                                 title="<?php echo $diaTabla->format('d/m/Y'); ?>" ></div>
                            </div>
                            <div class="progress bajocero">
                                <div class="progress-bar <?php echo $progresoD; ?>" style="width: <?php echo ($orden_*100)/$ordenTotal; ?>%;"
                                                                title="<?php echo $diaTabla->format('d/m/Y'); ?>"></div>
                            </div>
                        </td>
                        <td>
                            <?php
                            if($expediente->getCedido() != ''){
                                echo "<img src='../images/punto_verde_12.png' title='".
                                utf8_decode($expediente->getCedido())."' />";
                            }
                            ?>
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
                <td colspan="3"></td>
            </tr>
        </table>
        <?php
    }
    ?>
    <!--<div style="width: 30%">-->
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