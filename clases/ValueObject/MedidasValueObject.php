<?php
/**
 * Description of CertificacionValueObject
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */

class MedidasValueObject {
    private $idMedida, $descripcion, $abreviatura;
    public function getIdMedida() {
        return $this->idMedida;
    }

    public function setIdMedida($idMedida) {
        $this->idMedida = $idMedida;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getAbreviatura() {
        return $this->abreviatura;
    }

    public function setAbreviatura($abreviatura) {
        $this->abreviatura = $abreviatura;
    }
}
?>