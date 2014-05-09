<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/ExpedienteValueObject.php';
/**
 * Description of MysqlExpedienteActiveRecord
 *
 * @author Martin
 */
class MysqlExpedienteActiveRecord implements ActiveRecord {
    /**
     * 
     * @param ExpedienteValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE expediente SET idCertificacion = " . $oValueObject->getIdCertificacion();
        $sql.= ", certDpv = '" . $oValueObject->getCertDpv() . "'";
        $sql.= ", certDnv = '" . $oValueObject->getCertDnv() . "'";
        $sql.= ", expDpv = '" . $oValueObject->getExpDpv() . "'";
        $sql.= ", expDnv = '" . $oValueObject->getExpDnv() . "'"
                . ", mes = '" . $oValueObject->getMes() . "'"
                . ", dependencia = " . $oValueObject->getDependencia()
                . ", comentario = '" . $oValueObject->getComentario() . "'"
                . ", importe = '" . $oValueObject->getImporte() . "'"
                . ", vencimiento = '" . $oValueObject->getVencimiento() . "'"
                . ", cedido = '" . $oValueObject->getCedido() . "'"
                . ", finalizado = '" . $oValueObject->getFinalizado() . "'";
        $sql.= " WHERE idExpediente = " . $oValueObject->getIdexpediente();
        if(mysql_query($sql)){
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * 
     * @param ExpedienteValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        return $oValueObject;
    }

    /**
     * 
     * @param ExpedienteValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        return $oValueObject;
    }

    /**
     * 
     * @param ExpedienteValueObject $oValueObject
     * @return boolean
     */
    public function buscarPorCertificacion($oValueObject) {
        $sql = "SELECT * FROM expediente WHERE idCertificacion = " 
                . $oValueObject->getIdCertificacion();
        $resultado = mysql_query($sql);
        if($resultado){
            $aExpediente = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oExpediente = new ExpedienteValueObject();
                $oExpediente->setIdexpediente($fila->idexpediente);
                $oExpediente->setIdCertificacion($fila->idCertificacion);
                $oExpediente->setCertDpv($fila->certDpv);
                $oExpediente->setCertDnv($fila->certDnv);
                $oExpediente->setExpDpv($fila->expDpv);
                $oExpediente->setExpDnv($fila->expDnv);
                $oExpediente->setMes($fila->mes);
                $oExpediente->setDependencia($fila->dependencia);
                $oExpediente->setComentario($fila->comentario);
                $oExpediente->setImporte($fila->importe);
                $oExpediente->setVencimiento($fila->vencimiento);
                $oExpediente->setCedido($fila->cedido);
                $aExpediente[] = $oExpediente;
                unset($oExpediente);
            }
            return $aExpediente;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param ExpedienteValueObject $oValueObject
     * @return boolean
     */
    public function buscarPorExpediente($oValueObject) {
        $sql = "SELECT * FROM expediente WHERE idexpediente = " 
                . $oValueObject->getIdexpediente();
        $resultado = mysql_query($sql);
        if($resultado){
            $aExpediente = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oExpediente = new ExpedienteValueObject();
                $oExpediente->setIdexpediente($fila->idexpediente);
                $oExpediente->setIdCertificacion($fila->idCertificacion);
                $oExpediente->setCertDpv($fila->certDpv);
                $oExpediente->setCertDnv($fila->certDnv);
                $oExpediente->setExpDpv($fila->expDpv);
                $oExpediente->setExpDnv($fila->expDnv);
                $oExpediente->setMes($fila->mes);
                $oExpediente->setDependencia($fila->dependencia);
                $oExpediente->setComentario($fila->comentario);
                $oExpediente->setImporte($fila->importe);
                $oExpediente->setVencimiento($fila->vencimiento);
                $oExpediente->setCedido($fila->cedido);
                $aExpediente[] = $oExpediente;
                unset($oExpediente);
            }
            return $aExpediente;
        } else {
            return false;
        }
    }

