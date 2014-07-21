<?php
include_once '../inicio/valido.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlCertificacion = $oMysql->getCertificacionActiveRecord();
$oCertificacion = new CertificacionValueObject();
$oCertificacion->setCertNro($_POST['certNro']);
$oCertificacion = $oMysqlCertificacion->buscarPorCertNro($oCertificacion);
?>
<input type="hidden" name="cert01" id="cert01" value="<?php echo $oCertificacion->getId(); ?>" />
<input type="hidden" name="cert02" id="cert02" value="<?php echo $oCertificacion->getIdObra(); ?>" />
<input type="hidden" name="cert03" id="cert03" value="<?php echo $oCertificacion->getCertNro(); ?>" />
<input type="hidden" name="cert04" id="cert04" value="<?php echo $oCertificacion->getIdTipo(); ?>" />
<input type="hidden" name="cert05" id="cert05" value="<?php echo $oCertificacion->getMes(); ?>" />
<input type="hidden" name="cert06" id="cert06" value="<?php echo $oCertificacion->getPeriodo(); ?>" />
<input type="hidden" name="cert07" id="cert07" value="<?php echo $oCertificacion->getImporteBasico(); ?>" />
<input type="hidden" name="cert08" id="cert08" value="<?php echo $oCertificacion->getImporteRedeterminado(); ?>" />
<input type="hidden" name="cert09" id="cert09" value="<?php echo $oCertificacion->getFondoReparo(); ?>" />
<input type="hidden" name="cert09" id="cert10" value="<?php echo $oCertificacion->getAnticipoFinanciero(); ?>" />
<input type="hidden" name="cert01" id="cert11" value="<?php echo $oCertificacion->getOtrosDescuentos(); ?>" />
<input type="hidden" name="cert02" id="cert12" value="<?php echo $oCertificacion->getACobrar(); ?>" />
<input type="hidden" name="cert03" id="cert13" value="<?php echo $oCertificacion->getComentario(); ?>" />
<input type="hidden" name="cert04" id="cert14" value="<?php echo $oCertificacion->getFecha(); ?>" />
<input type="hidden" name="cert05" id="cert15" value="<?php echo $oCertificacion->getParticipacion(); ?>" />
<input type="hidden" name="cert06" id="cert16" value="<?php echo $oCertificacion->getImagen(); ?>" />
<input type="hidden" name="cert07" id="cert17" value="<?php echo $oCertificacion->getFechaFirma(); ?>" />