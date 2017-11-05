<?php
include('ConsultaGetMarcaFiltro.php');
$ConsultaGetMarcaFiltro = new ConsultaGetMarcaFiltro;

$consultaSelect = 'SELECT '.
                   'm.marId, '.
                   'm.marNombre ';

$consultaFrom = ' FROM marcas_filtros m ORDER BY m.marId DESC';
$consulta = $consultaSelect.$consultaFrom;
$response = $ConsultaGetMarcaFiltro -> getConsultaMarcasFiltro($consulta);

$jsonFinal = json_encode($response);
echo $jsonFinal;

?>
