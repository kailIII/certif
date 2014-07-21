<?php
include_once '../inicio/valido.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlDependencia = $oMysql->getDependenciaActiveRecord();
$oDependencia = new DependenciaValueObject();
$oDependencia->setDependencia($_POST['dependencia']);
$oDependencia->setDias($_POST['duracion']);
$oDependencia->setOrden($_POST['orden']);

mysql_query("BEGIN;");
if($_POST['guardar'] == 'Modificar'){
    $oDependencia->setIddependencia($_POST['iddependencia']);
    if($oMysqlDependencia->actualizar($oDependencia)){
        $error = 0;
    } else {
        $error = 2;
    }
} else {
    if($oMysqlDependencia->guardar($oDependencia)){
        $error = 0;
    } else {
        $error = 1;
    }
}
?><input type="hidden" id="resultado" name="resultado" value="<?php echo $error; ?>" /><?php
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
} elseif($error == 1) {
    mysql_query("ROLLBACK;");
    ?>
    <div class="form-group has-error">
        <div class="col-xs6">
            <input type="text" value="Los Datos No Han Sido Almacenados" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="form-group has-error">
        <div class="col-xs6">
            <input type="text" value="Los Datos No Han Sido Actualizados" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
}