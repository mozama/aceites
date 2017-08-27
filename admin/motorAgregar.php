<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
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

  </head>

  <body class="fixed-nav" id="page-top">

    <!-- Navigation -->
    <?php include ("menu.php"); ?>



    <div class="content-wrapper py-3" style="height:100%">
      <div class="container-fluid">

        <div class="card">
          <div class="card-header">
            <h4>Agregar marca de motor</h4>
          </div>
            <div class="card-body">

                <div role="form" name="signup_form2" novalidate >
                    <div class="form-group">
                        <label>Marca de motor</label>
                        <input type="text" placeholder="Marca de motor" class="form-control" name="txtMarcaMotor" >
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
    <script src="../js/admin/motorAgregar.js"></script>

  </body>

</html>
