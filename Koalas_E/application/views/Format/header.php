<!DOCTYPE html>
<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <meta property="og:site_name" content="Some Web Media"/>
  <meta property="og:title" content="HC Off-canvas Nav – jQuery plugin for creating toggled off-canvas multi-level navigations">
  <meta property="og:description" content="jQuery plugin for creating toggled off-canvas multi-level navigations, allowing endless nesting of submenu elements.">
  <meta property="og:url" content="https://somewebmedia.github.io/hc-offcanvas-nav/">
  <meta property="og:image" content="https://somewebmedia.github.io/hc-offcanvas-nav/hc-offcanvas-nav.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,600,700">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/demo.css?ver=4.2.5">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <!-- DatePicker CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
  <!-- Dropify CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/Dropify/css/dropify.min.css">
  <!-- Datepicker CSS -->
  <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- Datatables js -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <!-- Datatables js -->
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  <script src="<?= base_url() ?>assets/template/hc-offcanvas-nav.js?ver=4.2.5"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <!-- Dropify JS -->
  <script src="<?= base_url() ?>assets/Dropify/js/dropify.min.js"></script>
  <script src="<?= base_url() ?>assets/mask/jquery.mask.min.js"></script>
  <!-- Datepicker JS -->
  <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
</head>

<body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/Koalas/Koalas_E/index.php/Ecommerce">Koala Care</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="toggle" href="#">
            menú
          </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="<?= base_url() ?>index.php/Login/logOut" method="POST">
        <div class="row text-light">
          <div class="col-md-12">
            <a href="http://localhost/Koalas/Koalas_E/index.php/Ecommerce"><img src="<?= base_url() ?>assets/image/spain.png" alt=""></a>
            &nbsp;
            <a href="http://localhost/Koalas/Koalas_S/index.php/Ecommerce"><img src="<?= base_url() ?>assets/image/united-states.png" alt=""></a>
            &nbsp;&nbsp;
            <i class="fas fa-user-tie fa-lg"></i>&nbsp;&nbsp;
            <?= $_SESSION["login"]["Nombre"]." ".$_SESSION["login"]["Apellido"] ?>&nbsp;&nbsp;
            <?php
            switch ($_SESSION["login"]["Permiso"]) {
              case 1:
                # Administrador
                echo '<span class="badge badge-pill badge-danger">Administrador</span>';
                break;
              case 2:
                # Empleado
                echo '<span class="badge badge-pill badge-warning">Empleado</span>';
                break;
              case 3:
                # Usuario
                echo '<span class="badge badge-pill badge-success">Cliente</span>';
                break;
              default:
                # code...
                break;
            }
            ?>
            <button type="submit" class="btn btn-link">
              <i class="fas fa-power-off fa-lg"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </nav>

  <div id="container">

    <header>

      <div class="wrapper cf">

        <nav id="main-nav">

          <ul class="second-nav">
            <?php if ($_SESSION["login"]["Permiso"] == 1): ?>              
              <li class="devices">
                <span>Mantenimiento</span>
                <ul>
                  <li><a href="<?= base_url() ?>index.php/Pais">Paises</a></li>
                  <li><a href="<?= base_url() ?>index.php/Departamento">Departamentos</a></li>
                  <li><a href="<?= base_url() ?>index.php/Municipio">Municipios</a></li>
                  <li><a href="<?= base_url() ?>index.php/Sex">Sexos</a></li>
                  <li><a href="<?= base_url() ?>index.php/TService">Tipo Servicios</a></li>
                  <li><a href="<?= base_url() ?>index.php/TProductos">Tipos Productos</a></li>
                  <li><a href="<?= base_url() ?>index.php/TMovimientos">Tipos movimientos kardex</a></li>
                </ul>
              </li>
            <?php endif ?>
            <?php if ($_SESSION["login"]["Permiso"] == 1 || $_SESSION["login"]["Permiso"] == 2 || $_SESSION["login"]["Permiso"] == 3): ?>
              <li class="magazines">
                <a href="#">Servicios</a>
                <ul>
                  <?php if ($_SESSION["login"]["Permiso"] == 1 || $_SESSION["login"]["Permiso"] == 2): ?>
                    <li><a href="<?= base_url() ?>index.php/Customer">Clientes</a></li>
                    <li><a href="<?= base_url() ?>index.php/Service">Servicios</a></li>
                  <?php endif ?>
                  <li><a href="<?= base_url() ?>index.php/Citas">Citas</a></li>
                  <li><a href="<?= base_url() ?>index.php/Pet">Mascotas</a></li>
                </ul>
              </li>
            <?php endif ?>
            <?php if ($_SESSION["login"]["Permiso"] == 1 || $_SESSION["login"]["Permiso"] == 2): ?>
              <li class="store">
                <a href="#">Empleados</a>
                <ul>
                  <li><a href="<?= base_url() ?>index.php/Publication">Publicaciones</a></li>
                  <?php if ($_SESSION["login"]["Permiso"] == 1): ?>
                    <li><a href="<?= base_url() ?>index.php/User">Usuarios</a></li>
                  <?php endif ?>
                  <li><a href="<?= base_url() ?>index.php/Marca">Marcas</a></li>
                  <li><a href="<?= base_url() ?>index.php/Certificaciones">Certificaciones</a></li>
                </ul>
              </li>
            <?php endif ?>
            <?php if ($_SESSION["login"]["Permiso"] == 1 || $_SESSION["login"]["Permiso"] == 2): ?>
              <li class="store">
                <a href="#">Facturacion</a>
                <ul>
                  <li><a href="<?= base_url() ?>index.php/TFactura">Consumidor final</a></li>
                  <!--<li><a href="#">Credito Fiscal</a></li>
                  <li><a href="#">Nota de credito</a></li>
                  <li><a href="#">Nota de debito</a></li>
                  <li><a href="#">Compra</a></li>-->
                </ul>
              </li>
            <?php endif ?>
            <?php if ($_SESSION["login"]["Permiso"] == 1 || $_SESSION["login"]["Permiso"] == 2): ?>
              <li class="store">
                <a href="#">Contabilidad</a>
                <ul>
                  <li><a href="<?= base_url() ?>index.php/Precio">Precios</a></li>
                  <li><a href="<?= base_url() ?>index.php/Productos">Productos</a></li>
                  <li><a href="<?= base_url() ?>index.php/UnidadesMedidas">Unidades de medida</a></li>
                  <!--<li><a href="#">Kardex</a></li>-->
                </ul>
              </li>
            <?php endif ?>
          </ul>

          <ul class="bottom-nav">
            <li class="github">
            </li>
            <li class="email">
            </li>
            <li class="ko-fi">
            </li>
          </ul>

        </nav>

      </div>

    </header>