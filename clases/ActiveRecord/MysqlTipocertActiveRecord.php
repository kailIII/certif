<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/TipocertValueObject.php';

/**
 * Description of MysqlTipocertActiveRecord
 *
 * @author ssrolanr
 */
class MysqlTipocertActiveRecord implements ActiveRecord{
    /**
     * 
     * @param TipocertValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE tipocert SET ";
        $sql .= "descripcion = '" . $oValueObject->getDescripcion() . "' ";
        $sql .= "WHERE id = " . $oValueObject->getId();
        if(mysql_query($sql)) return TRUE;
        else return FALSE;
    }

    /**
     * 
     * @param TipocertValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM tipocert ";
        $sql .= "WHERE id = " . $oValueObject->getId();
        if(mysql_query($sql)) return TRUE;
        else return FALSE;
    }

    /**
     * 
     * @param TipocertValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM tipocert ";
        $sql .= "WHERE id = " . $oValueObject->getId();
        $resultado = mysql_query($sql);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setId($fila->id);
            $oValueObject->setDescripcion($fila->descripcion);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    /**
     * Busca todos los tipocert.
     * @return \TipocertValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM tipocert ";
        $resultado = mysql_query($sql);
        if($resultado){
            $aTipocert = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oTipocert = new TipocertValueObject();
                $oTipocert->setDescripcion($fila->descripcion);
                $oTipocert->setId($fila->id);
                $aTipocert[] = $oTipocert;
                unset($oTipocert);
            }
            return $aTipocert;
        } else {
            return FALSE;
        }
    }

    /**
     * Comtabiliza la cantidad de tipocert.
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM tipocert;";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * Controla la existencia de un tipocert.
     * @param TipocertValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM tipocert ";
        $sql .= "WHERE id = " . $oValueObject->getId() . ";";
        $resultado = mysql_query($sql);
        $resultado_ = mysql_fetch_row($resultado);
        if ($resultado_[0] > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Almacena en los datos en la base tipocert.
     * @param TipocertValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO tipocert (descripcion) VALUES('";
        $sql .= $oValueObject->getDescripcion()."');";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>