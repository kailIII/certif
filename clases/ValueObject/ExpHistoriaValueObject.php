<?php
/**
 * Description of ExpHistoriaValueObject
 *
 * @author Martin
 */
class ExpHistoriaValueObject {
    private $idexpediente, $fecha, $dependencia, $comentario;
    
    public function getIdexpediente() {
        return $this->idexpediente;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getDependencia() {
        return $this->dependencia;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function setIdexpediente($idexpediente) {
        $this->idexpediente = $idexpediente;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setDependencia($dependencia) {
        $this->dependencia = $dependencia;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }
}