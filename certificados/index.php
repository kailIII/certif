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
                                <label data-toggle="tooltip">Certif. Nro.</label>
                                <input class="form-control" data-toggle="tooltip" name="nrocert" title="Numero de Certificado" id="nrocert" alt="Numero de Certificado" placeholder="Certif. Nro." type="number" onkeypress="return soloNumeros(event);" /><br/>
                            </div>                   
                            <div>
                                <label>Periodo</label>
                                <input class="form-control" data-toggle="tooltip" name="periodo" title="Periodo" alt="Periodo" id="periodo" placeholder="Periodo" type="date" value="<?php echo date('Y-m-d'); ?>" /><br/>
                            </div>
                            <div >
                                <label>Fecha de firma</label>
                                <input class="form-control" data-toggle="tooltip" name="fechafirma" id="fechafirma" title="Fecha de firma" alt="Fecha de firma" placeholder="Fecha de firma" type="date" value="<?php echo date('Y-m-d'); ?>" /><br/>
                            </div>
                            <div>
                                <label>Participacion (%)</label>
                                <input class="form-control" data-toggle="tooltip" name="participacion" id="participacion" title="Participacion (%)" alt="Participacion (%)" placeholder="Participacion (%)" onkeypress="return soloNumeros(event);" /><br/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <label>Importe basico</label>
                                <input class="form-control" data-toggle="tooltip" name="importeb" id="importeb" title="Importe basico" alt="Importe basico" placeholder="Importe basico" onkeypress="return soloNumeros(event);" /><br/>
                            </div>
                            <div >
                                <label>Importe redeterminado</label>
                                <input class="form-control" data-toggle="tooltip" name="importer" id="importer" title="Importe redeterminado" alt="Importe redeterminado" placeholder="Importe redeterminado" onkeypress="return soloNumeros(event);" /><br/>
                            </div>
                            <div>
                                <label>Fondo de emparo</label>
                                <input class="form-control" data-toggle="tooltip" name="fondoamp" id="fondoamp" title="Fondo de emparo" alt="Fondo de emparo" placeholder="Fondo de emparo" onkeypress="return soloNumeros(event);" /><br/>
                            </div>
                            <div>
                                <label>Anticipo financiero / Garantia</label>
                                <input class="form-control" data-toggle="tooltip" name="anticipo" id="anticipo" title="Anticipo financiero / Garantia" alt="Anticipo financiero / Garantia" placeholder="Anticipo financiero / Garantia" onkeypress="return soloNumeros(event);" /><br/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <label>Otros</label>
                                <input class="form-control" data-toggle="tooltip" name="otros" id="otros" title="Otros" alt="Otros" placeholder="Otros" onkeypress="return soloNumeros(event);" /><br/>
                            </div>
                            <div >
                                <label>A cobrar</label>
                                <input class="form-control" data-toggle="tooltip" name="acobrar" id="acobrar" title="A cobrar" alt="A cobrar" placeholder="A cobrar" onkeypress="return soloNumeros(event);" /><br/>
                            </div>
                            <div class="custom-input-file btn btn-lg btn-primary">
                                <input type="file" class="input-file" id="archivo" />
                                Cargar imagen
                                <div class="archivo">...</div>
                            </div>
                        </div>
                        <div class="">
<!--                            <label>Comentario sobre el certificado</label>-->
                            <input class="form-control" name="cometarioscert" id="cometarioscert" title="Comentario sobre el certificado" alt="Comentario sobre el certificado" placeholder="Comentario sobre el certificado">
                        </div>
                    </div>    
                </div>
                
                <div class="col-lg-4">
                    <label>Certificado DPV</label>
                    <input class="form-control" data-toggle="tooltip" name="dpvCertificado" id="dpvCertificado" title="Certificado DPV" alt="Certificado DPV" placeholder="Certificado DPV" /><br/>
                    <label>Certificado DNV</label>
                    <input class="form-control" data-toggle="tooltip" name="dnvCertificado" id="dnvCertificado" title="Certificado DNV" alt="Certificado DNV" placeholder="Certificado DNV" /><br/>
                    <label>Expediente DPV</label>
                    <input class="form-control" data-toggle="tooltip" name="dpvExpediente" id="dpvExpediente" title="Expediente DPV" alt="Expediente DPV" placeholder="Expediente DPV" onkeypress="return soloNumeros(event);" /><br/>
                </div>
                <div class="col-lg-4">
                    <label>Expediente DNV</label>
                    <input class="form-control" data-toggle="tooltip" name="dnvExpediente" id="dnvExpediente" title="Expediente DNV" alt="Expediente DNV" placeholder="Expediente DNV" onblur="busquedaExpediente();" onkeypress="return soloNumeros(event);" /><br/>
                    <label>Mes</label>
                    <input class="form-control" data-toggle="tooltip" name="mesExpediente" id="mesExpediente" title="Mes" alt="Mes" placeholder="Mes"><br/>
                    <label>Depedencia</label>
                    <input class="form-control" data-toggle="tooltip" name="dependenciaExpediente" id="dependenciaExpediente" title="Dependencia" alt="Dependencia" placeholder="Dependencia"><br/>
                </div>
                <div class="col-lg-4">
                    <label>Importe</label>
                    <input class="form-control" data-toggle="tooltip" name="importeExpediente" id="importeExpediente" title="Importe" alt="Importe" placeholder="Importe"onkeypress="return soloNumeros(event);" /><br/>
                    <label>Vencimiento</label>
                    <input class="form-control" data-toggle="tooltip" name="vencimientoExpediente" id="vencimientoExpediente" title="Vencimiento" alt="Vencimiento" placeholder="Vencimiento" type="date" value="<?php echo date('Y-m-d'); ?>" /><br/>
                    <label>Cedido</label>
                    <input class="form-control" data-toggle="tooltip" name="cedidoExpediente" id="cedidoExpediente" title="Cedido" alt="Cedido" placeholder="Cedido"><br/>
                </div>
                <div  class="">
                    <label>Comentario</label>
                    <input class="form-control" name="comentarioExpediente" id="comentarioExpediente" title="Comentario" alt="Comentario" placeholder="Comentario"><br/>
                <div class="span3">
                    <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                </div>
                </div>    
            </form>
         </div>
        <div id="divResultado"></div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>