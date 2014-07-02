<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActualizacionesValueObject
 *
 * @author Martin
 */
class ActualizacionesValueObject {
    private $fecha, $identificador;
    public function getFecha() {
        return $this->fecha;
    }

    public function getIdentificador() {
        return $this->identificador;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }

    function __construct($identificador) {
        $this->fecha = date('Y-m-d');
        $this->identificador = $identificador;
    }

}
