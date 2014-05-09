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
        <?php include_once "../includes/php/estilos.php";?>
    </head>
    <body>
        <?php
        include_once "../includes/php/header.php";
        include_once '../clases/ActiveRecord/MysqlObrasEjecutadasActiveRecord.php';
        $oObras = new MysqlObrasEjecutadasActiveRecord();
        $oObraVO = new ObrasEjecutadasValueObject();
        $oObraVO->setID($_GET["id"]);
        $oObraVO = $oObras->buscar($oObraVO);
        ?>
        <div class="container">
            <!--<form class="form-horizontal">-->
                <legend>Obras en Ejecuci&oacute;n y Ejecutadas</legend>
                <div class="form-group">
                    <label class="control-label">Identificaci&oacute;n: &nbsp;&nbsp;</label>
                    <p class="short small"> <?php echo $_GET["id"]; ?> </p>
                </div>
                <div class="form-group">
                    <label class="control-label"> Denominaci&oacute;n: &nbsp;&nbsp;</label>
                    <p class="short small"> <?php echo utf8_encode($oObraVO->getDenominacion()); ?> </p>
                </div>
                <div class="form-group">
                    <label class="control-label"> Ubicaci&oacute;n: &nbsp;&nbsp;</label>
                    <p class="short small"> <?php echo utf8_encode("Ubicaci&oacute;n"); ?> </p>
                </div>
                <div class="form-group">
                    <label class="control-label"> Comitente: &nbsp;&nbsp;</label>
                    <p class="short small"> <?php echo utf8_encode($oObraVO->getIdcomitente()); ?> </p>
                </div>
                <div class="form-group">
                    <label class="control-label"> Tipo de Obra: &nbsp;&nbsp;</label>
                    <p class="short small"> <?php echo utf8_encode($oObraVO->getTipoDeObra()); ?> </p>
                </div>
                <div class="form-group">
                    <label class="control-label">Observaci&oacute;n: &nbsp;&nbsp;</label>
                    <p class="short small"> <?php echo utf8_encode($oObraVO->getObservacion()); ?> </p>
                </div>
                <label class="control-label"><h4>Caracteristicas de obra</h4></label>
                <fieldset class="well">
                    <div class="col-lg-3">
                        <div>
                            <label>Longitud: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getLongitud()); ?> </p>
                        </div>
                        <div>
                            <label>Terraplen: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getTerraplenes()); ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div>
                            <label>Bases No Bituminosas: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getBaseNoButuminosa()); ?> </p>
                        </div>
                        <div>
                            <label>Banquina/Ripio: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getBanquinaRipio()); ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div>
                            <label>Tratamiento Triple: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getTratamientoTriple()); ?> </p>
                        </div>
                        <div>
                            <label>Hormigon: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getHormigones()); ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div>
                            <label>Recubrimiento: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getRecubrimiento()); ?> </p>
                        </div>
                        <div>
                            <label>Reforestaci&oacute;n: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getReforestacion()); ?> </p>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="well">
                    <div class="col-lg-4">
                        <div>
                            <label>Fecha licitaci&oacute;n: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo substr(utf8_encode($oObraVO->getFechaLicitacion()), 0, 11); ?> </p>
                        </div>
                        <div>
                            <label>Monto Contractual Original: &nbsp;&nbsp;</label>
                            <!--<p class="short small"> <?php //echo substr(utf8_encode($oObraVO->getFechaLicitacion()), 0, 11); ?> </p>-->
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getMontoContractualOriginal()); ?> </p>
                        </div>

                        <div>
                            <label>Fecha Inicio: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo substr(utf8_encode($oObraVO->getFechaInicio()), 0, 11); ?> </p>
                        </div>
                        <div>
                            <label>Financiada: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getFinanciada()); ?> </p>
                        </div>
                        <div>
                            <label>Fecha Terminaci&oacute;n Original: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo substr(utf8_encode($oObraVO->getFechaTerminacionOriginal()), 0, 11); ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label>Fecha Contrato: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo substr(utf8_encode($oObraVO->getFechaContrato()), 0, 11); ?> </p>
                        </div>
                        <div>
                            <label>Monto Contractual Final: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getMontoContractualFinal()); ?> </p>
                        </div>
                        <div>
                            <label>Plazo Final: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo substr(utf8_encode($oObraVO->getPlazoFinal()), 0, 11); ?> </p>
                        </div>
                        <div>
                            <label>Participaci&oacute;n: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getParticipacion()); ?> %</p>
                        </div>
                        <div>
                            <label>Fecha Terminaci&oacute;n Final: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo substr(utf8_encode($oObraVO->getFechaTerminacionFinal()), 0, 11); ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <label>Replanteo: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo substr(utf8_encode($oObraVO->getFechaReplanteo()), 0, 11); ?> </p>
                        </div>
                        <div>
                            <label>Personeria: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getIdPersoneria()); ?> </p>
                        </div>
                        <div>
                            <label>UTE: &nbsp;&nbsp;</label>
                            <p class="short small"> <?php echo utf8_encode($oObraVO->getUte()); ?> </p>
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <label class="control-label"> Comentarios: &nbsp;&nbsp;</label>
                        <p class="short small"> <?php echo utf8_encode($oObraVO->getComentario()); ?> </p>
                    </div>
                </fieldset>
                <div>
                    <?php if(utf8_encode($oObraVO->getKml())) include_once ("../mapa/index.php"); ?>
                </div>
                <?php
                include_once '../clases/ActiveRecord/MysqlCertificacionActiveRecord.php';
                include_once '../clases/ValueObject/CertificacionValueObject.php';
                $oCertificado = new MysqlCertificacionActiveRecord();
                $oValueObject = new CertificacionValueObject();
                $oValueObject->setIdObra($oObraVO->getID());
                if($oCertificado->existeObra($oValueObject)){
                    $aValueObject = $oCertificado->buscarObra($oValueObject);
                    ?>
                    <fieldset>
                        <legend>Certificados</legend>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Certif. Nro.</th>
                                    <th>Tipo de obra</th>
                                    <th>Periodo</th>
                                    <th>Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once '../clases/ValueObject/TipocertValueObject.php';
                                /**
                                 * hago el include del value object del certificado
                                 */
                                $oMyTipo = $oMysql->getTipocertActiveRecord();
                                $oTipo = new TipocertValueObject();
                                /**
                                 * instancio en value objetc del certificado
                                 */
                                foreach ($aValueObject as $valor) {
                                    $oTipo->setId($valor->getIdTipo());
                                    /**
                                     * obtengo el id del tipo de certificado cargado y busco su descripcion
                                     */
                                    $oTipo = $oMyTipo->buscar($oTipo);
                                    ?>
                                    <tr>
                                        <td><?php echo $valor->getCertNro();?></td>
                                        <!--  muestro la descripcion obtenida-->
                                        <td><?php echo $oTipo->getDescripcion();?></td>
                                        <td><?php echo substr($valor->getPeriodo(), 1, 10);?></td>
                                        <td><a href="../certificados/muestra.php?id=<?php echo $valor->getCertNro() . '&idobra='. $oObraVO->getID(); ?>"><img src="../images/todo/search.png" /></a></td>
                                    </tr>
                                    <?php
                                };
                                ?>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">
                                            <form action="../certificados/index.php" method="POST" id="certificado">
                                                <input type="hidden" name="identifica" value="<?php echo $_GET['id'] ?>">
                                                <input type="submit" class="btn btn-large btn-block btn-primary" value="&nbsp;&nbsp;&nbsp;Certificado Nuevo&nbsp;&nbsp;&nbsp;" />
                                            </form>
                                        </td>
                                    </tr>
                            </tbody>
                         </table>
                    </fieldset>
                    <?php
                }
                ?>
            <!--</form>-->
                <div class="span3">
                        <a href="listado.php" class="btn btn-large btn-block btn-primary">&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;</a>
                    <!--<input name="guardar" type="submit" value="Guardar" class="btn btn-large btn-block btn-primary">-->
                </div>
            
            <div id="resultado"></div>
        </div>
        <?php include_once "../includes/php/footer.php";?>
        <?php include_once "../includes/php/flatui_js.php";?>
    </body>
</html>