<?php 
// Se requieren los script para acceder a los datos de la DB
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();  

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gesti&oacute;n de Usuarios</title>
        <link rel="shortcut icon" href="../images/ingreso.ico" />
        <link rel="stylesheet" href="../css/plantilla.css" type="text/css"  media="screen" />
        <?php include_once "../includes/php/estilos.php";?>
        <script type="text/javascript" src="js/validacion.js"></script>
    </head>
    <body>
        <header><?php include_once '../includes/php/header.php'; ?></header>
        <div class="container">
            <div id="cuerpo">
                <h1>Gesti&oacute;n de Usuarios</h1>
                <br />
                <fieldset>
                    <legend>LISTADO DE USUARIOS</legend>
                    <div>
                        <table id="listado" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>DNI:</th>
                                <th>Nombre:</th>
                                <td>Apellido:</td>
                                <td>Nombre usuario:</td>
                                <td>Perfil usuario:</td>
                                <td></td>
                            </tr>
                            <?php
                            $oMyUsuario = $oMysql->getUsuarioActiveRecord();
                            $oUsuario = new UsuarioValueObject();
                            $oUsuario = $oMyUsuario->buscarTodo();
                            foreach ($oUsuario as $llave => $valor) {
                                ?>
                                <tr>
                                    <td><?php echo $valor->getDni(); ?></td>
                                    <td><?php echo $valor->getNombre(); ?></td>
                                    <td><?php echo $valor->getApellido(); ?></td>
                                    <td><?php echo $valor->getIdentificador(); ?></td>
                                    <td><?php echo $valor->getPerfil(); ?></td>
                                    <td><img src="../images/todo/search.png"></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <br />
                        <div align="center">
                        <input type="button" class="button" name="Submit" value="&nbsp;&nbsp;Registrar&nbsp;&nbsp;" onclick="nuevoUsuario()">
                        <input type="reset" class="button" value="&nbsp;&nbsp;Limpiar&nbsp;&nbsp;">
                        <div id="falta_dato" class="falta_dato" style="display:inline"></div>
                    </div>
                    <div id="resultado"></div>
                </form>
            </div>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>