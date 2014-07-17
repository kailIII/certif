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
                <div class="form-group">
                    <div class="col-lg-11">
                        <label class="label-success label">Nombre obra</label><br />
                        <?php
                        $oMysqlObra = $oMysql->getObrasEjecutadasActiveRecord();
                        $oObra = new ObrasEjecutadasValueObject();
                        $oObra = $oMysqlObra->buscarTodo();
                        $oObra = array_reverse($oObra);
                        ?>
                        <select name="nombreobra" id="nombreobra" class="select-block" >
                            <?php
                            foreach ($oObra as $aObra) {
                            echo "<option value='" . $aObra->getID() . "'>"
                                    . utf8_decode($aObra->getDenominacion()) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <!--<label class="control-label">&nbsp;</label>-->
                        <br />
                        <a href="../obras" title="Nueva Obra">
                            <img src="../images/todo/done-2x.png" alt="Nueva Obra"/>
                        </a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <label class="label-success label">Tipo de obra</label><br />
                        <select name="tipocertf" id="tipocertf" class="select-block" value="Comun">
                              <option value="1">Comun</option>
                              <option value="2">Provisorio</option>
                              <option value="3">Definitivo</option>
                              <option value="4">DYC</option>
                              <option value="5">Bis</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label-success label" data-toggle="tooltip">Certif. Nro.</label>
                        <input class="form-control" data-toggle="tooltip" name="nrocert" title="Numero de Certificado" id="nrocert" alt="Numero de Certificado" placeholder="Certif. Nro." type="number" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">Certificado DNV</label>
                        <input class="form-control" data-toggle="tooltip" name="dnvCertificado" id="dnvCertificado" title="Certificado DNV" alt="Certificado DNV" placeholder="Certif. DNV" /><br/>
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">Periodo</label>
                        <input class="form-control" data-toggle="tooltip" name="periodo" title="Periodo" alt="Periodo" id="periodo" placeholder="Periodo" type="text" value="" /><br/>
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Fecha de firma</label>
                        <input class="form-control" data-toggle="tooltip" name="fechafirma" id="fechafirma" title="Fecha de firma" alt="Fecha de firma" placeholder="Fecha de firma" type="date" value="<?php echo date('Y-m-d'); ?>" /><br/>
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Importe</label>
                        <input class="form-control" data-toggle="tooltip" name="importeExpediente" id="importeExpediente" title="Importe" alt="Importe" placeholder="Importe" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="label-success label">Expediente DNV</label>
                        <input class="form-control" data-toggle="tooltip" name="dnvExpediente" id="dnvExpediente" title="Expediente DNV" alt="Expediente DNV" placeholder="Expediente DNV" onblur="acomodaExpediente();" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Expediente DPV</label>
                        <input class="form-control" data-toggle="tooltip" name="dpvExpediente" id="dpvExpediente" title="Expediente DPV" alt="Expediente DPV" placeholder="Expediente DPV" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Vencimiento</label>
                        <input class="form-control" data-toggle="tooltip" name="vencimientoExpediente" id="vencimientoExpediente" title="Vencimiento" alt="Vencimiento" placeholder="Vencimiento" type="date" value="<?php echo date('Y-m-d'); ?>" /><br/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <label class="label-success label">Cedido</label>
                        <input class="form-control" data-toggle="tooltip" name="cedidoExpediente" id="cedidoExpediente" title="Cedido" alt="Cedido" placeholder="Cedido">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <label class="label-success label">Comentario</label>
                        <input class="form-control" name="comentarioExpediente" id="comentarioExpediente" title="Comentario" alt="Comentario" placeholder="Comentario">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <input type="button" value="&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                    </div>
                    <div class="col-lg-9" id="divResultado"></div>
                </div>
            </form>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>