<?php
error_reporting(E_ALL);
include_once('../certificados/simple_html_dom.php');
include_once('../inicio/valido.php');

$request = array(
    'http' => array(
        'method' => 'POST',
        'content' => http_build_query(array(
            'expte' => $_POST['expediente'],
            'ano' => $_POST['ano']
        )),
    )
);
$context = stream_context_create($request);

$expediente = file_get_html('http://www.vialidad.gov.ar/mesa_entrada/mesa_entrada.php', false, $context)->plaintext;

$identificador = strpos($expediente, 'Identificador: '); /*15*/
$tipoTramite = strpos($expediente, 'Tipo de tramite: '); /*17*/
$tema = strpos($expediente, 'Tema: ');/*6*/
$fechaAlta = strpos($expediente, 'Fecha de alta: ');/*15*/
$extracto = strpos($expediente, 'Extracto: ');/*10*/
$estado = strpos($expediente, 'Estado: ');/*8*/
$organismoA = strpos($expediente, 'Organismo Externo Actual: ');/*26*/
$dependenciaA = strpos($expediente, 'Dependencia Actual : ');/*21*/
$organismoD = strpos($expediente, 'Organismo Externo Destino : ');/*28*/
$dependenciaD = strpos($expediente, 'Dependencia Destino: ');/*21*/
$conformado = strpos($expediente, 'Conformado: ');/*12*/
if(trim(substr($expediente, $extracto+10, $estado-$extracto-10)) === "ECCION NACIONAL DE VIALIDAD                	  	  	         	  Consulta           por Expediente") {

    echo "tincho 1";
    
} else {
    echo "tincho 2";
    require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
    $oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
    $oMysql->conectar();

    $oMysqlVialidad = $oMysql->getVialidadActiveRecord();
    $oVialidad = new VialidadValueObject();

    /* Cargo los datos en la clase de vialidad. */
    $oVialidad->setIdentificador(trim(substr($expediente, $identificador+15, $tipoTramite-$identificador-15)));
    $oVialidad->setTipotramite(trim(substr($expediente, $tipoTramite+17, $tema-$tipoTramite-17)));
    $oVialidad->setTema(trim(substr($expediente, $tema+6, $fechaAlta-$tema-6)));
    $oVialidad->setFechaalta(trim(substr($expediente, $fechaAlta+15, $extracto-$fechaAlta-15)));
    $oVialidad->setExtracto(trim(substr($expediente, $extracto+10, $estado-$extracto-10)));
    $oVialidad->setEstado(trim(substr($expediente, $estado+8, $organismoA-$estado-8)));
    $oVialidad->setOrganismoa(trim(substr($expediente, $organismoA+26, $dependenciaA-$organismoA-26)));
    $oVialidad->setDependenciaa(trim(substr($expediente, $dependenciaA+21, $organismoD-$dependenciaA-21)));
    $oVialidad->setOrganismod(trim(substr($expediente, $organismoD+28, $dependenciaD-$organismoD-28)));
    $oVialidad->setDependenciad(trim(substr($expediente, $dependenciaD+21, $conformado-$dependenciaD-21)));
    $oVialidad->setConformado(trim(substr($expediente, $conformado+12)));

    /* Antes de almacenar los datos en la tabla vialidad, busco en la tabla expediete 
     * el numero de expediente correspondiente. */
    $oMysqlExpediente = $oMysql->getExpedienteActiveRecord();
    $oExpediente = new ExpedienteValueObject();
    $oExpediente->setExpDnv($_POST['expediente']);
    $oExpediente = $oMysqlExpediente->buscarPorExpDnv($oExpediente);
    var_dump($oExpediente);
    $oVialidad->setIdexpediente($oExpediente->getIdexpediente());
    $oMysqlVialidad->guardar($oVialidad);
    
    /* Busco el identificador de la dependencia. */
    $oMysqlDependencia = $oMysql->getDependenciaActiveRecord();
    $oDependencia = new DependenciaValueObject();
    $oDependencia->setDependencia($oVialidad->getDependenciaa());
    //$oDependencia = $oMysqlDependencia->buscarDependencia($oDependencia);

    if(!$oMysqlDependencia->buscarDependencia($oDependencia)){
        if(!$oMysqlDependencia->guardar($oDependencia)){
            $error = 1;
        } else {
            if(!$oMysqlDependencia->buscarDependencia($oDependencia)){
                $error = 1;
            }
        }
    }

    /* Almaceno los datos en la tabla de exphistoria. */
    $oMysqlExpHistoria = $oMysql->getExpHistotiaActiveRecord();
    $oExpHistoria = new ExpHistoriaValueObject();
    $oExpHistoria->setIdexpediente($oExpediente->getIdexpediente());
    $oExpHistoria->setFecha(date('Y-m-d'));
    $oExpHistoria->setDependencia($oDependencia->getIddependencia());
    $oExpHistoria->setComentario('Actualización automática');
    
    if(!$oMysqlExpHistoria->guardar($oExpHistoria)) {
        $error = 2;
    }
    
    $oMysqlActualizaciones = $oMysql->getActualizacionesActiveRecord();
    $oActualizacones = new ActualizacionesValueObject($_SESSION['usuario']);
    $oMysqlActualizaciones->guardar($oActualizacones);
    echo $_SESSION['usuario'];
    
    /* Finalizacion de almacenamiento del historico. */
}