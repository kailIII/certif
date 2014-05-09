<?php
include_once '../inicio/valido.php';

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SGO - Obras</title>
        <script type="text/javascript" src="js/funciones.js"></script>
        <script type="text/javascript" src="js/ajax-dynamic-list.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <?php include_once "../includes/php/estilos.php";?>
    </head>
    <body>
        <?php include_once "../includes/php/header.php";?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Obras en Ejecuci&oacute;n y Ejecutadas</legend>
                <div class="form-group">
                    <label class="control-label">Identificaci&oacute;n</label><br />
                    <input class="form-control short small" name="identificador" id="identificador" size="10" onKeypress="return soloNumeros(event);" />
                </div>
                <div class="form-group">
                    <label class="control-label"> Denominaci&oacute;n </label><br />
                    <input type="text" class="col-lg-10 form-control" rows="2" maxlength="250" name="denominacion" id="denominacion" 
                              onkeyup="ajax_showOptionsUbicacion(this,'getDenominacionByLetters',event);" />
<!--                    <input type="text" rows="2" maxlength="250" name="denominacion" id="denominacion"
                              onkeyup="ajax_showOptionsUbicacion(this,'getDenominacionByLetters',event);" />-->
                    <input type="hidden" id="denominacion_hidden" name="denominacion_ID" value="" />
                </div>
                <div class="form-group">
                    <label class="control-label"> Ubicaci&oacute;n </label><br />
                    <textarea class="col-lg-10 form-control" rows="2" maxlength="250" name="ubicacion" id="ubicacion" > </textarea>
                </div>
                <div class="form-group">
                    <label class="control-label"> Comitente </label><br />
                    <textarea class="col-lg-10 form-control" rows="2" maxlength="250" name="comitente" id="comitente" > </textarea>
                </div>
                <div class="form-group">
                    <label class="control-label"> Tipo de Obra </label><br />
                    <textarea class="col-lg-10 form-control" rows="2" maxlength="250" name="tipoobra" id="tipoobra" > </textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Observaci&oacute;n </label><br />
                    <textarea class="col-lg-10 form-control" rows="2" maxlength="250" name="observacion" id="observacion" > </textarea>
                </div>
                <label class="control-label"><h4>Caracteristicas de obra</h4></label>
                <fieldset class="well">
                    <div class="col-lg-3">
                        <div>
                            <label>Longitud</label>
                            <input class="form-control short small" name="longitud" id="longitud" size="10" onKeypress="return soloNumeros(event);" />
                        </div>
                        <div>
                            <label>Terraplen</label>
                            <input class="form-control short small" name="terraplen" id="terraplen" size="10" onKeypress="return soloNumeros(event);" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div>
                            <label>Bases No Bituminosas</label>
                            <input class="form-control short small" name="basenobitu" id="basenobitu" size="10" onKeypress="return soloNumeros(event);" />
                        </div>
                        <div>
                            <label>Banquina/Ripio</label>
                            <input class="form-control short small" name="banquina" id="banquina" size="10" onKeypress="return soloNumeros(event);" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div>
                            <label>Tratamiento Triple</label>
                            <input class="form-control short small" name="tratatriple" id="tratatriple" size="10" onKeypress="return soloNumeros(event);" />
                        </div>
                        <div>
                            <label>Hormigon</label>
                            <input class="form-control short small" name="hormigon" id="hormigon" size="10" onKeypress="return soloNumeros(event);" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div>
                            <label>Recubrimiento</label>
                            <input class="form-control short small" name="recubrimiento" id="recubrimiento" size="10" onKeypress="return soloNumeros(event);" />
                        </div>
                        <div>
                            <label>Reforestaci&oacute;n</label>
                            <input class="form-control short small" name="reforestacion" id="reforestacion" size="10" onKeypress="return soloNumeros(event);" />
                        </div>
                    </div>
                </fieldset>
                <fieldset class="well">
                    <div class="col-lg-4">
                        <div>
                            <label>Fecha licitaci&oacute;n</label><br />
                            <input class="form-control short small" name="fechalic" id="fechalic" size="10" maxlength="10"
                                   onKeypress="return soloFecha(event);"
                                   onkeyup="return fechaControl(this.id, event);" placeholder="<?php echo date('d/m/Y'); ?>" />
