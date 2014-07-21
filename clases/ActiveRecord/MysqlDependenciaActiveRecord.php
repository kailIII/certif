<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/DependenciaValueObject.php';

/**
 * Description of MysqlDependenciaActiveRecord
 *
 * @author Martin
 */
class MysqlDependenciaActiveRecord implements ActiveRecord{
    /**
     * 
     * @param DependenciaValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $oPrueba = new DependenciaValueObject();
        $oMysqlDependencia = new MysqlDependenciaActiveRecord();
        $orden = $oValueObject->getOrden();
        $dias = $oValueObject->getDias();
        $dependencia = $oValueObject->getDependencia();

        $oValueObject = $oMysqlDependencia->buscar($oValueObject);
        if($orden !=  $oValueObject->getOrden()){
            $sql ="UPDATE dependencia "
                    . "SET orden = orden + 1 "
//                    . "WHERE orden >= " . $orden . ";";
                    . "WHERE orden BETWEEN " . $orden ." AND "
                    . $oValueObject->getOrden(). ";";
            mysql_query($sql) or die(FALSE);
        }
        $sql = "UPDATE dependencia SET dependencia = '" . utf8_encode($dependencia)
                . "', dias = " . $dias
                . ", orden = " . $orden
                . " WHERE iddependencia = " . $oValueObject->getIddependencia() .";";
        $resultado = mysql_query($sql);
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function borrar($oValueObject) {
        
    }
    
    /**
    * 
    * @param DependenciaValueObject $oValueObject
    * @return boolean
    */
    public function buscar($oValueObject) {
        $sql ="SELECT iddependencia, dependencia, dias, orden FROM dependencia "
                . " WHERE iddependencia = " . $oValueObject->getIddependencia() .";";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_object($resultado);
        if($resultado){
            $oValueObject->setIddependencia($resultado->iddependencia);
            $oValueObject->setDias($resultado->dias);
            $oValueObject->setDependencia($resultado->dependencia);
            $oValueObject->setOrden($resultado->orden);
            return $oValueObject;
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
        $sql ="SELECT iddependencia, dependencia, dias, orden FROM dependencia "
                . " WHERE dependencia = '" . $oValueObject->getDependencia() ."';";
        
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_object($resultado);
        if($resultado){
            $oValueObject->setIddependencia($resultado->iddependencia);
            $oValueObject->setDias($resultado->dias);
            $oValueObject->setDependencia($resultado->dependencia);
            $oValueObject->setOrden($resultado->orden);
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
   /**
    * 
    * @return boolean
    */
    public function buscarTodo() {
        $sql = 'SELECT * FROM dependencia ORDER BY orden;';
        $resultado = mysql_query($sql);
        if($resultado){
            $aDependencia = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oValueObject = new DependenciaValueObject();
                $oValueObject->setIddependencia($fila->iddependencia);
                $oValueObject->setDias($fila->dias);
                $oValueObject->setDependencia($fila->dependencia);
                $oValueObject->setOrden($fila->orden);
                $aDependencia[] = $oValueObject;
                unset($oValueObject);
            }
            return $aDependencia;
        } else {
            return false;
        }
    }
    
   /**
    * 
    * @return boolean
    */
    public function buscarOrden() {
        $sql = 'SELECT MAX(orden)+1 as orden FROM dependencia;';
        $resultado = mysql_query($sql);
        if($resultado){
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];
        } else {
            return 0;
        }
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
        $sql ="SELECT iddependencia, dependencia, dias, orden FROM dependencia "
                . " WHERE dependencia = '" . $oValueObject->getDependencia() ."';";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_object($resultado);
        if($resultado){
            $oValueObject->setIddependencia($resultado->iddependencia);
            $oValueObject->setDias($resultado->dias);
            $oValueObject->setOrden($resultado->orden);
            return TRUE;
        } else {
            if($oValueObject->getOrden()!=''){
                   $sql = "INSERT INTO dependencia (dependencia, dias, orden) VALUES ("
                    . "'" . $oValueObject->getDependencia() . "', "
                    . $oValueObject->getDias() . ", "
                    . $oValueObject->getOrden() .");";
            } else {
                $sql = "INSERT INTO dependencia (dependencia, dias) VALUES ("
                    . "'" . $oValueObject->getDependencia() . "', "
//                    . "7);";
                    . $oValueObject->getDias() .")";
            }
            if(mysql_query($sql)){
                $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM expediente");
                $id = mysql_fetch_array($result);
                if($id[0]<>0) {
                    $oValueObject->setIddependencia($id[0]);
                }
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
}