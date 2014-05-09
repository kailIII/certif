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

$oMysqlExpediente = $oMysql->getExpedienteActiveRecord();
$oExpediente = new ExpedienteValueObject();
$oExpediente->setIdCertificacion($oCertificado->getId());
$oExpediente->setCertDpv($_POST['dpvCertificado']);
$oExpediente->setCertDnv($_POST['dnvCertificado']);
$oExpediente->setExpDpv($_POST['dpvExpediente']);
$oExpediente->setExpDnv($_POST['dnvExpediente']);
$oExpediente->setMes($_POST['mesExpediente']);
$oExpediente->setDependencia($_POST['dependenciaExpediente']);
$oExpediente->setImporte($_POST['importeExpediente']);
$oExpediente->setVencimiento($_POST['vencimientoExpediente']);
$oExpediente->setCedido($_POST['cedidoExpediente']);
$oExpediente->setComentario($_POST['comentarioExpediente']);

if(!$oMysqlExpediente->guardar($oExpediente)){
    $error ++;
}

if($error == 0){
    mysql_query("COMMIT;");
    ?>
    <h2 style="color: green">Los Datos Se Grabaron Correctamente!!!</h2>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <h1 style="color: red">Los Datos NO Se Grabaron!!!</h1>
    <?php
}