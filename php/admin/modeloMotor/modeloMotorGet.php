<?php


  include('ConsultaGetModeloMotor.php');
  $ConsultaGetModeloMotor = new ConsultaGetModeloMotor;

  $consultaSelect = 'SELECT '.
                     'm.modId, '.
                     'm.modNombre, '.
                     'mt.motMarca ';

  $consultaFrom  = ' FROM motores mt, modelos_motor m ';
  $consultaWhere = ' WHERE mt.motId = m.modMotor;';

  $consulta = $consultaSelect.$consultaFrom.$consultaWhere;
  $response = $ConsultaGetModeloMotor -> getConsultaModelosMotor($consulta);


$jsonFinal = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $jsonFinal;

?>
