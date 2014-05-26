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
    
    /**
    * 
    * @param DependenciaValueObject $oValueObject
    * @return boolean
    */
    public function buscar($oValueObject) {
        $sql ="SELECT iddependencia, dependencia, dias FROM dependencia "
                . " WHERE iddependencia = " . $oValueObject->getIddependencia() .";";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_object($resultado);
        if($resultado){
            $oValueObject->setIddependencia($resultado->iddependencia);
            $oValueObject->setDias($resultado->dias);
            $oValueObject->setDependencia($resultado->dependencia);
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
    * 
    * @param DependenciaValueObject $oValueObject
    * @return boolean
    */
    public function buscarDependencia($oValueObject) {
        $sql ="SELECT iddependencia, dependencia, dias FROM dependencia "
                . " WHERE dependencia = '" . $oValueObject->getDependencia() ."';";
        
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_object($resultado);
        if($resultado){
            $oValueObject->setIddependencia($resultado->iddependencia);
            $oValueObject->setDias($resultado->dias);
            $oValueObject->setDependencia($resultado->dependencia);
            return TRUE;
        } else {
            return FALSE;
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
     * @param DependenciaValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        /* Antes de guardar los datos debo de fijarme si existe en la tabla.
         *  Si existe busco el iddependencia para devolverlo,
         * Si no existe lo almaceno y devuelvo el iddependencia correspondiente.
         */
        
        /* Primero compruebo que el dato no exista en la base. */
        $sql ="SELECT iddependencia, dependencia, dias FROM dependencia "
                . " WHERE dependencia = '" . $oValueObject->getDependencia() ."';";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_object($resultado);
        if($resultado){
            $oValueObject->setIddependencia($resultado->iddependencia);
            $oValueObject->setDias($resultado->dias);
            return TRUE;
        } else {
            $sql = "INSERT INTO dependencia (dependencia, dias) VALUES ("
                . "'" . $oValueObject->getDependencia() . "', "
                . "7);";
//                . $oValueObject->getDias() .")";
            if(mysql_query($sql)){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
}