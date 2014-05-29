<?php
include_once '../inicio/valido.php';
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
                <form id="two" name="formulario" autocomplete="off" method="post">
                    <div id="vista">
                        <fieldset>
                            <legend>INGRESO NUEVO USUARIO</legend>
                            <div>
                                <table id="nuevo" style="margin: 0 auto; width: 500px;">
                                    <tr>
                                        <td>DNI:</td>
                                        <td>
                                            <input type="text" name="dni" id="dni" class="form-control short small" 
                                                   maxlength="150" size="10" onFocus="this.style.color='blue'" onBlur="this.style.color='#333333'"
                                                   onKeyPress="return esInteger(event)"
                                                   value="">*
                                            <!--<input name="busco2" type="button"  class="button" value="&nbsp;&nbsp;Buscar&nbsp;&nbsp;" onClick="pedirDatos()">&nbsp;&nbsp;&nbsp;<div style="display: inline" id="cargando"></div>-->
                                            <div style="display: inline" id="valida_dni" class="falta_dato"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre:</td>
                                        <td>
                                            <input type="text" name="nombre" id="nombre" class="col-lg-10 form-control"
                                                   maxlength="50" size="30" 
                                                   onFocus="this.style.color='blue'" onBlur="this.style.color='#333333'" value="">
                                            <div id="nom" class="falta_dato" style="display:inline"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apellido:</td>
                                        <td>
                                            <input type="text" name="apellido" id="apellido" class="col-lg-10 form-control"
                                                   maxlength="50" size="30" onFocus="this.style.color='blue'"
                                                   onBlur="this.style.color='#333333'" <? //echo ($dni != 0) ? "":"readonly" ?> value="">
                                            <div id="ape" class="falta_dato" style="display:inline"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre usuario:</td>
                                        <td>
                                            <input type="text" name="usuarionombre" id="usuarionombre" class="col-lg-10 form-control"
                                                   maxlength="30" onFocus="this.style.color='blue'" 
                                                   onBlur="this.style.color='#333333'" <? //echo ($dni != 0) ? "":"readonly" ?>>
                                            <div id="iden" class="falta_dato" style="display:inline"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contraseña:</td>
                                        <td>
                                            <input type="password" name="password1" id="password1" class="col-lg-10 form-control"
                                                   maxlength="10" onFocus="this.style.color='blue'"
                                                   onBlur="this.style.color='#333333'" <? //echo ($dni != 0) ? "":"readonly" ?>>
                                            <div id="pass1" class="falta_dato" style="display:inline"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contraseña (repetir):</td>
                                        <td>
                                            <input type="password" name="password2" id="password2" class="col-lg-10 form-control"
                                                   maxlength="10" onFocus="this.style.color='blue'"
                                                   onBlur="this.style.color='#333333'" <? // echo ($dni != 0) ? "":"readonly" ?>>
                                            <div id="pass2" class="falta_dato" style="display:inline"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Perfil usuario:</td>
                                        <td>
                                            <select id="perfil" name="perfil" class="select-block">
                                               <option>Seleccione un nivel de usuario</option>
                                               <option value="Z">Z - Super Usuario</option>
                                               <option value="N">N - Usuario Normal</option>
                                            </select>
                                            <div id="divNiv" class="falta_dato" style="display:inline"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </fieldset>
                        <br />
                        <div align="center">
                            <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <input type="button" name="Submit" value="&nbsp;&nbsp;Registrar&nbsp;&nbsp;" onclick="nuevoUsuario()" class="btn btn-large btn-block btn-primary" />
                                </div>
                                <div class="col-lg-3">
                                    <input type="reset" value="&nbsp;&nbsp;Limpiar&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" />
                                </div>
                                <div id="falta_dato" class="falta_dato" style="display:inline"></div>
                            </div>
                        </div>
                        <div id="resultado"></div>
                    </div>
                </form>
            </div>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>