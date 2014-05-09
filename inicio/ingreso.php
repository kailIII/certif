<?php
session_name('sgo');
session_start();

if( $_POST["aceptar"] === "Ingreso" ){
    require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
    $oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
    $oMysql->conectar();

    $oMyUsuario = $oMysql->getUsuarioActiveRecord();
    $oUsuario = new UsuarioValueObject();
    $oUsuario->setIdentificador($_POST['usu']);
    $oUsuario->setClave($_POST['pass']);
    $oUsuario = $oMyUsuario->loguearse($oUsuario);
    if($oUsuario){
        
        $_SESSION['usuario'] = $oUsuario->getIdentificador();
        $_SESSION['nombre'] =  $oUsuario->getNombre();
        $_SESSION['apellido'] = $oUsuario->getApellido();
        $_SESSION['perfil'] = $oUsuario->getPerfil();
        $_SESSION['login']="Ok";
        
        header("location: inicio.php");
    } else {
        $_SESSION['usuario'] = "Desconocido";
        $_SESSION['nombre'] =  "Desconocido";
        $_SESSION['apellido'] = "Desconocido";
        $_SESSION['perfil'] = 0;
        $_SESSION['login']="Acceso Incorrecto";
        header("location: index.php");
    }
} else {
    $_SESSION['usuario'] = "Desconocido";
    $_SESSION['nombre'] =  "Desconocido";
    $_SESSION['apellido'] = "Desconocido";
    $_SESSION['perfil'] = 0;
    $_SESSION['login']="Acceso Incorrecto";
    header("location: index.php");
}
?>
