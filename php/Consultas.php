<?php
class ConsultasCliente {
  public  $ConexionBD;


  public function establecerConexion(){
    include('Conexion.php');
    $ConexionBDatos = new Conexion;
    $this -> ConexionBD = $ConexionBDatos;
    return $ConexionBDatos;
  }


  public function consultaInsertEditEliminar($consulta) {

                      /****************************Consulta despues de validar *************/

            $database = $this-> ConexionBD->conectarBD();

            if($database->connect_errno) {
              $response = array(
                  'status' => 'ERROR',
                  'message' => 'No se puede conectar a la base de datos'
                );
             }
             else{
               if ( $result = $database->query($consulta) ) {
                 $response = array(
                         'status' => 'OK',
                         'message' => 'Consulta realizada con exito'
                       );
              } else {
                $response = array(
                    'status' => 'ERROR',
                    'message' => $database->error
                  );
              }
              $this -> ConexionBD->desconectarDB($database);
            }

                            /**************************** /Consulta despues de validar *************/

    return $response;
  }




/*  contar numero de registros
  @recibe consulta SQL
  @return int con 1 si existen registros 0 si no existen registros
*/

    public function contarExistentes($consulta) {
          if ($this->esCliente) {
                        /****************************Consulta despues de validar *************/
              $database = $this-> ConexionBD->conectarBD();

              if($database->connect_errno) {
                $response = -1;   //No se puede conectar a la base de datos
               }
               else{
                 if ( $result = $database->query($consulta) ) {
                    if( $result->num_rows > 0 ) {
                        $response = 1;
                    }
                    else {
                      $response = 0;
                    }

                } else {
                   $response =  $database->error;
                }
                $this -> ConexionBD->desconectarDB($database);
              }

                              /**************************** /Consulta despues de validar *************/
        }else {     // $esCliente
          $response = -2;  //'Verifique que su sesión sea administrador';
        }

      return $response;
    }

    public function contarExistentesGeneral($consulta) {    //No solicita permiso administrados

                        /****************************Consulta despues de validar *************/
              $database = $this-> ConexionBD->conectarBD();

              if($database->connect_errno) {
                $response = -1;   //No se puede conectar a la base de datos
               }
               else{
                 if ( $result = $database->query($consulta) ) {
                    if( $result->num_rows > 0 ) {
                        $response = 1;
                    }
                    else {
                      $response = 0;
                    }

                } else {
                   $response =  $database->error;
                }
                $this -> ConexionBD->desconectarDB($database);
              }

                              /**************************** /Consulta despues de validar *************/

      return $response;
    }

}
?>
