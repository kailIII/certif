<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/DependenciaValueObject.php';

/**
 * Description of MysqlDependenciaActiveRecord
 *
 * @author Martin
 */
class MysqlDependenciaActiveRecord implements ActiveRecord{
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
     * @param DependenciaValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        /* Antes de guardar los datos debo de fijarme si existe en la tabla.
         *  Si existe busco el iddependencia para devolverlo,
         * Si no existe lo almaceno y devuelvo el iddependencia correspondiente.
         */
        $sql = "INSERT INTO dependencia (dependencia, dias) VALUES ("
                . "'" . $oValueObject->getDependencia() . "', "
                . $oValueObject->getDias() .")";
        if(mysql_query($sql)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}