<!--                                   onblur="return fechaInvertir(this.id);" />-->
                        </div>
                        <div>
                            <label>Monto Contractual Original</label><br />
                            <input class="form-control short small" name="montoco" id="montoco" size="10">
                        </div>

                        <div>
                            <label>Fecha Inicio</label><br />
                            <input class="form-control short small" name="fechainicio" id="fechainicio" size="10" maxlength="10"
                                   onKeypress="return soloFecha(event);"
                                   onkeyup="return fechaControl(this.id, event);" placeholder="<?php echo date('d/m/Y'); ?>" />
                        </div>
                        <div>
                            <label>Financiada</label><br />
                            <input class="form-control short small" name="financiada" id="financiada" size="10" />
                        </div>
                        <div>
                            <label>Fecha Terminaci&oacute;n Original</label><br />
                            <input class="form-control short small" name="fechato" id="fechato" size="10" maxlength="10"
                                   onKeypress="return soloFecha(event);"
                                   onkeyup="return fechaControl(this.id, event);" placeholder="<?php echo date('d/m/Y'); ?>" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label>Fecha Contrato</label><br />
                            <input class="form-control short small" name="fechacont" id="fechacont" size="10" maxlength="10"
                                   onKeypress="return soloFecha(event);"
                                   onkeyup="return fechaControl(this.id, event);" placeholder="<?php echo date('d/m/Y'); ?>" />
                        </div>
                        <div>
                            <label>Monto Contractual Final</label><br />
                            <input class="form-control short small" name="montocf" id="montocf" />
                        </div>
                        <div>
                            <label>Plazo Final</label><br />
                            <input class="form-control short small" name="plazocf" id="plazocf" size="10" maxlength="10"
                                   onKeypress="return soloFecha(event);"
                                   onkeyup="return fechaControl(this.id, event);" placeholder="<?php echo date('d/m/Y'); ?>" />
                        </div>
                        <div>
                            <label>Participaci&oacute;n</label><br />
                            <input class="form-control short small" name="participacion" id="participacion" size="10"> %
                        </div>
                        <div>
                            <label>Fecha Terminaci&oacute;n Final</label><br />
                            <input class="form-control short small" name="fechatf" id="fechatf" size="10" maxlength="10"
                                   onKeypress="return soloFecha(event);"
                                   onkeyup="return fechaControl(this.id, event);" placeholder="<?php echo date('d/m/Y'); ?>" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label>Replanteo</label><br />
                            <input class="form-control short small" name="replanteo" id="replanteo" size="10" maxlength="10"
                                   onKeypress="return soloFecha(event);"
                                   onkeyup="return fechaControl(this.id, event);" placeholder="<?php echo date('d/m/Y'); ?>" />
                        </div>
                        <div>
                            <label>Personeria</label><br />
                            <input class="form-control short small" name="personeria" id="personeria" size="10">
                        </div>
                        <div>
                            <label>UTE</label><br />
                            <input class="form-control short small" name="ute" id="ute" size="10">
                        </div>
                    </div>
                    <div class="form-group col-lg-11">
                        <label class="control-label"> Comentarios </label>
                        <textarea class="form-control" rows="4" maxlength="250" name="comentarios" id="comentarios" > </textarea>
                    </div>
                </fieldset>
                <fieldset class="well">
                    <div class="custom-input-file btn btn-lg btn-primary">
                        <input type="file" class="input-file" id="archivo"/>
                        Cargar KML
                        <div class="archivo">...</div>
                    </div>
                </fieldset>
                <div class="span3">
                    <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos();" />
                    <!--<input name="guardar" type="submit" value="Guardar" class="btn btn-large btn-block btn-primary">-->
                </div>
            </form>
            <div id="mensaje" style="color:brown; "></div>
            <div id="resultado"></div>
            <div id="div_listar"></div>
            <!--<div id="div_oculto" style="display: none;"></div>-->
            <div id="div_oculto" ></div>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
