<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Sistema de equivalencias de filtros para motor">
    <meta name="author" content="Mozama">
    <title>SB Admin - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
  <!--   <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
-->
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../vendor/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">

  </head>

  <body class="fixed-nav" id="page-top">

    <!-- Navigation -->
    <?php include ("menu.php"); ?>



    <div class="content-wrapper py-3" style="height:100%">
      <div class="container-fluid">
        <h3 class="text-center">
          <i class="fa fa-truck text-primary" aria-hidden="true"></i>
          Filtro
        </h3>

        <div class="elementos" id="dvAgregar">
          <div class="card">
            <div class="card-header">
              <h5>
                <i class="fa fa-plus text-primary" aria-hidden="true"></i>
                Agregar filtro
              </h5>
            </div>
              <div class="card-body">

                  <div role="form" name="signup_form2" novalidate >
                      <div class="form-group">
                          <label>Número de filtro</label>
                          <input type="text" placeholder="Filtro" class="form-control" name="txtFiltro" id="txtFiltro" >
                      </div>
                      <div class="form-group">
                          <label>Tipo de filtro</label>
                          <input type="text" placeholder="Tipo de filtro" class="form-control" name="txtFiltroTipo" id="txtFiltroTipo" >
                      </div>

                      <div class="form-group">
                          <button class="btn btn-sm btn-primary" type="submit" id="btnGuardar" style="cursor:pointer; cursor: hand"><strong>
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Guardar</strong></button>
                      </div>
                  </div>

              </div>
          </div>
        </div>

        <div class="elementos hidden" id="dvEditar">
          <div class="card">
            <div class="card-header">
              <h5>
                <i class="fa fa-pencil text-primary" aria-hidden="true"></i>
                Editar Filtro
              </h5>
            </div>
              <div class="card-body">

                  <div role="form" name="signup_form2" novalidate >
                      <div class="form-group">
                          <label>Número de filtro</label>
                          <input type="text" placeholder="Filtro" class="form-control" name="txtFiltroE" id="txtFiltroE" >
                          <input type="text" class="hidden" id="txtIdE">
                      </div>

                      <div class="form-group">
                          <label>Tipo de filtro</label>
                          <input type="text" placeholder="Tipo de filtro" class="form-control" name="txtFiltroTipoE" id="txtFiltroTipoE" >
                      </div>

                      <div class="form-group">
                          <button class="btn btn-sm btn-primary" type="submit" id="btnGuardarE" style="cursor:pointer; cursor: hand"><strong>
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Guardar</strong>
                          </button>
                          <button class="btn btn-sm btn-danger" type="submit" id="btnCancelarE" style="cursor:pointer; cursor: hand"><strong>
                              <i class="fa fa-floppy-o" aria-hidden="true"></i>
                              Cancelar</strong>
                          </button>
                      </div>
                  </div>

              </div>
          </div>
        </div>

        <div class="elementos" id="dvListado">
          <div class="card">
            <div class="card-header">
              <h5>
                <i class="fa fa-pencil text-primary" aria-hidden="true"></i>
                Ver / editar filtro
              </h5>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table id="tblResult" class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">
                        Id
                      </th>
                      <th class="text-center">
                        No. filtro
                      </th>
                      <th class="text-center">
                        Tipo de filtro
                      </th>
                      <th class="text-center">
                        Eliminar
                      </th>
                      <th class="text-center">
                        Editar
                      </th>
                    </tr>
                  </thead>
                  <tbody id="tbodyResult">

                  </tbody>

                </table>
              </div>

            </div>
          </div>
        </div>


      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/sweetalert/sweetalert.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--   <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
 -->
    <!-- Custom scripts for this template
    <script src="../js/sb-admin.min.js"></script>
    -->
    <script src="../js/admin/filtroAgregar.js"></script>

  </body>

</html>
