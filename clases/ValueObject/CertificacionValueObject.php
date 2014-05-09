<?php
 /**
 * Description of CertificacionValueObject
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class CertificacionValueObject {
    private $id, $idObra, $certNro, $idTipo, $mes, $periodo, $importeBasico;
    private $importeRedeterminado, $fondoReparo, $anticipoFinanciero;
    private $otrosDescuentos, $aCobrar, $comentario, $fecha;
    private $participacion, $imagen, $fechaFirma;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdObra() {
        return $this->idObra;
    }

    public function setIdObra($idObra) {
        $this->idObra = $idObra;
    }

    public function getCertNro() {
        return $this->certNro;
    }

    public function setCertNro($certNro) {
        $this->certNro = $certNro;
    }

    public function getIdTipo() {
        return $this->idTipo;
    }

    public function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    public function getMes() {
        return $this->mes;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }

    public function getPeriodo() {
        return $this->periodo;
    }

    public function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function getImporteBasico() {
        return $this->importeBasico;
    }

    public function setImporteBasico($importeBasico) {
        $this->importeBasico = $importeBasico;
    }

    public function getImporteRedeterminado() {
        return $this->importeRedeterminado;
    }

    public function setImporteRedeterminado($importeRedeterminado) {
        $this->importeRedeterminado = $importeRedeterminado;
    }

    public function getFondoReparo() {
        return $this->fondoReparo;
    }

    public function setFondoReparo($fondoReparo) {
        $this->fondoReparo = $fondoReparo;
    }

    public function getAnticipoFinanciero() {
        return $this->anticipoFinanciero;
    }

    public function setAnticipoFinanciero($anticipoFinanciero) {
        $this->anticipoFinanciero = $anticipoFinanciero;
    }

    public function getOtrosDescuentos() {
        return $this->otrosDescuentos;
    }

    public function setOtrosDescuentos($otrosDescuentos) {
        $this->otrosDescuentos = $otrosDescuentos;
    }

    public function getACobrar() {
        return $this->aCobrar;
    }

    public function setACobrar($aCobrar) {
        $this->aCobrar = $aCobrar;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getParticipacion() {
        return $this->participacion;
    }

    public function setParticipacion($participacion) {
        $this->participacion = $participacion;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getFechaFirma() {
        return $this->fechaFirma;
    }

    public function setFechaFirma($fechaFirma) {
        $this->fechaFirma = $fechaFirma;
    }
}
?>