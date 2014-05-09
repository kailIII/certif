<?php
// Se requiere la clase MysqlActiveRecordAbstractFactory.php
require_once "MysqlActiveRecordAbstractFactory.php";

/**
* Clase que fabrica objetos de tipo Active Record.
*
* Clase que fabrica objetos de tipo Active Record para motores MySQL y PostgreSQL.
*
* @copyright  Copyright (c) 2014, Martin Remedi
* @license    http://www.gnu.org/licenses/   GPL License
* @version    1.0
* @since      Class available since Release 1.0
*/
abstract class ActiveRecordAbstractFactory {
    // Lista de tipos de Active Record soportados por la factoria
    const MYSQL = 1;
    const PGSQL = 2;
    
    public abstract function getCertificacionActiveRecord();
    public abstract function getComitenteActiveRecord();
    public abstract function getPersoneriaActiveRecord();
    public abstract function getObrasEjecutadasActiveRecord();
    public abstract function getUsuarioActiveRecord();
    public abstract function getMedidasActiveRecord();
    public abstract function getTipocertActiveRecord();
    public abstract function getVialidadActiveRecord();
    public abstract function getExpedienteActiveRecord();
    public abstract function getExpHistotiaActiveRecord();
    

    /**
     * Permite obtener la factoria de un Active Record.
     * 
     * @param integer $motor Se especifica el tipo de objeto a crear
     * @return object or false
     */
    public static function getActiveRecordFactory($motor = self::MYSQL) {
        switch ($motor) {
        case self::MYSQL:
            return new MysqlActiveRecordAbstractFactory();
        case self::PGSQL:
            return new PgsqlActiveRecordAbstractFactory();
        default:
            return false;
        }
    }
}
?>