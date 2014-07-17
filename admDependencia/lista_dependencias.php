<?php
//require_once '../usuarios/aut_verifica.inc.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if(isset($_GET['getListadoByLetters']) && isset($_GET['letters'])){
    $letters = $_GET['letters'];

    $letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
    $sql = "SELECT iddependencia, dependencia, dias, orden "
            . "FROM dependencia "
            . "WHERE (dependencia LIKE '%".$letters."%' OR iddependencia LIKE '%".$letters."%')";
    $resultado = mysql_query($sql);
    while($inf = mysql_fetch_array($resultado)){
        $cod = $inf['iddependencia'];
        $nombre = htmlentities($inf["dependencia"] . " " . $inf["dias"] . " " . $inf["orden"]);
        echo $cod . "###" . $cod . " " . $nombre . "|";
    }
}