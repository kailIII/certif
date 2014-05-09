<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/PersoneriaValueObject.php';

/**
 * Description of MysqlPersoneriaActiveRecord
 *
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class MysqlPersoneriaActiveRecord implements ActiveRecord{
    /**
     * 
     * @param PersoneriaValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE personeria SET ";
        $sql .= "descripcion = '" . $oValueObject->getDescripcion() . "' ";
        $sql .= "WHERE id = " . $oValueObject->getId();
        if(mysql_query($sql)) return TRUE;
        else return FALSE;
    }

    /**
     * 
     * @param PersoneriaValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM personeria ";
        $sql .= "WHERE id = " . $oValueObject->getId();
        if(mysql_query($sql)) return TRUE;
        else return FALSE;
    }

    /**
     * 
     * @param PersoneriaValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM personeria ";
        $sql .= "WHERE id = " . $oValueObject->getId();
        $resultado = mysql_query($sql);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setDescripcion($fila->descripcion);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Busca todos los personeria.
     * @return \PersoneriaValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM personeria ";
        $resultado = mysql_query($sql);
        if($resultado){
            $aPersoneria = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oPersoneria = new PersoneriaValueObject();
                $oPersoneria->setDescripcion($fila->descripcion);
                $oPersoneria->setId($fila->id);
                $aPersoneria[] = $oPersoneria;
                unset($oPersoneria);
            }
            return $aPersoneria;
        } else {
            return FALSE;
        }
    }

    /**
     * Comtabiliza la cantidad de personeria.
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM personeria;";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * Controla la existencia de un personeria.
     * @param PersoneriaValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM personeria ";
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
     * Almacena en los datos en la base personeria.
     * @param PersoneriaValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO personeria (descripcion) VALUES('";
        $sql .= $oValueObject->getDescripcion()."');";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>