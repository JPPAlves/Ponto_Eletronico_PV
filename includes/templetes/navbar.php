<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
  
</head>


  <!-- partial:index.partial.html -->

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand fa fa-map-marker" aria-hidden="true" href="" style="font-size: 1.5em;"> Ponto IFRO </a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

          <!-- Itens da barra lateral -->
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
            <a class="nav-link" href="/Projeto/PontoEletronicoPV/includes/php/Principal/painel.php">
              <i class="fa fa-fw fa fa-home"></i>
              <span class="nav-link-text">Inicio</span>
            </a>
          </li>



          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ponto">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePonto" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-clock-o"></i>
              <span class="nav-link-text">Ponto</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapsePonto">
              <li>
                <a class="fa fa-plus-circle" href="/Projeto/PontoEletronicoPV/includes/php/IncluirPonto/incluirPonto.php"> Incluir Batida</a>
              </li>
              <li>
                <a class="fa fa-table" href="/Projeto/PontoEletronicoPV/includes/php/Espelho/espelho.php"> Espelho de Ponto</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Espelho">
            <a class="nav-link" href="/Projeto/PontoEletronicoPV/includes/php/Espelho/espelho.php">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">Espelho</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ferias">
            <a class="nav-link" href="">
              <i class="fa fa-fw fa fa-sun-o "></i>
              <span class="nav-link-text">Ferias</span>
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/Projeto/PontoEletronicoPV/includes/php/ValidasSessao/logout.php">
              <i class="fa fa-fw fa-sign-out"></i>Sair</a>
          </li>
        </ul>
      </div>
    </nav>

  </body>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js'></script>
  <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js'></script>