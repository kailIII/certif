<?php
//UPDATE dependencia SET orden = orden + 1
//  WHERE orden >= 2
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
include_once '../inicio/valido.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Expediente - Certificados</title>
        <?php include_once "../includes/php/estilos.php"; ?>
        <script type="text/javascript" src="js/funciones.js"></script>
        <script type="text/javascript" src="js/ajax-dynamic-list.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
    </head>
    <body>
        <?php
        include_once "../includes/php/header.php";
        $oMysqlDependencia = $oMysql->getDependenciaActiveRecord();
//        $oDependencia = new DependenciaValueObject();
        $orden = $oMysqlDependencia->buscarOrden();
        ?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Dependencias</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        <label class="label-success label">Descripci&oacute;n de la dependencia</label><br />
                        <input class="form-control" data-toggle="tooltip" name="dependencia" id="dependencia" title="Descripci&oacute;n de la dependencia" alt="Descripci&oacute;n de la dependencia" placeholder="Descripci&oacute;n de la dependencia" type="text"
                               onkeyup="ajax_showOptionsDependencia(this,'getListadoByLetters',event);" /><br/>
                        <input type="hidden" id="dependencia_hidden" name="dependencia_ID" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="label-success label">D&iacute;as duraci&oacute;n</label><br />
                        <input class="form-control" data-toggle="tooltip" name="duracion" id="duracion" title="Duraci&oacute;n dentro de la oficina" alt="Duraci&oacute;n dentro de la oficina" type="number" min="0" value="7" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Orden</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?=$orden;?>" value="<?=$orden;?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-5"></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <input type="button" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                    </div>
                    <div class="col-lg-9" id="divResultado"></div>
                </div>
            </form>
            <table class="table table-striped table-bordered table-hover">
            <tr>
                <td colspan="10" class="success">Listado de Dependencias</td>
            </tr>
            <tr>
                <th>Dependencia</th>
                <th>D&iacute;as</th>
                <th>Orden</th>
            </tr>
            <?php
            $oDependencia = $oMysqlDependencia->buscarTodo();
            foreach ($oDependencia as $aDependencia) {
                ?>
            <tr ondblclick="modifica(<?php
                    echo $aDependencia->getIddependencia() . ', \''
                    . utf8_decode($aDependencia->getDependencia()) . '\', '
                    . $aDependencia->getDias() . ', '
                    . $aDependencia->getOrden();?>)">
                <?php
                echo "<td>" . utf8_decode($aDependencia->getDependencia()) . "</td>";
                echo "<td>" . utf8_decode($aDependencia->getDias()) . "</td>";
                echo "<td>" . utf8_decode($aDependencia->getOrden()) . "</td>";
                ?>
                </tr>
                <?php
            }
            ?>
            </table>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>