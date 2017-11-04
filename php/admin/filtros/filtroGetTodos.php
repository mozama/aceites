<?php
include('ConsultaGetFiltro.php');
$ConsultaGetMotor = new ConsultaGetMotor;

$consultaSelect = 'SELECT '.
                   'm.filId, '.
                   'm.filNumero '.
                   'filTipo ';

$consultaFrom = ' FROM filtros f ORDER BY f.filId DESC';
$consulta = $consultaSelect.$consultaFrom;
$response = $ConsultaGetMotor -> getConsultaFiltros($consulta);

$jsonFinal = json_encode($response);
echo $jsonFinal;

?>
