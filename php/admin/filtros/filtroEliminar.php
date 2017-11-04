<?php

$idFiltro   =($_POST['idFiltro']);

if (isset( $idFiltro )) {

   include('../Consultas.php');

   $Consultas = new Consultas;
            //verificar antes de eliminar que no existan modelos de motor con la marca a eliminar
   $consultaExistente = 'SELECT filId FROM filtros WHERE filMarca = '.$idFiltro.';';

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
       $nExistente = $Consultas -> contarExistentes($consultaExistente);             //si existe un modelo de motor asociado a la marca a eliminar

       if ($nExistente == 0) {
             $sqlDelete = 'DELETE FROM filtros WHERE filId = '.$idFiltro;
             $response = $Consultas -> consultaInsertEditEliminar($sqlDelete);
       }
       else {
             $response =  array('status'   => 'ERROR',
                                'message'  => "Existen marcas de filtro asociadas con el número de filtro a eliminar, verifique que este número de filtro no contenga marcas de filtro."
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
