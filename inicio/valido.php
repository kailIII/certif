<?php
session_name('sgo');
session_start();
if($_SESSION['login'] !== "Ok"){
    $_SESSION['usuario'] = "Desconocido";
    $_SESSION['nombre'] =  "Desconocido";
    $_SESSION['apellido'] = "Desconocido";
    $_SESSION['perfil'] = 0;
    $_SESSION['login']="Acceso Incorrecto";
    header("location: ../inicio/index.php");
}
?>