    /**
     * El buscarTodo debería de traer las ultimas actualizaciones para los
     * expedientes cargados.
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM expediente;";
        $resultado = mysql_query($sql);
        if($resultado){
            $aExpediente = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oExpediente = new ExpedienteValueObject();
                $oExpediente->setIdexpediente($fila->idexpediente);
                $oExpediente->setIdCertificacion($fila->idCertificacion);
                $oExpediente->setCertDpv($fila->certDpv);
                $oExpediente->setCertDnv($fila->certDnv);
                $oExpediente->setExpDpv($fila->expDpv);
                $oExpediente->setExpDnv($fila->expDnv);
                $oExpediente->setMes($fila->mes);
                $oExpediente->setDependencia($fila->dependencia);
                $oExpediente->setComentario($fila->comentario);
                $oExpediente->setImporte($fila->importe);
                $oExpediente->setVencimiento($fila->vencimiento);
                $oExpediente->setCedido($fila->cedido);
                $aExpediente[] = $oExpediente;
                unset($oExpediente);
            }
            return $aExpediente;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @return boolean|\ExpedienteValueObject
     */
    public function buscarIdCertificaciones() {
        $sql = "SELECT DISTINCT(idCertificacion) FROM expediente WHERE finalizado = 'N';";
        $resultado = mysql_query($sql);
        if($resultado){
            $aExpediente = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oExpediente = new ExpedienteValueObject();
                $oExpediente->setIdCertificacion($fila->idCertificacion);
                $aExpediente[] = $oExpediente;
                unset($oExpediente);
            }
            return $aExpediente;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @return boolean|\ExpedienteValueObject
     */
//    public function buscarIdExpedientes($lista) {
    public function buscarIdExpedientes() {
//        $sql = "SELECT DISTINCT(idexpediente) FROM expediente WHERE "
//                . "finalizado = 'N' AND idCertificacion IN(".$lista.");";
        $sql = "SELECT DISTINCT(idexpediente) "
                . "FROM expediente "
                . "WHERE EXISTS ("
                . "SELECT DISTINCT(idCertificacion) "
                . "FROM expediente WHERE finalizado = 'N');";
        
        $resultado = mysql_query($sql);
        if($resultado){
            $aExpediente = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oExpediente = new ExpedienteValueObject();
                $oExpediente->setIdexpediente($fila->idexpediente);
                $aExpediente[] = $oExpediente;
                unset($oExpediente);
            }
            return $aExpediente;
        } else {
            return false;
        }
    }
    
    /**
     * El buscarTodo debería de traer las ultimas actualizaciones para los
     * expedientes cargados.
     */
    public function buscarUltimos() {
        $sql = "SELECT * FROM expediente "
                . "WHERE idexpediente IN"
                . "(SELECT max(idExpediente) FROM expediente group by idCertificacion);";
        $resultado = mysql_query($sql);
        if($resultado){
            $aExpediente = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oExpediente = new ExpedienteValueObject();
                $oExpediente->setIdexpediente($fila->idexpediente);
                $oExpediente->setIdCertificacion($fila->idCertificacion);
                $oExpediente->setCertDpv($fila->certDpv);
                $oExpediente->setCertDnv($fila->certDnv);
                $oExpediente->setExpDpv($fila->expDpv);
                $oExpediente->setExpDnv($fila->expDnv);
                $oExpediente->setMes($fila->mes);
                $oExpediente->setDependencia($fila->dependencia);
                $oExpediente->setComentario($fila->comentario);
                $oExpediente->setImporte($fila->importe);
                $oExpediente->setVencimiento($fila->vencimiento);
                $oExpediente->setCedido($fila->cedido);
                $aExpediente[] = $oExpediente;
                unset($oExpediente);
            }
            return $aExpediente;
        } else {
            return false;
        }
    }

    public function contar() {
        
    }

    public function existe($oValueObject) {
        
    }

    /**
     * 
     * @param ExpedienteValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO expediente (idCertificacion, certDpv, certDnv, expDpv,";
        $sql.= " expDnv, mes, dependencia, comentario, importe, vencimiento, cedido)";
        $sql.= " VALUE(" . $oValueObject->getIdCertificacion() ;
        $sql.= ", '" . $oValueObject->getCertDpv() . "'";
        $sql.= ", '" . $oValueObject->getCertDnv() . "'";
        $sql.= ", '" . $oValueObject->getExpDpv() . "'";
        $sql.= ", '" . $oValueObject->getExpDnv() . "'";
        $sql.= ", '" . $oValueObject->getMes() . "'";
        $sql.= ", '" . $oValueObject->getDependencia() . "'";
        $sql.= ", '" . $oValueObject->getComentario() . "'";
        $sql.= ", '" . $oValueObject->getImporte() . "'";
        $sql.= ", '" . $oValueObject->getVencimiento() . "'";
        $sql.= ", '" . $oValueObject->getCedido() . "'";
        $sql.=");";
        $resultado = mysql_query($sql) or die(mysql_error());
        if($resultado){
            $sql = "SELECT idexpediente FROM expediente WHERE idCertificacion = '"
                    . $oValueObject->getIdCertificacion() . "';";
            $resultado = mysql_query($sql) or die(mysql_error());
            if($resultado){
                $fila = mysql_fetch_object($resultado);
                $oValueObject->setIdexpediente($fila->idexpediente);
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
}