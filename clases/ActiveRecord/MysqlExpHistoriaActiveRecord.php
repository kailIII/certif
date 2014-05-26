<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/ExpHistoriaValueObject.php';
/**
 * Description of MysqlExpHistoriaActiveRecord
 *
 * @author Martin
 */
class MysqlExpHistoriaActiveRecord implements ActiveRecord {
    /**
     * 
     * @param ExpHistoriaValueObject $oValueObject
     */
    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param ExpHistoriaValueObject $oValueObject
     * @return boolean|\ExpHistoriaValueObject
     */
    public function buscar($oValueObject) {
//        $sql = "SELECT idexpediente, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha, dependencia, comentario "
        $sql = "SELECT idexpediente, DATE_FORMAT(fecha, '%Y-%m-%d') as fecha, dependencia, comentario "
                . "FROM exphistoria WHERE idexpediente = " 
                . $oValueObject->getIdexpediente()
                . " ORDER BY fecha DESC;";
        $resultado = mysql_query($sql);
        if($resultado){
            $aExpediente = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oExpediente = new ExpHistoriaValueObject();
                $oExpediente->setIdexpediente($fila->idexpediente);
                $oExpediente->setFecha($fila->fecha);
                $oExpediente->setDependencia($fila->dependencia);
                $oExpediente->setComentario($fila->comentario);
                $aExpediente[] = $oExpediente;
                unset($oExpediente);
            }
            return $aExpediente;
        } else {
            return false;
        }
    }

    public function buscarTodo() {
        
    }

    public function contar() {
        
    }

    public function existe($oValueObject) {
        
    }

    /**
     * 
     * @param ExpHistoriaValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO exphistoria (idexpediente, fecha, "
                . "dependencia, comentario) "
                . "VALUES(" .$oValueObject->getIdexpediente() .", "
                . "'" . $oValueObject->getFecha() . "', "
                . "'" . $oValueObject->getDependencia() . "', "
                . "'" . $oValueObject->getComentario() . "'"
                . ")";
        if(mysql_query($sql)){
            return TRUE;
        } else {
            return FALSE;
        }
    }   
}