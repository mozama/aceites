<?php

$marcaMotor   =($_POST['marcaMotor']);

if (isset( $marcaMotor )) {

   include('../Consultas.php');

   $Consultas = new Consultas;

   $consultaExistente = 'SELECT motId FROM motores WHERE motMarca = "'.$marcaMotor.'";';
                          //al validar cambia valor de atributo para toda la clase

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
       $nExistente = $Consultas -> contarExistentes($consultaExistente);                                     //si existe un RFC igual dentro del sistema

       if ($nExistente == 0) {

             $sqlInsert = 'INSERT INTO motores (motMarca) values (';
             $sqlValues = '"'.$marcaMotor.'");';
             $consulta = $sqlInsert.$sqlValues;
          //   echo $consulta;

             $response = $Consultas -> consultaInsertEditEliminar($consulta);


           }
           else {
             $response =  array('status'   => 'ERROR',
                                'message'  => "Ya existe una marca de motor con el mismo nombre verifique."
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
