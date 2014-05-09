<?php
/**
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2014, Martin Remedi
 */
interface ActiveRecord {
   public function buscarTodo();

   public function buscar($oValueObject);

   public function guardar($oValueObject);

   public function actualizar($oValueObject);

   public function borrar($oValueObject);

   public function existe($oValueObject);

   public function contar();
}
?>