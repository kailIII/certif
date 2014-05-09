<?php
error_reporting(E_ALL);
include_once('simple_html_dom.php');

//$html = file_get_html('http://www.vialidad.gov.ar/mesa_entrada/mesa_entrada.php', array("expte"=>"Value", "ano"=>"Value2"));
$request = array(
    'http' => array(
        'method' => 'POST',
        'content' => http_build_query(array(
            'expte' => $_POST['expediente'],
            'ano' => $_POST['ano']
        )),
    )
);
$context = stream_context_create($request);

$expediente = file_get_html('http://www.vialidad.gov.ar/mesa_entrada/mesa_entrada.php', false, $context)->plaintext;

$identificador = strpos($expediente, 'Identificador: '); /*15*/
$tipoTramite = strpos($expediente, 'Tipo de tramite: '); /*17*/
$tema = strpos($expediente, 'Tema: ');/*6*/
$fechaAlta = strpos($expediente, 'Fecha de alta: ');/*15*/
$extracto = strpos($expediente, 'Extracto: ');/*10*/
$estado = strpos($expediente, 'Estado: ');/*8*/
$organismoA = strpos($expediente, 'Organismo Externo Actual: ');/*26*/
$dependenciaA = strpos($expediente, 'Dependencia Actual : ');/*21*/
$organismoD = strpos($expediente, 'Organismo Externo Destino : ');/*28*/
$dependenciaD = strpos($expediente, 'Dependencia Destino: ');/*21*/
$conformado = strpos($expediente, 'Conformado: ');/*12*/
if(trim(substr($expediente, $extracto+10, $estado-$extracto-10)) === "ECCION NACIONAL DE VIALIDAD                	  	  	         	  Consulta           por Expediente") {
?>
    <input type="hidden" name="h_01" id="h_01" value="" />
    <input type="hidden" name="h_02" id="h_02" value="" />
    <input type="hidden" name="h_03" id="h_03" value="" />
    <input type="hidden" name="h_04" id="h_04" value="" />
    <input type="hidden" name="h_05" id="h_05" value="" />
    <input type="hidden" name="h_06" id="h_06" value="" />
    <input type="hidden" name="h_07" id="h_07" value="" />
    <input type="hidden" name="h_08" id="h_08" value="" />
    <input type="hidden" name="h_09" id="h_09" value="" />
    <input type="hidden" name="h_10" id="h_10" value="" />
    <input type="hidden" name="h_11" id="h_11" value="" />
<?php
} else {
?>
    <input type="hidden" name="h_01" id="h_01" value="<?=trim(substr($expediente, $identificador+15, $tipoTramite-$identificador-15));?>" />
    <input type="hidden" name="h_02" id="h_02" value="<?=trim(substr($expediente, $tipoTramite+17, $tema-$tipoTramite-17));?>" />
    <input type="hidden" name="h_03" id="h_03" value="<?=trim(substr($expediente, $tema+6, $fechaAlta-$tema-6));?>" />
    <input type="hidden" name="h_04" id="h_04" value="<?=trim(substr($expediente, $fechaAlta+15, $extracto-$fechaAlta-15));?>" />
    <input type="hidden" name="h_05" id="h_05" value="<?=trim(substr($expediente, $extracto+10, $estado-$extracto-10));?>" />
    <input type="hidden" name="h_06" id="h_06" value="<?=trim(substr($expediente, $estado+8, $organismoA-$estado-8));?>" />
    <input type="hidden" name="h_07" id="h_07" value="<?=trim(substr($expediente, $organismoA+26, $dependenciaA-$organismoA-26));?>" />
    <input type="hidden" name="h_08" id="h_08" value="<?=trim(substr($expediente, $dependenciaA+21, $organismoD-$dependenciaA-21));?>" />
    <input type="hidden" name="h_09" id="h_09" value="<?=trim(substr($expediente, $organismoD+28, $dependenciaD-$organismoD-28));?>" />
    <input type="hidden" name="h_10" id="h_10" value="<?=trim(substr($expediente, $dependenciaD+21, $conformado-$dependenciaD-21));?>" />
    <input type="hidden" name="h_11" id="h_11" value="<?=trim(substr($expediente, $conformado+12));?>" />
<?php
}
?>