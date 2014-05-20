<?php
/**
 * Description of Vialidad
 *
 * @author Martin
 */
class VialidadValueObject {
    private $idvialidad, $identificador, $tipotramite, $tema, $fechaalta, $extracto, 
            $estado, $organismoa, $dependenciaa, $organismod, $dependenciad, $conformado, $idexpediente;

    public function getIdvialidad() {
        return $this->idvialidad;
    }

    public function getIdentificador() {
        return $this->identificador;
    }

    public function getTipotramite() {
        return $this->tipotramite;
    }

    public function getTema() {
        return $this->tema;
    }

    public function getFechaalta() {
        return $this->fechaalta;
    }

    public function getExtracto() {
        return $this->extracto;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getOrganismoa() {
        return $this->organismoa;
    }

    public function getDependenciaa() {
        return $this->dependenciaa;
    }

    public function getOrganismod() {
        return $this->organismod;
    }

    public function getDependenciad() {
        return $this->dependenciad;
    }

    public function getConformado() {
        return $this->conformado;
    }

    public function setIdvialidad($idvialidad) {
        $this->idvialidad = $idvialidad;
    }

    public function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }

    public function setTipotramite($tipotramite) {
        $this->tipotramite = $tipotramite;
    }

    public function setTema($tema) {
        $this->tema = $tema;
    }

    public function setFechaalta($fechaalta) {
        $this->fechaalta = $fechaalta;
    }

    public function setExtracto($extracto) {
        $this->extracto = $extracto;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setOrganismoa($organismoa) {
        $this->organismoa = $organismoa;
    }

    public function setDependenciaa($dependenciaa) {
        $this->dependenciaa = $dependenciaa;
    }

    public function setOrganismod($organismod) {
        $this->organismod = $organismod;
    }

    public function setDependenciad($dependenciad) {
        $this->dependenciad = $dependenciad;
    }

    public function setConformado($conformado) {
        $this->conformado = $conformado;
    }
    
    public function getIdexpediente() {
        return $this->idexpediente;
    }

    public function setIdexpediente($idexpediente) {
        $this->idexpediente = $idexpediente;
    }
}