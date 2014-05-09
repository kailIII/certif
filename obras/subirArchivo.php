<?php
if (array_key_exists('HTTP_X_FILE_NAME', $_SERVER) &&//Comprobamos que se haya subido un archivo 
array_key_exists('CONTENT_LENGTH', $_SERVER)) {//Volvemos a comprobar que exista el archivo mirando su tamaño
$fileName = $_SERVER['HTTP_X_FILE_NAME'];
$contentLength = $_SERVER['CONTENT_LENGTH'];
} else throw new Exception("Error retrieving headers");
 
$path = '../Archivos/kml_';
 
if (!$contentLength > 0) {
    throw new Exception('No file uploaded!');
}
 
file_put_contents(//guardamos los datos recibidos en un archivo
    $path . $fileName,
    file_get_contents("php://input")//Tomamos los datos de la dirección temporal de php
);
?>