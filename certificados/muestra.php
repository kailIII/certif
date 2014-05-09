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
        <title>SGO - Certificados</title>
        <?php include_once "../includes/php/estilos.php";?>
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body>
        <?php include_once "../includes/php/header.php";
        include_once '../clases/ActiveRecord/MysqlCertificacionActiveRecord.php';
        include_once '../clases/ValueObject/CertificacionValueObject.php';
        $oCertificado = new MysqlCertificacionActiveRecord();
        $oCertificadoVO = new CertificacionValueObject();
        $oCertificadoVO->setCertNro($_GET["id"]);
        $oCertificadoVO = $oCertificado->buscarPorCertNro($oCertificadoVO);?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Certificados de obra</legend>
                <div class="form-group col-lg-12">
                    <div class="col-lg-4">
                        <div class="form-group" >
                            <label class="control-label">Id de obra</label><br />
                             <?php
                            if(isset($_GET['idobra'])){
                                ?>
                            <input class="form-control short small" name="identificador" id="identificador" value="<?php echo $_GET['idobra'];?>" size="10">
                                <?php
                            } else {
                            ?>
                            <input class="form-control short small" name="identificador" id="identificador" value="" size="10">
                            <?php
                            }
                            ?>
<!--                            <input class="form-control short small" name="identificador" id="identificador" size="10">   -->
                        </div>
                        <div>
                            <div class="form-group">
                                <label class="control-label">Tipo de obra</label><br /> 
                                <?php  
                                    include_once '../clases/ActiveRecord/MysqlTipocertActiveRecord.php';
                                    include_once '../clases/ValueObject/TipocertValueObject.php';
                                    $oTipoCert = new MysqlTipocertActiveRecord();
                                    $oTipocertVO = new TipocertValueObject();
                                    $oTipocertVO->setId($oCertificadoVO->getIdTipo());
                                    $oTipocertVO = $oTipoCert->buscar($oTipocertVO);
                                ?>
                                <input class="form-control short small" name="Tipo_obra" id="identificador" value="<?php echo utf8_encode($oTipocertVO->getDescripcion()); ?>" size="10">
                            </div>   
                        </div> 
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div>
                        <label class="col-lg-5">Certif. Nro.</label>
                        <input class="form-control short small" name="nrocert" value="<?php echo utf8_encode($oCertificadoVO->getCertNro()); ?> " id="nrocert" size="10">
                    </div>                   
                    <div>
                        <label class="col-lg-5">Periodo</label>
                        <input class="form-control short small" name="periodo" value="<?php echo substr(utf8_encode($oCertificadoVO->getPeriodo()), 0, 10)  ; ?> " id="periodo" size="10">
                    </div>
                    <div >
                        <label class="col-lg-5">Fecha de firma</label>
                        <input class="form-control short small" name="fechafirma" value="<?php echo substr(utf8_encode($oCertificadoVO->getFechaFirma()), 0, 10)  ; ?> " id="fechafirma" size="10">
                    </div>
                    <div>
                        <label class="col-lg-5">Participacion</label>
                        <input class="form-control short small" name="participacion" value="<?php echo utf8_encode($oCertificadoVO->getParticipacion()); ?> " id="participacion" size="10">%
                    </div>
               </div>
                <div class="col-lg-4">
                    <div>
                        <label class="col-lg-5">Importe basico</label>
                        <input class="form-control short small" name="importeb" value="<?php echo utf8_encode($oCertificadoVO->getImporteBasico()); ?> " id="importeb" size="10">
                    </div>
                    <div >
                        <label class="col-lg-5">Importe redeterminado</label>
                        <input class="form-control short small" name="importer" value="<?php echo utf8_encode($oCertificadoVO->getImporteRedeterminado()); ?> " id="importer" size="10">
                    </div>
                    <div>
                        <label class="col-lg-5">Fondo de emparo</label>
                        <input class="form-control short small" name="fondoamp" value="<?php echo utf8_encode($oCertificadoVO->getFondoReparo()); ?> " id="fondoamp" size="10">
                    </div>
                    <div>
                        <label class="col-lg-5">Anticipo financiero / Garantia</label>
                        <input class="form-control short small" name="anticipo" value="<?php echo utf8_encode($oCertificadoVO->getAnticipoFinanciero()); ?> " id="anticipo" size="10">
                    </div>
               </div>
                <div class="col-lg-4">
                    <div>
                        <label class="col-lg-5">Otros</label>
                        <input class="form-control short small" name="otros" value="<?php echo utf8_encode($oCertificadoVO->getOtrosDescuentos()); ?> " id="otros" size="10">
                    </div>
                    <div >
                        <label class="col-lg-5">A cobrar</label>
                        <input class="form-control short small" name="acobrar" value="<?php echo utf8_encode($oCertificadoVO->getACobrar()); ?> " id="acobrar" size="10">
                    </div>
    <!--                    <div class="custom-input-file">
                            <div class="btn btn-lg btn-primary"><input type="file" class="input-file"/>Cargar imagen</div>
                        </div>-->
                    <div class="">
                        <label class="col-lg-5">Abrir archivo</label>
                        <a href="#"><img src="../images/todo/search.png" /></a>
                    </div>
               </div>
               <div class="form-group col-lg-11">
                    <label class="control-label">Comentarios</label><br />
                    <textarea class="col-lg-9 form-control" rows="2" maxlength="250" name="comentarios" id="comentarios" > <?php echo utf8_encode($oCertificadoVO->getComentario()); ?> </textarea>
               </div>
                <div class="span3">
                        <a href="../obras/muestra.php?id=<?php echo $_GET['idobra']?>" class="btn  btn-primary">&nbsp;&nbsp;&nbsp;Volver a la obra&nbsp;&nbsp;&nbsp;</a>
                    <!--<input name="guardar" type="submit" value="Guardar" class="btn btn-large btn-block btn-primary">-->
                </div>
            </form>
         </div>
        <div id="divResultado"></div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>
