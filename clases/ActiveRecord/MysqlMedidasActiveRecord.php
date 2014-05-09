<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/UsuarioValueObject.php';
/**
 * Description of MysqlMedidasActiveRecord
 *
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class MysqlMedidasActiveRecord implements ActiveRecord{
    /**
     * @param MedidasValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE medidas SET ";
        $sql .= "descripcion = '" . $oValueObject->getDescripcion() . "', ";
        $sql .= "abreviatura = '" . $oValueObject->getAbreviatura() . "' ";
        $sql .= "WHERE idMedida = " . $oValueObject->getIdMedida() . ";";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param MedidasValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM medida WHERE idMedida = " . $oValueObject->getIdMedida();
        if(mysql_query($sql)) return TRUE;
        else return FALSE;
    }

    /**
     * 
     * @param MedidasValueObject $oValueObject
     * @return \MedidasValueObject|boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM medida WHERE idMedida = " . $oValueObject->getIdMedida();
        $resultado = mysql_query($sql);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setIdMedida($fila->idMedida);
            $oValueObject->setDescripcion($fila->descripcion);
            $oValueObject->setAbreviatura($fila->abreviatura);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Funcion que busca todas las medidas y las devuelve en un array.
     * @return \MedidasValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM medida order by descripcion;";
        $resultado = mysql_query($sql);
        if($resultado){
            $aMedida = array();
            while($fila = mysql_fetch_object($resultado)){
                $oMedida = new MedidasValueObject();
                $oMedida->setIdMedida($fila->idMedida);
                $oMedida->setDescripcion($fila->descripcion);
                $oMedida->setAbreviatura($fila->abreviatura);
                $aMedida[] = $oMedida;
                unset($oMedida);
            }
            return $aMedida;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return int
     */
    public function contar() {
        $sql = "SELECT count(*) FROM medida;";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];;
        } else {
            return 0;
        }
    }

    /**
     * @param MedidasValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT count(*) FROM medida ";
        $sql .= "WHERE idMedida = " . $oValueObject->getIdMedida() . ";";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $resultado = mysql_fetch_row($resultado);
            if($resultado[0] > 0) return TRUE;
            else return FALSE;
        } else {
            return FALSE;
        }
    }

    /**
     * @param MedidasValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO medida (descripcion, abreviatura) VALUES('";
        $sql .= $oValueObject->getDescripcion()."', '";
        $sql .= $oValueObject->getAbreviatura()."');";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

?>
