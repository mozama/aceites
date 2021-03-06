<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="#">Administrador</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav">

  <!--      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="#">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">
            Sesiones</span>
        </a>
      </li>
      -->

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Motores" id="liMotores">
        <a class="nav-link "  href="motorAgregar.php">
          <i class="fa fa-truck" aria-hidden="true"></i>
          <span class="nav-link-text">
            Motores</span>
        </a>
    <!--     <ul class="sidenav-second-level collapse" id="collapseMotor">
          <li>
            <a href="motorAgregar.php">Agregar marca</a>
          </li>
          <li>
            <a href="#">Ver - Editar marca</a>
          </li>

        </ul>
        -->
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Modelos de motor" id="liModeloMotor">
        <a class="nav-link "  href="modeloMotAgregar.php">
          <i class="fa fa-cogs" aria-hidden="true"></i>
          <span class="nav-link-text">
            Modelos de motor</span>
        </a>

      </li>


      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Marcas de filtro" id="liMarcaFiltro">
        <a class="nav-link "  href="marcaFiltroAgregar.php">
          <i class="fa fa-sun-o" aria-hidden="true"></i>
          <span class="nav-link-text">
            Marcas de filtros</span>
        </a>
    <!--     <ul class="sidenav-second-level collapse" id="collapseMotor">
          <li>
            <a href="motorAgregar.php">Agregar marca</a>
          </li>
          <li>
            <a href="#">Ver - Editar marca</a>
          </li>

        </ul>
        -->
      </li>



      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Filtro">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseFiltro">
          <i class="fa fa-sun-o" aria-hidden="true"></i>
          <span class="nav-link-text">
            Filtros</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseFiltro">
          <li>
            <a href="#">Agregar filtro</a>
          </li>
          <li>
            <a href="#">Ver - Editar filtro</a>
          </li>

        </ul>
      </li>

    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">



      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>
          Salir</a>
      </li>
    </ul>
  </div>
</nav>
