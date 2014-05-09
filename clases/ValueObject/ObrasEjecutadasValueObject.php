<?php
/**
 * Description of ObrasEjecutadasValueObject
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class ObrasEjecutadasValueObject {
    private $ID, $Seleccion, $denominacion, $enejec, $idcomitente, $tipoDeObra;
    private $montoContractualOriginal, $montoContractualFinal, $fechaTerminacionOriginal;
    private $FechaTerminacionFinal, $PlazoOriginal, $PlazoFinal, $idPersoneria;
    private $participacion, $ute, $observacion, $longitud, $longitudMedida, $terraplenes;
    private $terraplenesMedida, $recubrimiento, $recubrimientoMedida, $baseNoButuminosa;
    private $baseMedida, $banquinaRipio, $banquinaRipioMedida, $tratamientoTriple;
    private $tratamientoTripleMedida, $Hormigones, $HormigonesMedida, $reforestacion;
    private $reforestacionMedida, $certEjecucion, $rp, $rd, $ok, $fechaInicio;
    private $fechaLicitacion, $fechaContrato, $fechaReplanteo, $financiada;
    private $comentario, $fechaRP, $fechaRD, $kml;
    
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getSeleccion() {
        return $this->Seleccion;
    }

    public function setSeleccion($Seleccion) {
        $this->Seleccion = $Seleccion;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function getEnejec() {
        return $this->enejec;
    }

    public function setEnejec($enejec) {
        $this->enejec = $enejec;
    }

    public function getIdcomitente() {
        return $this->idcomitente;
    }

    public function setIdcomitente($idcomitente) {
        $this->idcomitente = $idcomitente;
    }

    public function getTipoDeObra() {
        return $this->tipoDeObra;
    }

    public function setTipoDeObra($tipoDeObra) {
        $this->tipoDeObra = $tipoDeObra;
    }

    public function getMontoContractualOriginal() {
        return $this->montoContractualOriginal;
    }

    public function setMontoContractualOriginal($montoContractualOriginal) {
        $this->montoContractualOriginal = $montoContractualOriginal;
    }

    public function getMontoContractualFinal() {
        return $this->montoContractualFinal;
    }

    public function setMontoContractualFinal($montoContractualFinal) {
        $this->montoContractualFinal = $montoContractualFinal;
    }

    public function getFechaTerminacionOriginal() {
        return $this->fechaTerminacionOriginal;
    }

    public function setFechaTerminacionOriginal($fechaTerminacionOriginal) {
        $this->fechaTerminacionOriginal = $fechaTerminacionOriginal;
    }

    public function getFechaTerminacionFinal() {
        return $this->FechaTerminacionFinal;
    }

    public function setFechaTerminacionFinal($FechaTerminacionFinal) {
        $this->FechaTerminacionFinal = $FechaTerminacionFinal;
    }

    public function getPlazoOriginal() {
        return $this->PlazoOriginal;
    }

    public function setPlazoOriginal($PlazoOriginal) {
        $this->PlazoOriginal = $PlazoOriginal;
    }

    public function getPlazoFinal() {
        return $this->PlazoFinal;
    }

    public function setPlazoFinal($PlazoFinal) {
        $this->PlazoFinal = $PlazoFinal;
    }

    public function getIdPersoneria() {
        return $this->idPersoneria;
    }

    public function setIdPersoneria($idPersoneria) {
        $this->idPersoneria = $idPersoneria;
    }

    public function getParticipacion() {
        return $this->participacion;
    }

    public function setParticipacion($participacion) {
        $this->participacion = $participacion;
    }

    public function getUte() {
        return $this->ute;
    }

    public function setUte($ute) {
        $this->ute = $ute;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    public function getLongitud() {
        return $this->longitud;
    }

    public function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    public function getLongitudMedida() {
        return $this->longitudMedida;
    }

    public function setLongitudMedida($longitudMedida) {
        $this->longitudMedida = $longitudMedida;
    }

    public function getTerraplenes() {
        return $this->terraplenes;
    }

    public function setTerraplenes($terraplenes) {
        $this->terraplenes = $terraplenes;
    }

    public function getTerraplenesMedida() {
        return $this->terraplenesMedida;
    }

    public function setTerraplenesMedida($terraplenesMedida) {
        $this->terraplenesMedida = $terraplenesMedida;
    }

    public function getRecubrimiento() {
        return $this->recubrimiento;
    }

    public function setRecubrimiento($recubrimiento) {
        $this->recubrimiento = $recubrimiento;
    }

    public function getRecubrimientoMedida() {
        return $this->recubrimientoMedida;
    }

    public function setRecubrimientoMedida($recubrimientoMedida) {
        $this->recubrimientoMedida = $recubrimientoMedida;
    }

    public function getBaseNoButuminosa() {
        return $this->baseNoButuminosa;
    }

    public function setBaseNoButuminosa($baseNoButuminosa) {
        $this->baseNoButuminosa = $baseNoButuminosa;
    }

    public function getBaseMedida() {
        return $this->baseMedida;
    }

    public function setBaseMedida($baseMedida) {
        $this->baseMedida = $baseMedida;
    }

    public function getBanquinaRipio() {
        return $this->banquinaRipio;
    }

    public function setBanquinaRipio($banquinaRipio) {
        $this->banquinaRipio = $banquinaRipio;
    }

    public function getBanquinaRipioMedida() {
        return $this->banquinaRipioMedida;
    }

    public function setBanquinaRipioMedida($banquinaRipioMedida) {
        $this->banquinaRipioMedida = $banquinaRipioMedida;
    }

    public function getTratamientoTriple() {
        return $this->tratamientoTriple;
    }

    public function setTratamientoTriple($tratamientoTriple) {
        $this->tratamientoTriple = $tratamientoTriple;
    }

    public function getTratamientoTripleMedida() {
        return $this->tratamientoTripleMedida;
    }

    public function setTratamientoTripleMedida($tratamientoTripleMedida) {
        $this->tratamientoTripleMedida = $tratamientoTripleMedida;
    }

    public function getHormigones() {
        return $this->Hormigones;
    }

    public function setHormigones($Hormigones) {
        $this->Hormigones = $Hormigones;
    }

    public function getHormigonesMedida() {
        return $this->HormigonesMedida;
    }

    public function setHormigonesMedida($HormigonesMedida) {
        $this->HormigonesMedida = $HormigonesMedida;
    }

    public function getReforestacion() {
        return $this->reforestacion;
    }

    public function setReforestacion($reforestacion) {
        $this->reforestacion = $reforestacion;
    }

    public function getReforestacionMedida() {
        return $this->reforestacionMedida;
    }

    public function setReforestacionMedida($reforestacionMedida) {
        $this->reforestacionMedida = $reforestacionMedida;
    }

    public function getCertEjecucion() {
        return $this->certEjecucion;
    }

    public function setCertEjecucion($certEjecucion) {
        $this->certEjecucion = $certEjecucion;
    }

    public function getRp() {
        return $this->rp;
    }

    public function setRp($rp) {
        $this->rp = $rp;
    }

    public function getRd() {
        return $this->rd;
    }

    public function setRd($rd) {
        $this->rd = $rd;
    }

    public function getOk() {
        return $this->ok;
    }

    public function setOk($ok) {
        $this->ok = $ok;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaLicitacion() {
        return $this->fechaLicitacion;
    }

    public function setFechaLicitacion($fechaLicitacion) {
        $this->fechaLicitacion = $fechaLicitacion;
    }

    public function getFechaContrato() {
        return $this->fechaContrato;
    }

    public function setFechaContrato($fechaContrato) {
        $this->fechaContrato = $fechaContrato;
    }

    public function getFechaReplanteo() {
        return $this->fechaReplanteo;
    }

    public function setFechaReplanteo($fechaReplanteo) {
        $this->fechaReplanteo = $fechaReplanteo;
    }

    public function getFinanciada() {
        return $this->financiada;
    }

    public function setFinanciada($financiada) {
        $this->financiada = $financiada;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function getFechaRP() {
        return $this->fechaRP;
    }

    public function setFechaRP($fechaRP) {
        $this->fechaRP = $fechaRP;
    }

    public function getFechaRD() {
        return $this->fechaRD;
    }

    public function setFechaRD($fechaRD) {
        $this->fechaRD = $fechaRD;
    }
    
    public function getKml() {
        return $this->kml;
    }

    public function setKml($kml) {
        $this->kml = $kml;
    }
}
?>