<?php
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
    </head>
    <body>
        <?php include_once "../includes/php/header.php";?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Certificados de obra</legend>
                <div class="form-group col-lg-12">
                    <div class="col-lg-11">
                        <div class="form-group col-lg-10">
                            <label class="control-label">Nombre obra</label><br />
                            <?php
                            $oMysqlObra = $oMysql->getObrasEjecutadasActiveRecord();
                            $oObra = new ObrasEjecutadasValueObject();
                            $oObra = $oMysqlObra->buscarTodo();
                            ?>
                            <select name="nombreobra" id="nombreobra" class="select-block" value="Comun">
                                <?php
                                foreach ($oObra as $aObra) {
                                echo "<option value='" . $aObra->getID() . "'>"
                                        . utf8_decode($aObra->getDenominacion()) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <label class="control-label">&nbsp;</label><br />
                            <a href="../obras" title="Nueva Obra">
                                <img src="../images/todo/done-2x.png" alt="Nueva Obra"/>
                            </a>
                        </div>
                        
                    </div>
                </div>
                    <div class="well col-lg-12">
                        <div class="form-group col-lg-12">
                            <div class="col-lg-11">
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

                            <div class="col-lg-11">
                                <div class="col-lg-2">
                                    <label data-toggle="tooltip">Certif. Nro.</label>
                                    <input class="form-control" data-toggle="tooltip" name="nrocert" title="Numero de Certificado" id="nrocert" alt="Numero de Certificado" placeholder="Certif. Nro." type="number" onkeypress="return soloNumeros(event);" /><br/>
                                </div>
                                <div class="col-lg-2">
                                    <label>Periodo</label>
                                    <input class="form-control" data-toggle="tooltip" name="periodo" title="Periodo" alt="Periodo" id="periodo" placeholder="Periodo" type="text" value="" /><br/>
                                </div>
                                <div class="col-lg-3">
                                    <label>Fecha de firma</label>
                                    <input class="form-control" data-toggle="tooltip" name="fechafirma" id="fechafirma" title="Fecha de firma" alt="Fecha de firma" placeholder="Fecha de firma" type="date" value="<?php echo date('Y-m-d'); ?>" /><br/>
                                </div>
                                <div class="col-lg-3">
                                    <label>Importe</label>
                                    <input class="form-control" data-toggle="tooltip" name="importeb" id="importeb" title="Importe basico" alt="Importe basico" placeholder="Importe basico" onkeypress="return soloNumeros(event);" /><br/>
                                </div>
                            </div>

                            <div class="col-lg-11">
                                <div class="col-lg-11">
                                <label>Comentario sobre el certificado</label>
                                <input class="form-control" name="cometarioscert" id="cometarioscert" title="Comentario sobre el certificado" alt="Comentario sobre el certificado" placeholder="Comentario sobre el certificado"><br/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Certificado DNV</label>
                                <input class="form-control" data-toggle="tooltip" name="dnvCertificado" id="dnvCertificado" title="Certificado DNV" alt="Certificado DNV" placeholder="Certificado DNV" /><br/>
                                <label>Expediente DPV</label>
                                <input class="form-control" data-toggle="tooltip" name="dpvExpediente" id="dpvExpediente" title="Expediente DPV" alt="Expediente DPV" placeholder="Expediente DPV" onkeypress="return soloNumeros(event);" /><br/>
                            </div>
                            <div class="col-lg-4">
                                <label>Expediente DNV</label>
                                <input class="form-control" data-toggle="tooltip" name="dnvExpediente" id="dnvExpediente" title="Expediente DNV" alt="Expediente DNV" placeholder="Expediente DNV" onblur="busquedaExpediente();" onkeypress="return soloNumeros(event);" /><br/>
                                <label>Depedencia</label>
                                <input class="form-control" data-toggle="tooltip" name="dependenciaExpediente" id="dependenciaExpediente" title="Dependencia" alt="Dependencia" placeholder="Dependencia"><br/>
                            </div>
                            <div class="col-lg-4">
                                <label>Importe</label>
                                <input class="form-control" data-toggle="tooltip" name="importeExpediente" id="importeExpediente" title="Importe" alt="Importe" placeholder="Importe"onkeypress="return soloNumeros(event);" /><br/>
                                <label>Vencimiento</label>
                                <input class="form-control" data-toggle="tooltip" name="vencimientoExpediente" id="vencimientoExpediente" title="Vencimiento" alt="Vencimiento" placeholder="Vencimiento" type="date" value="<?php echo date('Y-m-d'); ?>" /><br/>
                            </div>
                            <div  class="col-lg-11">
                                <label>Cedido</label>
                                <input class="form-control" data-toggle="tooltip" name="cedidoExpediente" id="cedidoExpediente" title="Cedido" alt="Cedido" placeholder="Cedido"><br/>
                                <label>Comentario</label>
                                <input class="form-control" name="comentarioExpediente" id="comentarioExpediente" title="Comentario" alt="Comentario" placeholder="Comentario"><br/>
                            </div>
                        </div>
                    </div>
                <div class="span3">
                    <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                </div>
                <br />
            </form>
            <div id="divResultado"></div>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>