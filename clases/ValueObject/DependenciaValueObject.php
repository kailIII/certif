<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DependenciaValueObject
 *
 * @author Martin
 */
class DependenciaValueObject {
    private $iddependencia, $dependencia, $dias;
    
    public function getIddependencia() {
        return $this->iddependencia;
    }

    public function getDependencia() {
        return $this->dependencia;
    }

    public function getDias() {
        return $this->dias;
    }

    public function setIddependencia($iddependencia) {
        $this->iddependencia = $iddependencia;
    }

    public function setDependencia($dependencia) {
        $this->dependencia = $dependencia;
    }

    public function setDias($dias) {
        $this->dias = $dias;
    }
}