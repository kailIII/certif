<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/ExpHistoriaValueObject.php';
/**
 * Description of ExpHistoriaActiveRecord
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

    public function buscar($oValueObject) {
        
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