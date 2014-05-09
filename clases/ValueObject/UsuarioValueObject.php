<?php
/**
 * Description of UsuarioValueObject
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class UsuarioValueObject {
    private $identificador, $nombre, $apellido, $clave, $fechaalta;
    private $perfil, $dni;
    
    public function getPerfil() {
        return $this->perfil;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

        public function getIdentificador() {
        return $this->identificador;
    }

    public function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function getFechaalta() {
        return $this->fechaalta;
    }

    public function setFechaalta($fechaalta) {
        $this->fechaalta = $fechaalta;
    }

}

?>
