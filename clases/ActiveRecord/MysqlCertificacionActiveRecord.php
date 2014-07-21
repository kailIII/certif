<?php
include_once '../clases/ActiveRecord/activeRecordInterface.php';
include_once '../clases/ValueObject/CertificacionValueObject.php';
/**
 * Description of MysqlCertificacionActiveRecord
 *
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */

class MysqlCertificacionActiveRecord implements ActiveRecord {
    /**
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE certificacion SET";
        $sql .= " idObra = " . $oValueObject->getIdObra();
        $sql .= ", certNro = '" .$oValueObject->getCertNro();
        $sql .= "', idTipo = " . $oValueObject->getIdTipo();
        $sql .= ", mes = '" . $oValueObject->getMes() . "'";
        $sql .= ", periodo = '" . $oValueObject->getPeriodo() . "'";
        $sql .= ", importeBasico = " . $oValueObject->getImporteBasico();
        $sql .= ", importeRedeterminado = " . $oValueObject->getImporteRedeterminado();
        $sql .= ", fondoReparo = " . $oValueObject->getFondoReparo();
        $sql .= ", anticipoFinanciero = " . $oValueObject->getAnticipoFinanciero();
        $sql .= ", otrosDescuentos = " . $oValueObject->getOtrosDescuentos();
        $sql .= ", aCobrar = " . $oValueObject->getACobrar();
        $sql .= ", comentario = '" . $oValueObject->getComentario() . "'";
        $sql .= ", fecha = '" . $oValueObject->setFecha() . "'";
        $sql .= ", participacion = " . $oValueObject->getParticipacion();
        $sql .= ", imagen = '" . $oValueObject->getImagen() . "'";
        $sql .= ", fechaFirma = '" . $oValueObject->getFechaFirma() . "'";
        $sql .= " WHERE id = " . $oValueObject->getId() . ";";
        if(mysql_query($sql)) return TRUE;
        else return FALSE;
    }

    /**
     * 
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM certificacion WHERE id = " . $oValueObject->getID();
        if(mysql_query($sql)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     * Busca Por Id del Certificado.
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM certificacion";
        $sql .= " WHERE ID = ".$oValueObject->getId().";";
        $resultado = mysql_query($sql);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setId($fila->id);
            $oValueObject->setIdObra($fila->idObra);
            $oValueObject->setCertNro($fila->certNro);
            $oValueObject->setIdTipo($fila->idTipo);
            $oValueObject->setMes($fila->mes);
            $oValueObject->setPeriodo($fila->periodo);
            $oValueObject->setImporteBasico($fila->importeBasico);
            $oValueObject->setImporteRedeterminado($fila->importeRedeterminado);
            $oValueObject->setFondoReparo($fila->fondoReparo);
            $oValueObject->setAnticipoFinanciero($fila->anticipoFinanciero);
            $oValueObject->setOtrosDescuentos($fila->otrosDescuentos);
            $oValueObject->setACobrar($fila->aCobrar);
            $oValueObject->setComentario($fila->comentario);
            $oValueObject->setFecha($fila->fecha);
            $oValueObject->setParticipacion($fila->participacion);
            $oValueObject->setImagen($fila->imagen);
            $oValueObject->setFechaFirma($fila->fechaFirma);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }
    
    /**
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     * Busca Por Id del Certificado.
     */
    public function buscarPorCertNro($oValueObject) {
        $sql = "SELECT * FROM certificacion";
        $sql .= " WHERE certNro = '".$oValueObject->getCertNro()."';";
        $resultado = mysql_query($sql);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setId($fila->id);
            $oValueObject->setIdObra($fila->idObra);
            $oValueObject->setCertNro($fila->certNro);
            $oValueObject->setIdTipo($fila->idTipo);
            $oValueObject->setMes($fila->mes);
            $oValueObject->setPeriodo($fila->periodo);
            $oValueObject->setImporteBasico($fila->importeBasico);
            $oValueObject->setImporteRedeterminado($fila->importeRedeterminado);
            $oValueObject->setFondoReparo($fila->fondoReparo);
            $oValueObject->setAnticipoFinanciero($fila->anticipoFinanciero);
            $oValueObject->setOtrosDescuentos($fila->otrosDescuentos);
            $oValueObject->setACobrar($fila->aCobrar);
            $oValueObject->setComentario($fila->comentario);
            $oValueObject->setFecha($fila->fecha);
            $oValueObject->setParticipacion($fila->participacion);
            $oValueObject->setImagen($fila->imagen);
            $oValueObject->setFechaFirma($fila->fechaFirma);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }
    
