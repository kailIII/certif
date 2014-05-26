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
if($oMysqlDependencia->buscarDependencia($oDependencia)){
    $error = 1;
}

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
            <?php if($error == 1) { ?>
            <input type="text" value="Error al guardar la dependencia." class="form-control">
            <?php
            } elseif($error == 2) { ?>
            <input type="text" value="Error al actualizar los datos." class="form-control">
            <?php
            } else { ?>
            <input type="text" value="Los Datos No Han Sido Almacenados" class="form-control">
            <?php } ?>
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
}