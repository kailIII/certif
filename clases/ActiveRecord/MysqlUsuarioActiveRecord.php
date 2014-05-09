<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/UsuarioValueObject.php';
/**
 * Description of MysqlUsuarioActiveRecord
 *
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class MysqlUsuarioActiveRecord implements ActiveRecord{
    /**
     * 
     * @param UsuarioValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE usuario SET";
        $sql = " apellido = '" . $oValueObject->getApellido() . "'";
        $sql = ", fechaalta = '" . $oValueObject->getFechaalta() . "'";
        $sql = ", nombre = '" . $oValueObject->getNombre() . "'";
        $sql = ", tipousuario = '" . $oValueObject->getTipousuario() . "'";
        $sql = ", clave = MD5('" . $oValueObject->getClave() . "')";
        $sql .= " WHERE u.identificador = '".$oValueObject->getIdentificador()."';";
        if(mysql_query($sql)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function borrar($oValueObject) {
        if($oValueObject) return FALSE;
        else return FALSE;
    }

    /**
     * 
     * @param UsuarioValueObject $oValueObject
     * @return UsuarioValueObject | false
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM usuario u";
        $sql .= " WHERE u.identificador = '".$oValueObject->getIdentificador()."';";
        $resultado = mysql_query($sql);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setApellido($fila->apellido);
            $oValueObject->setFechaalta($fila->fechaalta);
            $oValueObject->setIdentificador($fila->identificador);
            $oValueObject->setNombre($fila->nombre);
//            $oValueObject->setTipousuario($fila->tipousuario);
            $oValueObject->setClave('');
            return $oValueObject;
        } else {
            return FALSE;
        }
    }
    
    /**
     * 
     * @param UsuarioValueObject $oValueObject
     * @return UsuarioValueObject | false
     */
    public function loguearse($oValueObject) {
        $sql = "SELECT * FROM usuario u";
        $sql .= " WHERE u.identificador = '".$oValueObject->getIdentificador()."'";
        $sql .= " AND u.clave = md5('".$oValueObject->getClave()."');";
        $resultado = mysql_query($sql);
        echo $sql ."<br>";
//        var_dump($resultado);
        $fila = mysql_fetch_object($resultado);
        if($fila){
            $oValueObject->setApellido($fila->apellido);
            $oValueObject->setFechaalta($fila->fechaalta);
            $oValueObject->setIdentificador($fila->identificador);
            $oValueObject->setNombre($fila->nombre);
//            $oValueObject->setTipousuario($fila->tipousuario);
            $oValueObject->setClave('');
            return $oValueObject;
        } else {
            return false;
        }
    }

    /**
     * 
     * @return \UsuarioValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM usuario u;";
        $resultado = mysql_query($sql);
        if($resultado){
            $aUsuario = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oUsuario = new UsuarioValueObject();
                $oUsuario->setApellido($fila->apellido);
                $oUsuario->setFechaalta($fila->fechaalta);
                $oUsuario->setIdentificador($fila->identificador);
                $oUsuario->setNombre($fila->nombre);
                $oUsuario->setPerfil($fila->perfil);
                $oUsuario->setDni($fila->dni);
                $oUsuario->setClave('');
                $oUsuario->setFechaalta($fila->fechaalta);
                $aUsuario[] = $oUsuario;
                unset($oUsuario);
            }
            return $aUsuario;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM usuario;";
        $resultado = mysql_query($sql);
        if($resultado){
            $resultado = mysql_fetch_row($resultado);
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * 
     * @param UsuarioValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM usuario u";
        $sql .= " WHERE u.identificador = '".$oValueObject->getIdentificador()."'";
        $sql .= " AND u.clave = md5('".$oValueObject->getClave()."');";
        $resultado = mysql_query($sql);
        if($resultado){
            $resultado = mysql_fetch_row($resultado);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param UsuarioValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO usuario (";
        $sql .="identificador, nombre, apellido, clave, perfil, fechaalta, dni)";
        $sql .="VALUE('".$oValueObject->getIdentificador()."', ";
        $sql .="'".$oValueObject->getNombre()."', ";
        $sql .="'".$oValueObject->getApellido()."', ";
        $sql .="MD5('".$oValueObject->getClave()."'), ";
        $sql .="'".$oValueObject->getPerfil()."', ";
        $sql .="'".$oValueObject->getFechaalta()."', ";
        $sql .="".$oValueObject->getDni().");";
//        if(!existe($oValueObject)){
            if(mysql_query($sql)) return TRUE;
            else return FALSE;
//        } else {
//            return FALSE;
//        }
    }
}
?>