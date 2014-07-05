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
                    <tr ondblclick="javascript:window.location.href='../historiaCertificado/'+<?php echo $expediente->getIdexpediente(); ?>;">
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
                            <div class="progress bajocinco"><div class="progress-bar <?php echo $progreso; ?>" style="width: <?php echo ($dias->format('%a')*100)/7; ?>%;"></div></div>
                            <div class="progress bajocero"><div class="progress-bar <?php echo $progresoD; ?>" style="width: <?php echo ($orden_*100)/$ordenTotal; ?>%;"></div></div>
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
<?php
//[1]=> array(2) { [0]=> string(39) "SUB GERENCIA DE CONTABILIDAD Y FINANZAS" [1]=> NULL } 
//[2]=> array(2) { [0]=> string(18) "DIVISION CONTRALOR" [1]=> NULL } 
//[3]=> array(2) { [0]=> string(29) "DIVISION TESORERIA Y FINANZAS" [1]=> NULL } 
//[10]=> array(2) { [0]=> string(20) "DIVISION PRESUPUESTO" [1]=> NULL }
//[11]=> array(2) { [0]=> string(22) "CONSOLIDACION DE DEUDA" [1]=> NULL } 
//[9999]=> array(2) { [0]=> string(11) "DESCONOCIDO" [1]=> NULL }
//[10008]=> array(2) { [0]=> string(45) "1? DISTRITO - BUENOS AIRES - MESA DE ENTRADAS" [1]=> NULL } 
//[10009]=> array(2) { [0]=> string(40) "13? DISTRITO - CHUBUT - MESA DE ENTRADAS" [1]=> NULL } 
//[10010]=> array(2) { [0]=> string(45) "19?-DISTRITO - BAHIA BLANCA - MESA DE ENTRADA" [1]=> NULL } 
//[10011]=> array(2) { [0]=> string(43) "11? DISTRITO - CATAMARCA - MESA DE ENTRADAS" [1]=> NULL } 
//[10013]=> array(2) { [0]=> string(0) "" [1]=> NULL }
//[10015]=> array(2) { [0]=> string(31) "ARCHIVO GENERAL DE CONTABILIDAD" [1]=> NULL } 
//[10016]=> array(2) { [0]=> string(33) "COORDINACION GENERAL DE DISTRITOS" [1]=> NULL } 
//[10017]=> array(2) { [0]=> string(45) "19?-DISTRITO - BAHIA BLANCA - MESA DE ENTRADA" [1]=> NULL } 
//[10018]=> array(2) { [0]=> string(17) "DIVISION DESPACHO" [1]=> NULL } 
//[10019]=> array(2) { [0]=> string(45) "19?-DISTRITO - BAHIA BLANCA - MESA DE ENTRADA" [1]=> NULL } 
//[10020]=> array(2) { [0]=> string(33) "DIVISION MESA GENERAL DE ENTRADAS" [1]=> NULL } 
//[10021]=> array(2) { [0]=> string(45) "19?-DISTRITO - BAHIA BLANCA - MESA DE ENTRADA" [1]=> NULL } 
//[10022]=> array(2) { [0]=> string(45) "19?-DISTRITO - BAHIA BLANCA - MESA DE ENTRADA" [1]=> NULL } 
//[10023]=> array(2) { [0]=> string(45) "19?-DISTRITO - BAHIA BLANCA - MESA DE ENTRADA" [1]=> NULL } 
//[10024]=> array(2) { [0]=> string(45) "19?-DISTRITO - BAHIA BLANCA - MESA DE ENTRADA" [1]=> NULL } 
//[10025]=> array(2) { [0]=> string(6) "Prueba" [1]=> NULL } 
//[10026]=> array(2) { [0]=> string(7) "Prueba2" [1]=> NULL } }