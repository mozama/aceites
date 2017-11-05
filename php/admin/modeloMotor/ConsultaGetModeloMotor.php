<?php
  /**
   * Clase para obtener los elementos de la tabla modelos_motor
   */
  class ConsultaGetModeloMotor{

    function getConsultaModelosMotor($consultaSql){
      include('../../Consultas.php');
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
                     $modId     = $row['modId'];
                     $modNombre = $row['modNombre'];
                     $motMarca  = $row['motMarca'];

                     $data[]= array(
                                    'modId'     => $modId,
                                    'modNombre' => $modNombre,
                                    'motMarca'  => $motMarca,
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
                     'message' => 'No se encontraron modelos de motor en el sistema.'
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
