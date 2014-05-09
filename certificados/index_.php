<?php
//require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
//$oMysql->conectar();
include_once '../inicio/valido.php';
include_once 'simple_html_dom.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SGO - Certificados</title>
        <?php include_once "../includes/php/estilos.php"; ?>
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body>
        <?php include_once "../includes/php/header.php";?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Certificados de obra</legend>
                <div class="form-group col-lg-12">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label"><!--Id de-->Nombre obra</label><br />
                             <?php
//                            if(isset($_POST['identifica'])){
                                ?>
<!--                            <input class="form-control short small" name="identificador" id="identificador"
                                   value="<?php // echo $_POST['identifica']; ?>" size="10">-->
                                <?php
//                            } else {
                            ?>
                            <!--<input class="form-control short small" name="identificador" id="identificador" value="" size="10">-->
                            <input class="form-control" name="nombreobra" id="nombreobra" />
                            <?php
//                            }
                            ?>
<!--                            <input class="form-control short small" name="identificador" id="identificador" size="10">   -->
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <div class="col-lg-4">
                        <button class="btn" type="button" name="muestraCertificado" id="muestraCertificado" onclick="verOcultarCertificado()" value="Ver Certificado">Ver Certificado</button>
                    </div>
                </div>
                <div id="certificados" style="display: none;">
                    <div class="form-group col-lg-12">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">Tipo de obra</label><br />    
                                <select name="tipocertf" id="tipocertf" class="select-block" value="Comun">
                                      <option value="1">Comun</option>
                                      <option value="2">Provisorio</option>
                                      <option value="3">Definitivo</option>
                                      <option value="4">DYC</option>
                                      <option value="5">Bis</option>
                                </select>                      
                            </div> 
                        </div>                    
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label class="col-lg-5">Certif. Nro.</label>
                            <input class="form-control short small" name="nrocert" id="nrocert" size="10">
                        </div>                   
                        <div>
                            <label class="col-lg-5">Periodo</label>
                            <input class="form-control short small" name="periodo" id="periodo" size="10">
                        </div>
                        <div >
                            <label class="col-lg-5">Fecha de firma</label>
                            <input class="form-control short small" name="fechafirma" id="fechafirma" size="10">
                        </div>
                        <div>
                            <label class="col-lg-5">Participacion</label>
                            <input class="form-control short small" name="participacion" id="participacion" size="10">%
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label class="col-lg-5">Importe basico</label>
                            <input class="form-control short small" name="importeb" id="importeb" size="10">
                        </div>
                        <div >
                            <label class="col-lg-5">Importe redeterminado</label>
                            <input class="form-control short small" name="importer" id="importer" size="10">
                        </div>
                        <div>
                            <label class="col-lg-5">Fondo de emparo</label>
                            <input class="form-control short small" name="fondoamp" id="fondoamp" size="10">
                        </div>
                        <div>
                            <label class="col-lg-5">Anticipo financiero / Garantia</label>
                            <input class="form-control short small" name="anticipo" id="anticipo" size="10">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label class="col-lg-5">Otros</label>
                            <input class="form-control short small" name="otros" id="otros" size="10">
                        </div>
                        <div >
                            <label class="col-lg-5">A cobrar</label>
                            <input class="form-control short small" name="acobrar" id="acobrar" size="10">
                        </div>
        <!--                    <div class="custom-input-file">
                                <div class="btn btn-lg btn-primary"><input type="file" class="input-file"/>Cargar imagen</div>
                            </div>-->
                        <div class="custom-input-file btn btn-lg btn-primary">
                            <input type="file" class="input-file" id="archivo" />
                            Cargar imagen
                            <div class="archivo">...</div>
                        </div>
                    </div>
                    <div class="form-group col-lg-11">
                        <label class="control-label">Comentarios</label><br />
                        <textarea class="col-lg-9 form-control" rows="2" maxlength="250" name="comentarios" id="comentarios" > </textarea>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <label class="col-lg-5">Certificado DPV</label>
                    <input class="form-control short small" name="nrocert" id="nrocert" size="10" />
                </div>
                <div class="col-lg-5">
                    <label class="col-lg-5">Certificado DNV</label>
                    <input class="form-control short small" name="periodoExpediente" id="periodoExpediente" size="10" />
                </div>
                <div class="col-lg-5">
                    <label class="col-lg-5">Expediente DPV</label>
                    <input class="form-control short small" name="fechafirma" id="fechafirma" size="10" />
                </div>
                <div class="col-lg-5">
                    <label class="col-lg-5">Expediente DNV</label>
                    <input class="form-control short small" name="participacion" id="participacion" size="10" placeholder="0000000/<?=date('Y')?>" onblur="busquedaExpediente();" />
                </div>
                
                <div class="col-lg-5">
                    <label class="col-lg-5">mes</label>
                    <input class="form-control short small" name="importeb" id="importeb" size="10" />
                </div>
                <div class="col-lg-5">
                    <label class="col-lg-5">Dependencia</label>
                    <input class="form-control short small" name="importer" id="importer" size="10" />
                </div>
                <div class="col-lg-5">
                    <label class="col-xs-5">Comentario</label>
                    <input class="form-control short small" name="fondoamp" id="fondoamp" size="10" />
                </div>
                <div class="col-lg-5">
                    <label class="col-lg-5">Importe</label>
                    <input class="form-control short small" name="anticipo" id="anticipo" size="10" />
                </div>
                <div class="col-lg-5">
                    <label class="col-lg-5">Vencimiento</label>
                    <input class="form-control short small" name="otros" id="otros" size="10" />
                </div>
                <div class="col-lg-5">
                    <label class="col-lg-5">Cedido</label>
                    <input class="form-control short small" name="acobrar" id="acobrar" size="10" />
                </div>

                <div class="span3">
                    <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                    <!--<input name="guardar" type="submit" value="Guardar" class="btn btn-large btn-block btn-primary">-->
                </div>
            </form>
         </div>
        <div id="divResultado"></div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>