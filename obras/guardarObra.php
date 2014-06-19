<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
/**
 * Guarda los datos en la tabla de Obras Ejecutadas.
 */
$identificador = $_POST['identificador'];
$denominacion=$_POST['denominacion'];
$comitente=$_POST['comitente'];

//include_once '../clases/ValueObject/ObrasEjecutadasValueObject.php';
//include_once '../clases/ActiveRecord/MysqlObrasEjecutadasActiveRecord.php';
$oMysqlObras = new MysqlObrasEjecutadasActiveRecord();
$oObras = new ObrasEjecutadasValueObject();
$oObras->setID($identificador);
$oObras->setDenominacion($denominacion);
$oObras->setIdcomitente($comitente);

if($oMysqlObras->guardarNombre($oObras)){
    ?>
    <div class="form-group has-success">
        <div class="col-xs6">
            <!--<input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">-->
            <a href="../listaCertificado/" class="form-control" >Los Datos Se Grabaron Correctamente.</a>
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="form-group has-error">
        <div class="col-xs6">
            <input type="text" value="Los Datos No Han Sido Almacenados" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
}