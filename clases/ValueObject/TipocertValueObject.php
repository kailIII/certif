<?php
/**
 * Description of TipocertValueObject
 *
 * @author ssrolanr
 */
class TipocertValueObject {
    private $id, $descripcion;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>