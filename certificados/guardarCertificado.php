<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
/**
 * Guarda los datos en la tabla de Certificados.
 * Tengo que ver cuando se mandan los datos de la cabecera. Si los mismos no se mandan
 * debo guardar los datos solo en la tabla de Expediente, a su vez debo comprobar antes
 * que los datos no esten cargados con aterioridad para que no halla duplicación de estos.
 */

include_once '../clases/ValueObject/ObrasEjecutadasValueObject.php';
include_once '../clases/ValueObject/CertificacionValueObject.php';
//include_once '../clases/ActiveRecord/MysqlCertificacionActiveRecord.php';

/*
 * Tengo que ver como es el orden de la grabacion de los datos.
 * Guardo:
 * 1° La obra (la denominacion de la misma).
 * 2° El certificado.
 * 3° El expediente,
 * 4° El hisotrial de expediente.
 */

$oMysqlObra = $oMysql->getObrasEjecutadasActiveRecord();
$oObra = new ObrasEjecutadasValueObject();
$oObra->setDenominacion($_POST['nombreobra']);

$error = 0;
mysql_query('BEGIN;');
/* 1° Guardo Obra */
if(!$oMysqlObra->guardarDenominacion($oObra)) {
    $error ++;
}

$oMysqlCertificado = $oMysql->getCertificacionActiveRecord();
$oCertificado = new CertificacionValueObject();
$oCertificado->setIdObra($oObra->getID());
if(isset($_POST['nrocert'])){
    //$oCertificado->setIdObra($_POST['identificador']);
    $oCertificado->setIdTipo($_POST['tipocertf']);
    $oCertificado->setCertNro($_POST['nrocert']);
    $oCertificado->setPeriodo($_POST['periodo']);
    $oCertificado->setFechaFirma($_POST['fechafirma']);
    $oCertificado->setFecha($_POST['fechafirma']);
    $oCertificado->setParticipacion($_POST['participacion']);
    $oCertificado->setImporteBasico($_POST['importeb']);
    $oCertificado->setImporteRedeterminado($_POST['importer']);
    $oCertificado->setFondoReparo($_POST['fondoamp']);
    $oCertificado->setAnticipoFinanciero($_POST['anticipo']);
    $oCertificado->setOtrosDescuentos($_POST['otros']);
    $oCertificado->setACobrar($_POST['acobrar']);
    $oCertificado->setComentario($_POST['comentarios']);
    if(!$oMysqlCertificado->guardar($oCertificado)){
        $error ++;
    }
} else {
    if(!$oMysqlCertificado->guardarSolo($oCertificado)){
        $error ++;
    }
}

$oMysqlDependencia = $oMysql->getDependenciaActiveRecord();
$oDependencia = new DependenciaValueObject();
$oDependencia->setDependencia($_POST['dependenciaExpediente']);

if(!$oMysqlDependencia->guardar($oDependencia)){
    $error ++;
}
// else {
//    echo 'Tincho Dependencia -> ' . $oDependencia->getIddependencia();
//    echo 'Tincho Dependencia -> ' . $oDependencia->getDependencia();
//}



/* Seteo los datos del expediente. */
$oMysqlExpediente = $oMysql->getExpedienteActiveRecord();
$oExpediente = new ExpedienteValueObject();
$oExpediente->setIdCertificacion($oCertificado->getId());
$oExpediente->setCertDpv($_POST['dpvCertificado']);
$oExpediente->setCertDnv($_POST['dnvCertificado']);
$oExpediente->setExpDpv($_POST['dpvExpediente']);
$oExpediente->setExpDnv($_POST['dnvExpediente']);
$oExpediente->setMes($_POST['mesExpediente']);
$oExpediente->setDependencia($oDependencia->getIddependencia());
//$oExpediente->setDependencia($_POST['dependenciaExpediente']);
$oExpediente->setImporte($_POST['importeExpediente']);
$oExpediente->setVencimiento($_POST['vencimientoExpediente']);
$oExpediente->setCedido($_POST['cedidoExpediente']);
$oExpediente->setComentario($_POST['comentarioExpediente']);
/* Grabacion del expediente. */
if(!$oMysqlExpediente->guardar($oExpediente)){
    $error ++;
}

/* Para almacenar en la tabla vialidad. */
$oMysqlVialidad = $oMysql->getVialidadActiveRecord();
$oVialidad = new VialidadValueObject();
$oVialidad->setIdentificador($_POST['identificador']);
$oVialidad->setTipotramite($_POST['tipotramite']);
$oVialidad->setTema($_POST['tema']);
$oVialidad->setFechaalta($_POST['fechaalta']);
$oVialidad->setExtracto($_POST['extracto']);
$oVialidad->setEstado($_POST['estado']);
$oVialidad->setOrganismoa($_POST['organismoa']);
$oVialidad->setDependenciaa($_POST['dependenciaa']);
$oVialidad->setOrganismod($_POST['organismod']);
$oVialidad->setDependenciad($_POST['dependenciad']);
$oVialidad->setConformado($_POST['conformado']);
$oVialidad->setIdexpediente($oExpediente->getIdexpediente());

if(!$oMysqlVialidad->guardar($oVialidad)){
    $error ++;
}

/* Grabacion de los datos del historial del expediente. */
$oMysqlExpHistoria = $oMysql->getExpHistotiaActiveRecord();
$oExpHistoria = new ExpHistoriaValueObject();
$oExpHistoria->setComentario($_POST['comentarioExpediente']);
$oExpHistoria->setDependencia($oDependencia->getIddependencia());
//$oExpHistoria->setDependencia($_POST['dependenciaExpediente']);
//$oExpHistoria->setFecha($_POST['fechaalta']);
$oExpHistoria->setFecha(date('Y-m-d'));
$oExpHistoria->setIdexpediente($oExpediente->getIdexpediente());
if(!$oMysqlExpHistoria->guardar($oExpHistoria)){
    $error ++;
}

if($error == 0){
    mysql_query("COMMIT;");
    ?>
    <div class="form-group has-success">
        <div class="col-xs6">
            <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="form-group has-error">
        <div class="col-xs6">
            <input type="text" value="Los Datos No Han Sido Almacenados" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
}