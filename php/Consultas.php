<?php
class Consultas {
  public  $ConexionBD;
  private $database;


  public function establecerConexion(){
    include('Conexion.php');
    $ConexionBDatos = new Conexion;
    $this -> ConexionBD = $ConexionBDatos;
    $this -> database = $this-> ConexionBD->conectarBD();
    return $ConexionBDatos;
  }


  public function consultaInsertEditEliminar($consulta) {

                      /****************************Consulta despues de validar *************/

          //  $this -> database = $this-> ConexionBD->conectarBD();

            if($this -> database->connect_errno) {
              $response = array(
                  'status' => 'ERROR',
                  'message' => 'No se puede conectar a la base de datos'
                );
             }
             else{
               if ( $result = $this -> database->query($consulta) ) {
                 $response = array(
                         'status' => 'OK',
                         'message' => 'Consulta realizada con exito'
                       );
              } else {
                $response = array(
                    'status' => 'ERROR',
                    'message' => $this -> database->error
                  );
              }
              $this -> ConexionBD->desconectarDB($this -> database);
            }

                            /**************************** /Consulta despues de validar *************/

    return $response;
  }




/*  contar numero de registros
  @recibe consulta SQL
  @return int con cantidad de registros encontrados
*/

    public function contarExistentes($consulta) {

      if($this -> database ->connect_errno) {
        $response = -1;   //No se puede conectar a la base de datos
      }
      else{
         if ( $result = $this -> database ->query($consulta) ) {        //realiza consulta
            $response = $result->num_rows ;                             //metodo num_rows regresa el numero de registros encontrados 
        } else {
           $response =  $this -> database ->error;
        }
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
