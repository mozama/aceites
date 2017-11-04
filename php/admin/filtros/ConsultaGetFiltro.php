<?php
  /**
   * Clase para regresar elementos de consulta para traer informacion de la tabla motores
   */
  class ConsultaGetFiltro{

    function getConsultaFiltros($consultaSql){
      include('../Consultas.php');
          $Consultas = new Consultas;

            $Consultas -> establecerConexion();
            $database = $Consultas-> ConexionBD->conectarBD();

            if($database->connect_errno) {
              $response = array(
                  'status' => 'ERROR',
                  'message' => 'No se pudo establecer conexión a la base de datos.'
                );
             }
             else{

               if ( $result = $database->query($consultaSql) ) {


                 if( $result->num_rows > 0 ) {

                   while($row = mysqli_fetch_array($result, MYSQL_BOTH)) {
                     $filId    = $row['filId'];
                     $filNumero = $row['filNumero'];
                     $filTipo = $row['filTipo'];

                     $data[]= array(
                                    'filId'    => $filId,
                                    'filNumero' => $filNumero,
                                    'filTipo' => $filTipo,
                                  );
                   }
                   mysqli_free_result($result);

                   $response = array(
                     'status' => 'OK',
                     'data' => $data,
                   );

                 } else {
                   $response = array(
                     'status' => 'ERROR',
                     'message' => 'No se encontraron números de filtro en el sistema.'
                   );
                 }

               }
               else {
                 $response = array(
                     'status' => 'ERROR',
                     'message' => $database->error
                   );
                }
                $Consultas-> ConexionBD->desconectarDB($database);

             }

          return $response;
       }

  }

 ?>
