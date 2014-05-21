<?php
// Se requiere de la clase ActiveRecordAbstractFactory
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
require_once '../clases/ActiveRecord/MysqlCertificacionActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlObrasEjecutadasActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlUsuarioActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlMedidasActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlTipocertActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlPersoneriaActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlComitenteActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlVialidadActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlExpedienteActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlExpHistoriaActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlDependenciaActiveRecord.php';

/**
* Clase que nos permite conectar al motor MySQL y crear objetos
* de tipo Active Record para cada una de tablas del sistema.
*
* Clase que nos permite conectar al motor MySQL y crear objetos
* de tipo Active Record para cada una de tablas del sistema.
* @version    1.0
* @author Martin Remedi <remedi.martin@gmail.com>
* @license http://www.gnu.org/licenses/ GPL License
* @copyright (c) 2013, Martin Remedi
*/
class MysqlActiveRecordAbstractFactory extends ActiveRecordAbstractFactory
{
    
    public static function getActiveRecordFactory($motor = self::MYSQL) {
        return parent::getActiveRecordFactory($motor);
    }

//   const HOST = 'mysql15.000webhost.com';
//   const USER = 'a5248503_kiosco';
//   const PASS = 'T1nch0_web';
//   const DB = 'a5248503_kiosco';
   const HOST = 'localhost';
   const USER = 'root';
   const PASS = 'root';
   const DB = 'obra';
//   const HOST = 'localhost';
//   const USER = 'dreisena';
//   const PASS = 'd1r34r';
//   const DB = 'clinicaescolar';

    /**
    * Nos permite conectar al motor MySQL con los datos de
    * conexión especificados como constantes. Luego se hace
    * la selección de la base de datos.
    */
    public function conectar() {
        mysql_connect(self::HOST, self::USER, self::PASS);
//        mysql_connect(self::HOST, self::USER);
        mysql_select_db(self::DB);
    }

   /**
   * Nos permite obtener un objeto de tipo MysqlCertificacionActiveRecord.
   * 
   * @return MysqlCertificacionActiveRecord
   */
   public function getCertificacionActiveRecord() {
      return new MysqlCertificacionActiveRecord();
   }
   
   /**
   * Nos permite obtener un objeto de tipo MysqlObrasEjecutadasActiveRecord.
   * 
   * @return MysqlObrasEjecutadasActiveRecord
   */
   public function getObrasEjecutadasActiveRecord() {
      return new MysqlObrasEjecutadasActiveRecord();
   }
   
   /**
   * Nos permite obtener un objeto de tipo MysqlUsuarioActiveRecord.
   * 
   * @return MysqlUsuarioActiveRecord
   */
   public function getUsuarioActiveRecord() {
      return new MysqlUsuarioActiveRecord();
   }
   
   /**
   * Nos permite obtener un objeto de tipo MysqlMedidasActiveRecord.
   * 
   * @return MysqlMedidaActiveRecord
   */
   public function getMedidasActiveRecord() {
      return new MysqlMedidasActiveRecord();
   }

   /**
   * Nos permite obtener un objeto de tipo MysqlTipocertActiveRecord.
   * 
   * @return MysqlTipocertActiveRecord
   */
   public function getTipocertActiveRecord() {
      return new MysqlTipocertActiveRecord();
   }
   /**
   * Nos permite obtener un objeto de tipo MysqlPersoneriaActiveRecord.
   * 
   * @return MysqlPersoneriaActiveRecord
   */
   public function getPersoneriaActiveRecord() {
       return new MysqlPersoneriaActiveRecord();
   }
   /**
   * Nos permite obtener un objeto de tipo MysqlComitenteActiveRecord.
   * 
   * @return MysqlComitenteActiveRecord
   */
   public function getComitenteActiveRecord() {
      return new MysqlComitenteActiveRecord();
   }
   /**
   * Nos permite obtener un objeto de tipo MysqlVialidadActiveRecord.
   * 
   * @return MysqlVialidadActiveRecord
   */
   public function getVialidadActiveRecord() {
      return new MysqlVialidadActiveRecord();
   }
   /**
   * Nos permite obtener un objeto de tipo MysqlExpedienteActiveRecord.
   * 
   * @return MysqlExpedienteActiveRecord
   */
   public function getExpedienteActiveRecord() {
      return new MysqlExpedienteActiveRecord();
   }
   /**
   * Nos permite obtener un objeto de tipo MysqlExpHisotriaActiveRecord.
   * 
   * @return MysqlExpHistoriaActiveRecord
   */
   public function getExpHistotiaActiveRecord() {
      return new MysqlExpHistoriaActiveRecord();
   }
   /**
   * Nos permite obtener un objeto de tipo MysqlDependenciaaActiveRecord.
   * 
   * @return MysqlDependenciaActiveRecord
   */
   public function getDependenciaActiveRecord() {
      return new MysqlDependenciaActiveRecord();
   }
}