<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/ComitenteValueObject.php';
/**
 * Description of MysqlComitenteActiveRecord
 *
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class MysqlComitenteActiveRecord implements ActiveRecord{
    /**
     * 
     * @param ComitenteValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE comitente SET ";
        $sql .= "descripcion = '" . $oValueObject->getDescripcion() . "' ";
        $sql .= "WHERE id = " . $oValueObject->getId();
        if(mysql_query($sql)) return TRUE;
        else return FALSE;
    }

    /**
     * 
     * @param ComitenteValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM comitente ";
        $sql .= "WHERE id = " . $oValueObject->getId();
        if(mysql_query($sql)) return TRUE;
        else return FALSE;
    }

    /**
     * 
     * @param ComitenteValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM comitente ";
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
     * Busca todos los comitentes.
     * @return \ComitenteValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM comitente; ";
//        $sql .= "WHERE id = " . $oValueObject->getId();
        $resultado = mysql_query($sql);
        if($resultado){
            $aComitente = array();
            while ($fila = mysql_fetch_object($resultado)){
                $oComitente = new ComitenteValueObject();
                $oComitente->setDescripcion($fila->descripcion);
                $oComitente->setId($fila->id);
                $aComitente[] = $oComitente;
                unset($oComitente);
            }
            return $aComitente;
        } else {
            return FALSE;
        }
    }

    /**
     * Comtabiliza la cantidad de comitentes.
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM comitente;";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * Controla la existencia de un comitente.
     * @param ComitenteValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM comitente ";
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
     * Almacena en los datos en la base comitente.
     * @param ComitenteValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO comitente (descripcion) VALUES('";
        $sql .= $oValueObject->getDescripcion()."');";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>