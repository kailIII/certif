<?php
/*
 * Falta la validacion del usuario.
 */
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
require_once '../clases/ActiveRecord/MysqlUsuarioActiveRecord.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuarionombre = $_POST['usuarionombre'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$perfil = $_POST['perfil'];

$oMyUsuario = $oMysql->getUsuarioActiveRecord();
$oUsuario = new UsuarioValueObject();

$oUsuario->setDni($dni);
$oUsuario->setNombre($nombre);
$oUsuario->setApellido($apellido);
$oUsuario->setIdentificador($usuarionombre);
$oUsuario->setClave($password1);
$oUsuario->setPerfil($perfil);

if($password1 == $password2){
    if($oMyUsuario->guardar($oUsuario)){
//        echo "<center><div class=exito><b>Los datos se actualizaron con exito</b></div></center>";
        ?>
        <div id="flotante" class="alert alert-dismissable alert-success"><b>Los datos se guardaron exitosamente.</b><a class="close" onclick="cerrar('flotante');">X</a></div>
        <?php
//        echo '<meta http-equiv="refresh" content="2; url=index.php">';
        return true;
    } else {
        ?>
        <div id="flotante" class="alert alert-dismissable alert-danger"><b>Ha ocurrido un error intentando guardar los datos</b><a class="close" onclick="cerrar('flotante');">X</a></div>
        <?php
        return false;
    }
} else {
    ?>
    <div id="flotante" class="alert alert-dismissable alert-danger"><b>Ha ocurrido un error intentando guardar los datos</b><a class="close" onclick="cerrar('flotante');">X</a></div>
    <?php
    return false;
}
?>
