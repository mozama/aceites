<?php

$idMotor     = ($_POST['idMotor']);
$modeloMotor =($_POST['modeloMotor']);

if (isset( $idMotor ) || isset($modeloMotor)) {

   include('../Consultas.php');

   $Consultas = new Consultas;

   $consultaExistente = 'SELECT modId FROM modelos_motor WHERE modMotor = '.$idMotor.' AND modNombre = '.$modeloMotor.';';
                          //al validar cambia valor de atributo para toda la clase

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
       $nExistente = $Consultas -> contarExistentes($consultaExistente);                                     //si existe un RFC igual dentro del sistema

       if ($nExistente == 0) {
             $sqlInsert = 'INSERT INTO modelos_motor (modNombre, modMotor) values (';
             $sqlValues = '"'.$modeloMotor.'", '.$idMotor.');';
             $consulta = $sqlInsert.$sqlValues;
             $response = $Consultas -> consultaInsertEditEliminar($consulta);
           }
           else {
             $response =  array('status'   => 'ERROR',
                                'message'  => "Ya existe un modelo de motor con el mismo nombre verifique."
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
