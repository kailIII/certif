<?php
session_name('sgo');
session_start();
$_SESSION['usuario'] = "Desconocido";
$_SESSION['nombre'] =  "Desconocido";
$_SESSION['apellido'] = "Desconocido";
$_SESSION['perfil'] = 0;
$_SESSION['login']="Acceso Incorrecto";
session_destroy();
header("location: index.php");
?>
