<?php
//require_once '../usuarios/aut_verifica.inc.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if(isset($_GET['getDenominacionByLetters']) && isset($_GET['letters'])){
    $letters = $_GET['letters'];

    $letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
    $sql = "SELECT id, provincia FROM provincias ";
    $sql.=" where (provincia like '%".$letters."%' or id like '%".$letters."%')";
    $resultado = mysql_query($sql);
    while($inf = mysql_fetch_array($resultado)){
        $cod=$inf["id"];
        if($inf['provincia'] <> null) {
            $nombre =htmlentities($inf["provincia"]);
            echo $cod."###".$cod." ".$nombre."|";
        }
    }
//    $con->Close();
}