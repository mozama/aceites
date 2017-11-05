<?php

$idMotor    =($_POST['idMotor']);
$marcaMotor =($_POST['marcaMotor']);

if ((isset( $idMotor )) || (isset($marcaMotor))) {

   include('../../Consultas.php');

   $Consultas = new Consultas;

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
             $sqlUpdate = 'UPDATE motores SET motMarca = "'.$marcaMotor.'" WHERE motId = '.$idMotor;
             $response = $Consultas -> consultaInsertEditEliminar($sqlUpdate);

     }
     else {
       $response =  array('status'  => 'ERROR',
                          'message' => "Problemas al conectarse a la base de datos.");
     }


  } else {
    $response = array(
              'status'  => 'ERROR',
              'message' => "Faltan parámetros al enviar petición."
            );
  }
  $jsonFinal = json_encode($response, JSON_UNESCAPED_UNICODE);
  echo $jsonFinal;
?>
