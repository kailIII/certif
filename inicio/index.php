<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Luis Losi SA</title>
        <?php include_once "../includes/php/estilos.php";?>
    </head>
    <body id="login">
        <?php // include_once "../includes/php/header_login.php"; ?>
        <div class="container">
            <div class="login">
                <div class="login-screen">
                    <div class="login-icon">
                        <img src="../images/icons/png/Book.png" alt="Sistema de Control de Obras" />
                        <h4>Bienvenido a <small>SGO</small></h4>
                    </div>
                    <div class="login-form">
                        <form id="formulario_ingreso" name="formulario_ingreso" method="post" action="ingreso.php" autocomplete="off">
                            <input type='hidden' name='token' value="<?php  echo $token ?>" />
                            <div class="form-group">
                                <input type="text" class="form-control login-field" value="" placeholder="Ingrese su nombre" id="login-name" name="usu" id="usu" />
                                <label class="login-field-icon fui-user" for="login-name"></label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control login-field" value="" placeholder="Contrase&ntilde;a" id="login-pass" name="pass" id="pass" />
                                <label class="login-field-icon fui-lock" for="login-pass"></label>
                            </div>
                            <input type="submit" value="Ingreso" name="aceptar" id="aceptar" class="btn btn-primary btn-lg btn-block" />
                            <a class="login-link" href="#">Perdio su contrase&ntilde;a?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php // include_once $_SERVER['DOCUMENT_ROOT']."/sgo/includes/php/footer.php";?>
        <?php include_once "../includes/php/footer.php";?>
        <?php // include_once $_SERVER['DOCUMENT_ROOT']."/sgo/includes/php/flatui_js.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
