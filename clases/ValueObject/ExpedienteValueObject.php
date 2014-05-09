<?php
/**
 * Description of ExpedienteValueObject
 *
 * @author Martin
 */
class ExpedienteValueObject {
    private $idexpediente, $idCertificacion, $certDpv, $certDnv, $expDpv, $expDnv;
    private $mes, $dependencia, $comentario, $importe, $vencimiento, $cedido, $finalizado;
    
    public function getIdexpediente() {
        return $this->idexpediente;
    }

    public function getIdCertificacion() {
        return $this->idCertificacion;
    }

    public function getCertDpv() {
        return $this->certDpv;
    }

    public function getCertDnv() {
        return $this->certDnv;
    }

    public function getExpDpv() {
        return $this->expDpv;
    }

    public function getExpDnv() {
        return $this->expDnv;
    }

    public function getMes() {
        return $this->mes;
    }

    public function getDependencia() {
        return $this->dependencia;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getImporte() {
        return $this->importe;
    }

    public function getVencimiento() {
        return $this->vencimiento;
    }

    public function getCedido() {
        return $this->cedido;
    }

    public function setIdexpediente($idexpediente) {
        $this->idexpediente = $idexpediente;
    }

    public function setIdCertificacion($idCertificacion) {
        $this->idCertificacion = $idCertificacion;
    }

    public function setCertDpv($certDpv) {
        $this->certDpv = $certDpv;
    }

    public function setCertDnv($certDnv) {
        $this->certDnv = $certDnv;
    }

    public function setExpDpv($expDpv) {
        $this->expDpv = $expDpv;
    }

    public function setExpDnv($expDnv) {
        $this->expDnv = $expDnv;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }

    public function setDependencia($dependencia) {
        $this->dependencia = $dependencia;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
    }

    public function setVencimiento($vencimiento) {
        $this->vencimiento = $vencimiento;
    }

    public function setCedido($cedido) {
        $this->cedido = $cedido;
    }
 
    public function getFinalizado() {
        return $this->finalizado;
    }

    public function setFinalizado($finalizado) {
        $this->finalizado = $finalizado;
    }
}