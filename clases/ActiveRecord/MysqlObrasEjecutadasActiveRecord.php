<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/ObrasEjecutadasValueObject.php';
/**
 * Description of MysqlObrasEjecutadasActiveRecord
 *
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class MysqlObrasEjecutadasActiveRecord implements ActiveRecord{
    /**
     * 
     * @param ObrasEjecutadasValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE obrasejecutadas SET Seleccion = '" . $oValueObject->getSeleccion() .
            "', denominacion = '" . $oValueObject->getDenominacion() .
            "', enejec = '" . $oValueObject->getEnejec() .
            "', idcomitente = " . $oValueObject->getIdcomitente() .
            ", tipoDeObra = '" . $oValueObject->getTipoDeObra() .
            "', montoContractualOriginal = " . $oValueObject->getMontoContractualOriginal() .
            ", montoContractualFinal = " . $oValueObject->getMontoContractualFinal() .
            ", fechaTerminacionOriginal = '" . $oValueObject->getFechaTerminacionOriginal() .
            "', FechaTerminacionFinal = '" . $oValueObject->getFechaTerminacionFinal() .
            "', PlazoOriginal = '" . $oValueObject->getPlazoOriginal() .
            "', PlazoFinal = '" . $oValueObject->getPlazoFinal() .
            "', idPersoneria = " . $oValueObject->getIdPersoneria() .
            ", participacion = " . $oValueObject->getParticipacion() .
            ", ute = '" . $oValueObject->getUte() .
            "', observacion = '" . $oValueObject->getObservacion() .
            "', longitud = " . $oValueObject->getLongitud() .
            ", longitudMedida = " . $oValueObject->getLongitudMedida() .
            ", terraplenes = " . $oValueObject->getTerraplenes() .
            ", terraplenesMedida = " . $oValueObject->getTerraplenesMedida() .
            ", recubrimiento = " .$oValueObject->getRecubrimiento() .
            ", recubrimientoMedida = " . $oValueObject->getRecubrimientoMedida() .
            ", baseNoButuminosa = " .$oValueObject->getBaseNoButuminosa() .
            ", baseMedida = " . $oValueObject->getBaseMedida() .
            ", banquinaRipio = " . $oValueObject->getBanquinaRipio() .
            ", banquinaRipioMedida = " . $oValueObject->getBanquinaRipioMedida() .
            ", tratamientoTriple = " . $oValueObject->getTratamientoTriple() .
            ", tratamientoTripleMedida = " . $oValueObject->getTratamientoTripleMedida() .
            ", Hormigones  = " . $oValueObject->getHormigones() .
            ", HormigonesMedida = " . $oValueObject->getHormigonesMedida() .
            ", reforestacion = " . $oValueObject->getReforestacion() .
            ", reforestacionMedida = " . $oValueObject->getReforestacionMedida() .
            ", certEjecucion = '" . $oValueObject->getCertEjecucion() .
            "', rp = '" . $oValueObject->getRp() .
            "', rd = '" . $oValueObject->getRd() .
            "', ok = '" . $oValueObject->getOk() .
            "', fechaInicio = '" . $oValueObject->getFechaInicio() .
            "', fechaLicitacion = '" . $oValueObject->getFechaLicitacion() .
            "', fechaContrato = '" . $oValueObject->getFechaContrato() .
            "', fechaReplanteo = '" . $oValueObject->getFechaReplanteo() .
            "', financiada = '" . $oValueObject->getFinanciada() .
            "', comentario = '" . $oValueObject->getComentario() .
            "', fechaRP = '" . $oValueObject->getFechaRP() .
            "', fechaRD = '" . $oValueObject->getFechaRD() .
            "', kml = '" . $oValueObject->getKml() . "';";
        $resultado = mysql_query($sql);
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param ObrasEjecutadasValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "Delete from obrasejecutadas WHERE ID = " . $oValueObject->getID();
        if(mysql_query($sql)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param ObrasEjecutadasValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM obrasejecutadas";
        $sql .= " WHERE ID = ".$oValueObject->getID().";";
        $resultado = mysql_query($sql);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setBanquinaRipio($fila->banquinaRipio);
            $oValueObject->setBanquinaRipioMedida($fila->banquinaRipioMedida);
            $oValueObject->setBaseMedida($fila->baseMedida);
            $oValueObject->setBaseNoButuminosa($fila->baseNoButuminosa);
            $oValueObject->setCertEjecucion($fila->certEjecucion);
            $oValueObject->setComentario($fila->comentario);
            $oValueObject->setDenominacion($fila->denominacion);
            $oValueObject->setEnejec($fila->enejec);
            $oValueObject->setFechaContrato($fila->fechaContrato);
            $oValueObject->setFechaInicio($fila->fechaInicio);
            $oValueObject->setFechaLicitacion($fila->fechaLicitacion);
            $oValueObject->setFechaRD($fila->fechaRD);
            $oValueObject->setFechaRP($fila->fechaRP);
            $oValueObject->setFechaReplanteo($fila->fechaReplanteo);
            $oValueObject->setFechaTerminacionFinal($fila->FechaTerminacionFinal);
            $oValueObject->setFechaTerminacionOriginal($fila->fechaTerminacionOriginal);
            $oValueObject->setFinanciada($fila->financiada);
            $oValueObject->setHormigones($fila->Hormigones);
            $oValueObject->setHormigonesMedida($fila->HormigonesMedida);
            $oValueObject->setID($fila->ID);
            $oValueObject->setIdPersoneria($fila->idPersoneria);
            $oValueObject->setIdcomitente($fila->idcomitente);
            $oValueObject->setLongitud($fila->longitud);
            $oValueObject->setLongitudMedida($fila->longitudMedida);
            $oValueObject->setMontoContractualFinal($fila->montoContractualFinal);
            $oValueObject->setMontoContractualOriginal($fila->montoContractualOriginal);
            $oValueObject->setObservacion($fila->observacion);
            $oValueObject->setOk($fila->ok);
            $oValueObject->setParticipacion($fila->participacion);
            $oValueObject->setPlazoFinal($fila->PlazoFinal);
            $oValueObject->setPlazoOriginal($fila->PlazoOriginal);
            $oValueObject->setRd($fila->rd);
            $oValueObject->setRecubrimiento($fila->recubrimiento);
            $oValueObject->setRecubrimientoMedida($fila->recubrimientoMedida);
            $oValueObject->setReforestacion($fila->reforestacion);
            $oValueObject->setReforestacionMedida($fila->reforestacionMedida);
            $oValueObject->setRp($fila->rp);
            $oValueObject->setSeleccion($fila->Seleccion);
            $oValueObject->setTerraplenes($fila->terraplenes);
            $oValueObject->setTerraplenesMedida($fila->terraplenesMedida);
            $oValueObject->setTipoDeObra($fila->tipoDeObra);
            $oValueObject->setTratamientoTriple($fila->tratamientoTriple);
            $oValueObject->setTratamientoTripleMedida($fila->tratamientoTripleMedida);
            $oValueObject->setUte($fila->ute);
            $oValueObject->setKml($fila->kml);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }
    /**
     * 
     * @return \ObrasEjecutadasValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM obrasejecutadas;";
        $resultado = mysql_query($sql);
        if($resultado){
            $aObras = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oValueObject = new ObrasEjecutadasValueObject();
                $oValueObject->setBanquinaRipio($fila->banquinaRipio);
                $oValueObject->setBanquinaRipioMedida($fila->banquinaRipioMedida);
                $oValueObject->setBaseMedida($fila->baseMedida);
                $oValueObject->setBaseNoButuminosa($fila->baseNoButuminosa);
                $oValueObject->setCertEjecucion($fila->certEjecucion);
                $oValueObject->setComentario($fila->comentario);
                $oValueObject->setDenominacion($fila->denominacion);
                $oValueObject->setEnejec($fila->enejec);
                $oValueObject->setFechaContrato($fila->fechaContrato);
                $oValueObject->setFechaInicio($fila->fechaInicio);
                $oValueObject->setFechaLicitacion($fila->fechaLicitacion);
                $oValueObject->setFechaRD($fila->fechaRD);
                $oValueObject->setFechaRP($fila->fechaRP);
                $oValueObject->setFechaReplanteo($fila->fechaReplanteo);
                $oValueObject->setFechaTerminacionFinal($fila->FechaTerminacionFinal);
                $oValueObject->setFechaTerminacionOriginal($fila->fechaTerminacionOriginal);
                $oValueObject->setFinanciada($fila->financiada);
                $oValueObject->setHormigones($fila->Hormigones);
                $oValueObject->setHormigonesMedida($fila->HormigonesMedida);
                $oValueObject->setID($fila->ID);
                $oValueObject->setIdPersoneria($fila->idPersoneria);
                $oValueObject->setIdcomitente($fila->idcomitente);
                $oValueObject->setLongitud($fila->longitud);
                $oValueObject->setLongitudMedida($fila->longitudMedida);
                $oValueObject->setMontoContractualFinal($fila->montoContractualFinal);
                $oValueObject->setMontoContractualOriginal($fila->montoContractualOriginal);
                $oValueObject->setObservacion($fila->observacion);
                $oValueObject->setOk($fila->ok);
                $oValueObject->setParticipacion($fila->participacion);
                $oValueObject->setPlazoFinal($fila->PlazoFinal);
                $oValueObject->setPlazoOriginal($fila->PlazoOriginal);
                $oValueObject->setRd($fila->rd);
                $oValueObject->setRecubrimiento($fila->recubrimiento);
                $oValueObject->setRecubrimientoMedida($fila->recubrimientoMedida);
                $oValueObject->setReforestacion($fila->reforestacion);
                $oValueObject->setReforestacionMedida($fila->reforestacionMedida);
                $oValueObject->setRp($fila->rp);
                $oValueObject->setSeleccion($fila->Seleccion);
                $oValueObject->setTerraplenes($fila->terraplenes);
                $oValueObject->setTerraplenesMedida($fila->terraplenesMedida);
                $oValueObject->setTipoDeObra($fila->tipoDeObra);
                $oValueObject->setTratamientoTriple($fila->tratamientoTriple);
                $oValueObject->setTratamientoTripleMedida($fila->tratamientoTripleMedida);
                $oValueObject->setUte($fila->ute);
                $oValueObject->setKml($fila->kml);
                $aObras[] = $oValueObject;
                unset($oValueObject);
            }
            return $aObras;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return int
     */
    public function contar() {
        $sql = "SELECT count(*) FROM obrasejecutadas;";
        $resultado = mysql_query($sql);
        if($resultado){
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * 
     * @return int
     */
    public function buscarUltimo() {
        $sql = "SELECT MAX(id)+1 FROM obrasejecutadas;";
        $resultado = mysql_query($sql);
        if($resultado){
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * 
     * @param ObrasEjecutadasValueObject $oValueObject
     * @return int
     */
    public function existe($oValueObject) {
        $sql = "SELECT count(*) FROM obrasejecutadas WHERE ID = " . $oValueObject->getID(). ";";
        $resultado = mysql_query($sql);
        if($resultado){
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];
        } else {
            return 0;
        }
    }
    
    /**
     * 
     * @param ObrasEjecutadasValueObject $oValueObject
     * @return boolean
     */
    public function guardarDenominacion($oValueObject) {
        $sql = "SELECT id FROM obrasejecutadas WHERE denominacion = '"
                    . $oValueObject->getDenominacion() . "';";
        $resultado = mysql_query($sql) or die(mysql_error());
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            if($fila) {
                $oValueObject->setID($fila->id);
                return TRUE;
            }
        }
        $sql = "INSERT INTO obrasejecutadas (denominacion) VALUES('"
                . utf8_decode($oValueObject->getDenominacion()) ."')";
        $resultado = mysql_query($sql) or die(mysql_error());
        if($resultado){
            $sql = "SELECT id FROM obrasejecutadas WHERE denominacion = '"
                    . $oValueObject->getDenominacion() . "';";
            $resultado = mysql_query($sql) or die(mysql_error());
            if($resultado){
                $fila = mysql_fetch_object($resultado);
                $oValueObject->setID($fila->id);
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
    
    /**
     * Almacena el nombre de la obra, el identificador y el comitente de la misma.
     * @param ObrasEjecutadasValueObject $oValueObject
     * @return boolean
     */
    public function guardarNombre($oValueObject) {
        $sql = "INSERT INTO obrasejecutadas (id, denominacion, idcomitente) VALUES(" 
                . $oValueObject->getID() . ", '"
                . utf8_decode($oValueObject->getDenominacion()) ."', "
                . $oValueObject->getIdcomitente() .");";
        $resultado = mysql_query($sql);
//        or die(mysql_error());
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * 
     * @param ObrasEjecutadasValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO obrasejecutadas (";
        $sql .= "Seleccion, denominacion, enejec, idcomitente, tipoDeObra, 
            montoContractualOriginal, montoContractualFinal, fechaTerminacionOriginal, 
            FechaTerminacionFinal, PlazoOriginal, PlazoFinal, idPersoneria,
            participacion, ute, observacion, longitud, longitudMedida, terraplenes,
            terraplenesMedida, recubrimiento, recubrimientoMedida, baseNoButuminosa,
            baseMedida, banquinaRipio, banquinaRipioMedida, tratamientoTriple,
            tratamientoTripleMedida, Hormigones, HormigonesMedida, reforestacion,
            reforestacionMedida, certEjecucion, rp, rd, ok, fechaInicio, fechaLicitacion,
            fechaContrato, fechaReplanteo, financiada, comentario, fechaRP, fechaRD, kml";
        $sql .= ") VALUES(" .
//        $sql .= ") VALUES('" .
//            $oValueObject->getSeleccion() . "', '" .
            "0, '" .
            $oValueObject->getDenominacion() . "', '" .
//            $oValueObject->getEnejec() . "', " .
            "1', " .
            $oValueObject->getIdcomitente() . ", '" .
            $oValueObject->getTipoDeObra() . "', " .
            $oValueObject->getMontoContractualOriginal() . ", " .
            $oValueObject->getMontoContractualFinal() . ", '" .
            $oValueObject->getFechaTerminacionOriginal() . "', '" .
            $oValueObject->getFechaTerminacionFinal() . "', '" .
            $oValueObject->getPlazoOriginal() . "', '" .
            $oValueObject->getPlazoFinal() . "', " .
            $oValueObject->getIdPersoneria() . ", " .
            $oValueObject->getParticipacion() . ", '" .
            $oValueObject->getUte() . "', '" .
            $oValueObject->getObservacion() . "', " .
            $oValueObject->getLongitud() . ", " .
            $oValueObject->getLongitudMedida() . "1, " .
            $oValueObject->getTerraplenes() . ", " .
            $oValueObject->getTerraplenesMedida() . "1, " .
            $oValueObject->getRecubrimiento() . ", " .
            $oValueObject->getRecubrimientoMedida() . "1, " .
            $oValueObject->getBaseNoButuminosa() . ", " .
            $oValueObject->getBaseMedida() . "1, " .
            $oValueObject->getBanquinaRipio() . ", " .
            $oValueObject->getBanquinaRipioMedida() . "1, " .
            $oValueObject->getTratamientoTriple() . ", " .
            $oValueObject->getTratamientoTripleMedida() . "1, " .
            $oValueObject->getHormigones() . ", " .
            $oValueObject->getHormigonesMedida() . "1, " .
            $oValueObject->getReforestacion() . ", " .
            $oValueObject->getReforestacionMedida() . "1, '" .
            $oValueObject->getCertEjecucion() . "1', " .
            $oValueObject->getRp() . "0, " .
            $oValueObject->getRd() . "0, " .
            $oValueObject->getOk() . "0, '" .
            $oValueObject->getFechaInicio() . "', '" .
            $oValueObject->getFechaLicitacion() . "', '" .
            $oValueObject->getFechaContrato() . "', '" .
            $oValueObject->getFechaReplanteo() . "', '" .
            $oValueObject->getFinanciada() . "', '" .
            $oValueObject->getComentario() . "', '" .
            $oValueObject->getFechaRP() . "', '" .
            $oValueObject->getFechaRD() . "', '" .
            $oValueObject->getKml() . "'";
        $sql .= ");";
        $resultado = mysql_query($sql) or die(mysql_error());
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}