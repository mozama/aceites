<?php
include('ConsultaGetMotor.php');
$ConsultaGetMotor = new ConsultaGetMotor;

$consultaSelect = 'SELECT '.
                   'm.motId, '.
                   'm.motMarca ';

$consultaFrom = ' FROM motores m ORDER BY m.motId DESC';
$consulta = $consultaSelect.$consultaFrom;
$response = $ConsultaGetMotor -> getConsultaMotores($consulta);

$jsonFinal = json_encode($response);
echo $jsonFinal;

?>