    /**
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     * Busca Por Id de la Obra.
     */
    public function buscarObra($oValueObject) {
        $sql = "SELECT * FROM certificacion";
        $sql .= " WHERE idObra = ".$oValueObject->getIdObra().";";
        $resultado = mysql_query($sql);
        if($resultado){
            $aCertificacion = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oValueObject = new CertificacionValueObject();
                $oValueObject->setId($fila->id);
                $oValueObject->setIdObra($fila->idObra);
                $oValueObject->setCertNro($fila->certNro);
                $oValueObject->setIdTipo($fila->idTipo);
                $oValueObject->setMes($fila->mes);
                $oValueObject->setPeriodo($fila->periodo);
                $oValueObject->setImporteBasico($fila->importeBasico);
                $oValueObject->setImporteRedeterminado($fila->importeRedeterminado);
                $oValueObject->setFondoReparo($fila->fondoReparo);
                $oValueObject->setAnticipoFinanciero($fila->anticipoFinanciero);
                $oValueObject->setOtrosDescuentos($fila->otrosDescuentos);
                $oValueObject->setACobrar($fila->aCobrar);
                $oValueObject->setComentario($fila->comentario);
                $oValueObject->setFecha($fila->fecha);
                $oValueObject->setParticipacion($fila->participacion);
                $oValueObject->setImagen($fila->imagen);
                $oValueObject->setFechaFirma($fila->fechaFirma);
                $aCertificacion[] = $oValueObject;
                unset($oValueObject);
                }
                return $aCertificacion;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM certificacion;";
        $resultado = mysql_query($sql);
        if($resultado){
            $aCertificacion = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oValueObject = new CertificacionValueObject();
                $oValueObject->setId($fila->id);
                $oValueObject->setIdObra($fila->idObra);
                $oValueObject->setCertNro($fila->certNro);
                $oValueObject->setIdTipo($fila->idTipo);
                $oValueObject->setMes($fila->mes);
                $oValueObject->setPeriodo($fila->periodo);
                $oValueObject->setImporteBasico($fila->importeBasico);
                $oValueObject->setImporteRedeterminado($fila->importeRedeterminado);
                $oValueObject->setFondoReparo($fila->fondoReparo);
                $oValueObject->setAnticipoFinanciero($fila->anticipoFinanciero);
                $oValueObject->setOtrosDescuentos($fila->otrosDescuentos);
                $oValueObject->setACobrar($fila->aCobrar);
                $oValueObject->setComentario($fila->comentario);
                $oValueObject->setFecha($fila->fecha);
                $oValueObject->setParticipacion($fila->participacion);
                $oValueObject->setImagen($fila->imagen);
                $oValueObject->setFechaFirma($fila->fechaFirma);
                $aCertificacion[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCertificacion;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM certificacion;";
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
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM certificacion ";
        $sql .= " WHERE id= ".$oValueObject->getId().";";
        $resultado = mysql_query($sql);
        if($resultado){
            $resultado = mysql_fetch_row($resultado);
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * 
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     */
    public function existeObra($oValueObject) {
        $sql = "SELECT COUNT(*) FROM certificacion ";
        $sql .= " WHERE idObra= ".$oValueObject->getIdObra().";";
        $resultado = mysql_query($sql);
        if($resultado){
            $resultado = mysql_fetch_row($resultado);
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * 
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO certificacion (";
        $sql .= "idObra, certNro, idTipo, mes, periodo, importeBasico, importeRedeterminado,
            fondoReparo, anticipoFinanciero, otrosDescuentos, aCobrar, comentario,
            fecha, participacion, imagen, fechaFirma) VALUES(";
        $sql .= $oValueObject->getIdObra();
        $sql .= ", '" .$oValueObject->getCertNro();
        $sql .= "', " . $oValueObject->getIdTipo();
        $sql .= ", '" . $oValueObject->getMes() . "'";
        $sql .= ", '" . $oValueObject->getPeriodo() . "'";
        $sql .= ", 0";
//        $sql .= ", " . $oValueObject->getImporteBasico();
        $sql .= ", " . $oValueObject->getImporteRedeterminado();
        $sql .= ", " . $oValueObject->getFondoReparo();
        $sql .= ", " . $oValueObject->getAnticipoFinanciero();
        $sql .= ", " . $oValueObject->getOtrosDescuentos();
        $sql .= ", " . $oValueObject->getACobrar();
        $sql .= ", '" . $oValueObject->getComentario() . "'";
        $sql .= ", '" . $oValueObject->getFecha() . "'";
        $sql .= ", " . $oValueObject->getParticipacion();
        $sql .= ", '" . $oValueObject->getImagen() . "'";
        $sql .= ", '" . $oValueObject->getFechaFirma() . "');";
//        $resultado = mysql_query($sql) or die(mysql_error());
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $sql = "SELECT id FROM certificacion WHERE idObra = '"
                    . $oValueObject->getIdObra() . "';";
//            $resultado = mysql_query($sql) or die(mysql_error());
            $resultado = mysql_query($sql) or die(false);
            if($resultado){
                $fila = mysql_fetch_object($resultado);
                $oValueObject->setId($fila->id);
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
    
    /**
     * 
     * @param CertificacionValueObject $oValueObject
     * @return boolean
     */
    public function guardarSolo($oValueObject) {
        $sql = "INSERT INTO certificacion (";
        $sql .= "idObra) VALUES(" . $oValueObject->getIdObra() . ");";
        $resultado = mysql_query($sql) or die(mysql_error());
        if($resultado){
            $sql = "SELECT id FROM certificacion WHERE idObra = '"
                    . $oValueObject->getIdObra() . "';";
            $resultado = mysql_query($sql) or die(mysql_error());
            if($resultado){
                $fila = mysql_fetch_object($resultado);
                $oValueObject->setId($fila->id);
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
}