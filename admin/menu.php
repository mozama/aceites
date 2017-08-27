<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="#">Start Bootstrap</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav">
      <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="#">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">
            Adminsitrador</span>
        </a>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="#">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">
            Sesiones</span>
        </a>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Motores">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMotor">
          <i class="fa fa-truck" aria-hidden="true"></i>
          <span class="nav-link-text">
            Motores</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMotor">
          <li>
            <a href="motorAgregar.php">Agregar marca</a>
          </li>
          <li>
            <a href="#">Ver - Editar marca</a>
          </li>

        </ul>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Modelos de motor">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseModelo">
          <i class="fa fa-cogs" aria-hidden="true"></i>
          <span class="nav-link-text">
            Modelos de motor</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseModelo">
          <li>
            <a href="#">Agregar modelo</a>
          </li>
          <li>
            <a href="#">Ver - Editar modelo</a>
          </li>

        </ul>
      </li>


      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Marcas de filtro">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMarcaF">
        <i class="fa fa-sun-o" aria-hidden="true"></i>
          <span class="nav-link-text">
            Marcas de filtros</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMarcaF">
          <li>
            <a href="">Agregar marca de filtro</a>
          </li>
          <li>
            <a href="#">Ver - Editar marca de filtro</a>
          </li>

        </ul>
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
        <form class="form-inline my-2 my-lg-0 mr-lg-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>
          Logout</a>
      </li>
    </ul>
  </div>
</nav>
