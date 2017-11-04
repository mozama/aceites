<?php

$filtro   =($_POST['filtro']);
$filtroTipo   =($_POST['filtroTipo']);

if (isset( $filtro )) {

   include('../Consultas.php');

   $Consultas = new Consultas;

   $consultaExistente = 'SELECT filId FROM filtros WHERE filNumero = "'.$filtro.'";';
                          //al validar cambia valor de atributo para toda la clase

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
       $nExistente = $Consultas -> contarExistentes($consultaExistente);                                     //si existe un RFC igual dentro del sistema

       if ($nExistente == 0) {
             $sqlInsert = 'INSERT INTO filtros (filNumero, filTipo) values (';
             $sqlValues = '"'.$filtro.'","'.$filtroTipo.'");';
             $consulta = $sqlInsert.$sqlValues;
             $response = $Consultas -> consultaInsertEditEliminar($consulta);
           }
           else {
             $response =  array('status'   => 'ERROR',
                                'message'  => "Ya existe un filtro con el mismo numero verifique."
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
