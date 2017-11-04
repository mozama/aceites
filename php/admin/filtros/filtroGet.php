<?php
$idFiltro   =($_POST['idFiltro']);
if (isset( $idMotor )) {
  include('ConsultaGetFiltro.php');
  $ConsultaGetMotor = new ConsultaGetMotor;

  $consultaSelect = 'SELECT '.
                     'f.filId, '.
                     'f.filNumero '.
                     'f.filTipo ';

  $consultaFrom  = ' FROM filtros f ';
  $consultaWhere = ' WHERE f.filId = '.$idFiltro;

  $consulta = $consultaSelect.$consultaFrom.$consultaWhere;
  $response = $ConsultaGetMotor -> getConsultaFiltros($consulta);

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
