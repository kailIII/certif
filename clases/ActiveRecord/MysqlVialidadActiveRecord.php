<?php
include_once 'ActiveRecordAbstractFactory.php';
include_once '../clases/ValueObject/VialidadValueObject.php';
/**
 * Description of MysqlVialidadActiveRecord
 *
 * @author Martin
 */
class MysqlVialidadActiveRecord implements ActiveRecord {
    /**
     * @param VialidadValueObject $oValueObject
     */
    public function actualizar($oValueObject) {
        
    }

    /**
     * @param VialidadValueObject $oValueObject
     */
    public function borrar($oValueObject) {
        
    }

    /**
     * @param VialidadValueObject $oValueObject
     */
    public function buscar($oValueObject) {
        
    }

    public function buscarTodo() {
        
    }

    public function contar() {
        
    }

    /**
     * @param VialidadValueObject $oValueObject
     */
    public function existe($oValueObject) {
        
    }

    /**
     * @param VialidadValueObject $oValueObject
     */
    public function guardar($oValueObject) {
        /* Primero compruebo que el dato no exista en la base. */
        $sql ="SELECT COUNT(*) FROM vialidad "
                . " WHERE identificador = '" . $oValueObject->getIdentificador() ."'"
                . " AND fechaalta = '". $oValueObject->getFechaalta() . "';";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_array($resultado);
        if($resultado[0] > 0){
            return TRUE;
        } else {
            $sql = "INSERT INTO vialidad (identificador, tipotramite, tema, "
                    . "fechaalta, extracto, estado, organismoa, dependenciaa, "
                    . "organismod, dependenciad, conformado, idexpediente) VALUES ('"
                    . $oValueObject->getIdentificador() . "', '"
                    . $oValueObject->getTipotramite() . "', '"
                    . $oValueObject->getTema() . "', '"
                    . $oValueObject->getFechaalta() . "', '"
                    . $oValueObject->getExtracto() . "', '"
                    . $oValueObject->getEstado() . "', '"
                    . $oValueObject->getOrganismoa() . "', '"
                    . $oValueObject->getDependenciaa() . "', '"
                    . $oValueObject->getOrganismod() . "', '"
                    . $oValueObject->getDependenciad() . "', '"
                    . $oValueObject->getConformado() . "', "
                    . $oValueObject->getIdexpediente()
                    . ");";
            echo $sql;
            if(mysql_query($sql)){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
}