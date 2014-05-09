<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
/**
 * Guarda los datos en la tabla de Obras Ejecutadas.
 */
$identificador = $_POST['identificador'];
$denominacion=$_POST['denominacion'];
//$ubicacion=$_POST['ubicacion'];
$comitente=$_POST['comitente'];
$tipoobra=$_POST['tipoobra'];
$observacion=$_POST['observacion'];
$longitud=$_POST['longitud'];
$terraplen=$_POST['terraplen'];
$basenobitu=$_POST['basenobitu'];
$banquina=$_POST['banquina'];
$tratatriple=$_POST['tratatriple'];
$hormigon=$_POST['hormigon'];
$recubrimiento=$_POST['recubrimiento'];
$reforestacion=$_POST['reforestacion'];

include_once '../clases/ValueObject/ObrasEjecutadasValueObject.php';
include_once '../clases/ActiveRecord/MysqlObrasEjecutadasActiveRecord.php';
$oMysqlObras = new MysqlObrasEjecutadasActiveRecord();
$oObras = new ObrasEjecutadasValueObject();
$oObras->setID($identificador);
$oObras->setDenominacion($denominacion);
$oObras->setIdcomitente($comitente);
$oObras->setTipoDeObra($tipoobra);
$oObras->setObservacion($observacion);
$oObras->setLongitud($longitud);
$oObras->setTerraplenes($terraplen);
$oObras->setBaseNoButuminosa($basenobitu);
$oObras->setBanquinaRipio($banquina);
$oObras->setTratamientoTriple($tratatriple);
$oObras->setHormigones($hormigon);
$oObras->setRecubrimiento($recubrimiento);
$oObras->setReforestacion($reforestacion);

$oObras->setFechaLicitacion($_POST['fechalic']);
$oObras->setFechaInicio($_POST['fechainicio']);
$oObras->setMontoContractualOriginal($_POST['montoco']);
$oObras->setFechaReplanteo($_POST['replanteo']);
$oObras->setFinanciada($_POST['financiada']);
$oObras->setFechaTerminacionOriginal($_POST['fechato']);
$oObras->setFechaContrato($_POST['fechacont']);
$oObras->setMontoContractualFinal($_POST['montocf']);
$oObras->setParticipacion($_POST['participacion']);
$oObras->setFechaTerminacionFinal($_POST['fechatf']);
$oObras->setPlazoFinal($_POST['plazocf']);
$oObras->setIdPersoneria($_POST['personeria']);
$oObras->setComentario($_POST['comentarios']);
$oObras->setFechaRD('2013-11-11');
$oObras->setFechaRP('2013-11-11');
$oObras->setUte($_POST['ute']);
$oObras->setKml($_POST['kml']);

if($oMysqlObras->guardar($oObras)){
    ?>
    <h2 style="color: green">Los Datos Se Grabaron Correctamente!!!</h2>
    <?php
} else {
    ?>
    <h1 style="color: red">Los Datos NO Se Grabaron!!!</h1>
    <?php
}
?>
