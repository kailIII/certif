<?php
/**
 * Archivo principal de la aplicacion para guardar los datos
 *
 * @copyright  Copyright (c) 2013 INFORMATICA MINISTERIO DE SALUD
 * @version    1.0
 * @since      File available since Release 1.0
 *
*/
// Se chequea si existe un login
require_once '../usuarios/aut_verifica.inc.php';

// Se requieren los script para acceder a los datos de la DB
require_once '../ClasesBasicas/ActiveRecordAbstractFactory.php';
require_once '../Clases/ActiveRecord/MysqlBloqueoActiveRecord.php';
require_once '../Clases/ActiveRecord/MysqlCategoriaActiveRecord.php';
require_once '../Clases/ActiveRecord/MysqlEspecialidadesActiveRecord.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Administracion de Usuarios</title>
    <link rel="shortcut icon" href="../images/ingreso.ico" />
    <link rel="stylesheet" href="../css/plantilla.css" type="text/css"  media="screen" />
    <link rel="stylesheet" href="../css/estilos.css" type="text/css" />
    <script type="text/javascript" src="js/validacion.js"></script>
</head>
<body id="nav3" onload="formulario.oficina.focus()">
<div class="contenedor">
    <header><?php include_once 'Encabezado.php'; ?></header>
    <div id="cuerpo" >
    <h1>Administraci&oacute;n de Usuarios</h1>                        
    <ul id="navegacion">
        <li class="nav1"><a href="aut_nuevo_usuario.php">Nuevo Usuario</a></li>
        <li class="nav2"><a href="aut_lista_usuarios.php">Listado de Usuarios</a></li>  
        <li class="nav3"><a href="aut_modifica_usuario.php">Actualización de Usuarios</a></li>
        <li class="nav4"><a href="aut_modifica_clave.php">Cambio de Clave</a></li>
    </ul>
    <br/>
    <?php
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$error=0;

$oMysqlEspec = $oMysql->getEspecialidadesActiveRecord();
$aEspec = $oMysqlEspec->findAll();

$oCategoria = new CategoriaValueObject();
$oCategoria->setIdUsuario($_POST['ident']);
$oCategoria->setUsuarioAlta($_SESSION['usuario_id']);
$oMysqlCatego = $oMysql->getCategoriaActiveRecord();
$ident=$_POST['ident'];
$oBloqueo = new BloqueoValueObject();
$oBloqueo->setIdUsuario($_POST['ident']);
$oBloqueo->setUsuarioAlta($_SESSION['usuario_id']);
$oMysqlBloqueo = $oMysql->getBloqueoActiveRecord();

if($aEspec<>false)    {    
    mysql_query("begin;");
    foreach ($aEspec as $value) { 
        $oCategoria->setUsuarioBaja($_SESSION['usuario_id']);
        if(!isset($_POST[$value->getId()])) {
            $oCategoria->setIdEspecialidad($value->getId());
            if($oMysqlCatego->find($oCategoria)<>false){
                if($oMysqlCatego->update($oCategoria)==false) $error=2;
            }
        }
        if(isset($_POST[$value->getId()])) {                   
            $oCategoria->setIdEspecialidad($_POST[$value->getId()]);
            if($oMysqlCatego->find($oCategoria)==false){
                if($oMysqlCatego->insert($oCategoria)==false) $error=1;         
            }
        }      
    }
    
    $aBloqueo = $oMysqlBloqueo->find($oBloqueo);    
    if($aBloqueo <> false) {
        $oBloqueo->setUsuarioBaja($_SESSION['usuario_id']);
        foreach ($aBloqueo as $bloqueados) {
            $nombre = "z".$bloqueados->getOfcodi();
            if(!isset($_POST[$nombre])) {               
                $oBloqueo->setOfcodi($bloqueados->getOfcodi());
                $oMysqlBloqueo->update($oBloqueo);
            }

        }
    }

    if($_POST['oficina_ID']) {
        $oBloqueo->setOfcodi($_POST['oficina_ID']);
        if($oMysqlBloqueo->find($oBloqueo)==false) {
            if($oMysqlBloqueo->insert($oBloqueo)==false) $error=4;
        }
    }
    
    if($error == 0){
        mysql_query("COMMIT;");
        ?>
        <center>
                <div id='flotante'>
                <div class='exitoConfirma'>
                   Datos guardados correctamente                    
                    <br/>
                    <div align='right'>
                        <a href="aut_especialidades.php?ident=<?php echo $ident?>" class='buttonError'>Aceptar</a>
                    </div>
                </div>
            </div>
        </center>
        <?php
    } else {echo $error;
        mysql_query("ROLLBACK;");
        ?>
        <center>
            <div id='flotante'>
                <div class='errorConfirma'>
                    Ha ocurrido un error en la inserci&oacute;n de la nueva OT
                    <br/>
                    Por favor intente nuevamente
                    <div align='right'>
                    <a href="index.php" class='buttonError'>Aceptar</a>
                    </div>
                </div>
            </div>
        </center>
        <?php        
    }    

    
    
}
    
?>
</div>
<footer><?php include_once '../ClasesBasicas/Pie.php'; ?></footer>
</div>
   </body>
</html>