<?php
include_once '../inicio/valido.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gesti&oacute;n de Usuarios</title>
        <link rel="shortcut icon" href="../images/ingreso.ico" />
        
        <?php include_once "../includes/php/estilos.php";?>
        <script type="text/javascript" src="js/validacion.js"></script>
    </head>
    <body>
        <header><?php include_once '../includes/php/header.php'; ?></header>
        <div class="container">
            <div id="cuerpo">
                <h1>Gesti&oacute;n de Usuarios</h1>
                <legend>MODIFICACIONES DE USUARIO</legend>
                <form id="two" name="formulario" autocomplete="off" method="post">
                    <?php
                    // Buscar los usuarios cargados en el sistema y generar un listado
                    // para poder seleccionar uno y poder de esta manera modificar
                    // todos los datos del usuario. Esto si es administrador.
                    // Si es un usuario normal del sistema, solo podra modificar su contraseña.
                    $oMysqlUsuario = $oMysql->getUsuarioActiveRecord();
                    $oUsuario = new UsuarioValueObject();
                    $oUsuario = $oMysqlUsuario->buscarTodo();
                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <td colspan="10" class="success">Listado de Usuarios</td>
                        </tr>
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                        <?php
                        foreach ($oUsuario as $usuario) {
                            ?>
                            <tr ondblclick="javascript:window.location.href='modificaUsuario.php?identificador=<?php echo $usuario->getIdentificador(); ?>';">
                                <td><?php echo $usuario->getDni(); ?></td>
                                <td><?php echo $usuario->getNombre(); ?></td>
                                <td><?php echo $usuario->getApellido(); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </form>
            </div>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
