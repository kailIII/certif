<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/ActualizacionesValueObject.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MysqlActualizacionesActiveRecord
 *
 * @author Martin
 */
class MysqlActualizacionesActiveRecord implements ActiveRecord{
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
     * @param ActualizacionesValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO actualizaciones (fecha, identificador) VALUES('";
        $sql .= $oValueObject->getFecha()."', '";
        $sql .= $oValueObject->getIdentificador()."');";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
