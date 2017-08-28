<?php
$idMotor   =($_POST['idMotor']);
if (isset( $idMotor )) {
  include('ConsultaGetMotor.php');
  $ConsultaGetMotor = new ConsultaGetMotor;

  $consultaSelect = 'SELECT '.
                     'm.motId, '.
                     'm.motMarca ';

  $consultaFrom  = ' FROM motores m ';
  $consultaWhere = ' WHERE m.motId = '.$idMotor;

  $consulta = $consultaSelect.$consultaFrom.$consultaWhere;
  $response = $ConsultaGetMotor -> getConsultaMotores($consulta);

}
else {
  $response = array(
            'status'  => 'ERROR',
            'message' => "Faltan parámetros al enviar petición."
          );
}
$jsonFinal = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $jsonFinal;

?>
