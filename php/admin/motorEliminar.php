<?php

$idMotor   =($_POST['idMotor']);

if (isset( $idMotor )) {

   include('../Consultas.php');

   $Consultas = new Consultas;
            //verificar antes de eliminar que no existan modelos de motor con la marca a eliminar
   $consultaExistente = 'SELECT modId FROM modelos_motor WHERE modMotor = '.$idMotor.';';

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
       $nExistente = $Consultas -> contarExistentes($consultaExistente);             //si existe un modelo de motor asociado a la marca a eliminar

       if ($nExistente == 0) {
             $sqlDelete = 'DELETE FROM motores WHERE motId = '.$idMotor;
             $response = $Consultas -> consultaInsertEditEliminar($sqlDelete);
       }
       else {
             $response =  array('status'   => 'ERROR',
                                'message'  => "Existen modelos de motor asociados con la marca de motor a eliminar, verifique que esta marca de motor no contenga modelos de motor."
                               );
       }

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
