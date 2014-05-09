<?php
//require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
//$oMysql->conectar();
include_once '../inicio/valido.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Expediente - Certificados</title>
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
<!--                            <input class="form-control" name="identificador" id="identificador"
                                   value="<?php // echo $_POST['identifica']; ?>">-->
                                <?php
//                            } else {
                            ?>
                            <!--<input class="form-control" name="identificador" id="identificador" value="">-->
                            <input class="form-control" name="nombreobra" id="nombreobra" />
                            <?php
//                            }
                            ?>
<!--                            <input class="form-control" name="identificador" id="identificador">   -->
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <div class="col-lg-4">
                        <button class="btn" type="button" name="muestraCertificado" id="muestraCertificado" onclick="verOcultarCertificado()" value="Ver Certificado">Ver Certificado</button>
                    </div><br/>
                </div>
                <div id="certificados" style="display: none;">
                    <div class="well">
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
                                <input class="form-control" name="nrocert" id="nrocert" placeholder="Certif. Nro."><br/>
                            </div>                   
                            <div>
                                <input class="form-control" name="periodo" id="periodo" placeholder="Periodo"><br/>
                            </div>
                            <div >
                                <input class="form-control" name="fechafirma" id="fechafirma" placeholder="Fecha de firma"><br/>
                            </div>
                            <div>
                                <input class="form-control" name="participacion" id="participacion" placeholder="Participacion (%)"><br/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <input class="form-control" name="importeb" id="importeb" placeholder="Importe basico"><br/>
                            </div>
                            <div >
                                <input class="form-control" name="importer" id="importer" placeholder="Importe redeterminado"><br/>
                            </div>
                            <div>
                                <input class="form-control" name="fondoamp" id="fondoamp" placeholder="Fondo de emparo"><br/>
                            </div>
                            <div>
                                <input class="form-control" name="anticipo" id="anticipo" placeholder="Anticipo financiero / Garantia"><br/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <input class="form-control" name="otros" id="otros" placeholder="Otros"><br/>
                            </div>
                            <div >
                                <input class="form-control" name="acobrar" id="acobrar" placeholder="A cobrar"><br/>
                            </div>
                            <div class="custom-input-file btn btn-lg btn-primary">
                                <input type="file" class="input-file" id="archivo" />
                                Cargar imagen
                                <div class="archivo">...</div>
                            </div>
                        </div>
                        <input class="form-control" name="cometarioscert" id="cometarioscert" placeholder="Comentario sobre el certificado">
                    </div>    
                </div>
                
                <div class="col-lg-4">
                    <input class="form-control" name="dpvCertificado" id="dpvCertificado" placeholder="Certificado DPV" ><br/>
                    <input class="form-control" name="dnvCertificado" id="dnvCertificado" placeholder="Certificado DNV"><br/>
                    <input class="form-control" name="dpvExpediente" id="dpvExpediente" placeholder="Expediente DPV"><br/>
                </div>
                <div class="col-lg-4">
                    <input class="form-control" name="dnvExpediente" id="dnvExpediente" placeholder="Expediente DNV" onblur="busquedaExpediente();"><br/>
                    <input class="form-control" name="mesExpediente" id="mesExpediente" placeholder="Mes"><br/>
                    <input class="form-control" name="dependenciaExpediente" id="dependenciaExpediente" placeholder="Dependencia"><br/>
                </div>
                <div class="col-lg-4">
                    <input class="form-control" name="importeExpediente" id="importeExpediente" placeholder="Importe"><br/>
                    <input class="form-control" name="vencimientoExpediente" id="vencimientoExpediente" placeholder="Vencimiento"><br/>
                    <input class="form-control" name="cedidoExpediente" id="cedidoExpediente" placeholder="Cedido"><br/>
                </div>
                    <input class="form-control" name="comentarioExpediente" id="comentarioExpediente" placeholder="Comentario"><br/>
                <div class="span3">
                    <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                </div>
            </form>
         </div>
        <div id="divResultado"></div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>