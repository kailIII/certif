<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
/**
 * Guarda los datos en la tabla de Historia de los Certificados.
 * Tengo que hacer...
 */

/*
 * Guardo:
 * 1° El hisotrial de expediente.
 * 2° Si se necesita se actualiza el dato de "Cedido" de la tabla Expediente.
 */

$error = 0;
mysql_query('BEGIN;');
/* Busco el identificador de la dependencia. */
$oMysqlDependencia = $oMysql->getDependenciaActiveRecord();
$oDependencia = new DependenciaValueObject();
$oDependencia->setDependencia($_POST['dependencia']);
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
if($error == 0) {
    /* 1° Guardo Historico */
    $oMysqlExpHistoria = $oMysql->getExpHistotiaActiveRecord();
    $oExpHisotoria = new ExpHistoriaValueObject();
    $oExpHisotoria->setIdexpediente($_POST['idexpediente']);
    $oExpHisotoria->setFecha($_POST['fecha']);
    $oExpHisotoria->setComentario($_POST['comentario']);
    $oExpHisotoria->setDependencia($oDependencia->getIddependencia());

    if(!$oMysqlExpHistoria->guardar($oExpHisotoria)) {
        $error = 2;
    }
    /* Finalizacion de almacenamiento del historico. */
}
if($error == 0) {
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
    $oVialidad->setIdexpediente($_POST['idexpediente']);

    if(!$oMysqlVialidad->guardar($oVialidad)){
        $error = 3;
    }
}
/* Finalizacion de almacenamiento de vialidad. */
if($error == 0){
    mysql_query("COMMIT;");
    ?>
    <div class="form-group has-success">
        <div class="col-xs6">
            <a href="../listaCertificado/" class="form-control" >Los Datos Se Grabaron Correctamente</a>
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="form-group has-error">
        <div class="col-xs6">
            <?php if($error == 1) { ?>
            <!--<input type="text" value="Error al guardar la dependencia." class="form-control">-->
            <a href="../listaCertificado/" class="form-control" >Error al guardar la dependencia.</a>
            <?php
            } elseif($error == 2) { ?>
            <!--<input type="text" value="Error al actualizar los datos." class="form-control">-->
            <a href="../listaCertificado/" class="form-control" >Error al actualizar los datos.</a>
            <?php
            } else { ?>
            <!--<input type="text" value="Los Datos No Han Sido Almacenados" class="form-control">-->
            <a href="../listaCertificado/" class="form-control" >Los Datos No Han Sido Almacenados.</a>
            <?php } ?>
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
}