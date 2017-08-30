<?php

$marcaFiltro   =($_POST['marcaFiltro']);

if (isset( $marcaFiltro )) {

   include('../Consultas.php');

   $Consultas = new Consultas;

   $consultaExistente = 'SELECT marId FROM marcas_filtros WHERE marNombre = "'.$marcaFiltro.'";';
                          //al validar cambia valor de atributo para toda la clase

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
       $nExistente = $Consultas -> contarExistentes($consultaExistente);                                     //si existe un RFC igual dentro del sistema

       if ($nExistente == 0) {
             $sqlInsert = 'INSERT INTO marcas_filtros (marNombre) values (';
             $sqlValues = '"'.$marcaFiltro.'");';
             $consulta = $sqlInsert.$sqlValues;
             $response = $Consultas -> consultaInsertEditEliminar($consulta);
           }
           else {
             $response =  array('status'   => 'ERROR',
                                'message'  => "Ya existe una marca de filtro con el mismo nombre verifique."
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
