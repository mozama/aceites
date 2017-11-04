<?php

$idFiltro    =($_POST['idFiltro']);
$filNumero =($_POST['filNumero']);
$filTipo =($_POST['filTipo']);

if ((isset( $idFiltro )) || (isset($filNumero)) || (isset($filTipo))) {

   include('../Consultas.php');

   $Consultas = new Consultas;

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
             $sqlUpdate = 'UPDATE filtros SET filNumero = "'.$filNumero.'", filTipo = "'.$filTipo.'" WHERE filId = '.$idFiltro;
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
