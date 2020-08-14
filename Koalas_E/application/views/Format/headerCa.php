<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Koalas</title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url(); ?>assets/Ca/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="<?= base_url(); ?>assets/Ca/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?= base_url(); ?>assets/Ca/css/responsive.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- DatePicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />

    <!-- Dropify CSS -->
    <link href="<?= base_url() ?>assets/Dropify/css/dropify.css" />

    <!-- Jquery-2.2.4 JS -->
<script src="<?= base_url(); ?>assets/Ca/js/jquery-2.2.4.min.js"></script>
<script src="https://unpkg.com/imask"></script>

    <style>
        @media (min-width: 1100px){
            .first-section{
                margin-top: 10%;
            }
        }

        @media (max-width: 1100px){
            .first-section{
                margin-top: 12%;
            }
        }

        @media (max-width: 990px){
            .first-section{
                margin-top: 8%;
            }
        }

        @media (max-width: 765px){
            .first-section{
                margin-top: 12%;
            }
        }

        @media (max-width: 500px){
            .first-section{
                margin-top: 20%;
            }
        }

    </style>

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            <a class="navbar-brand" href="#">Koalas.</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url() ?>index.php/Ecommerce">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle text-white nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Contabilidad
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/TFactura">Consumidor Final</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/TFactura">Credito Fiscal</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/TFactura">Nota de Credito</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/TFactura">Nota de debito</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/TFactura/ReporteFacturas">Reporte Facturas</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/TFactura/ReportePersonalizadoFacturas">Reporte Personalizado</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle text-white nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Servicios E ID
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/Pet">Agrgar Macota</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/Customer">Crear Cliente</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>index.php/">Equipo</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>index.php/">Contacto</a></li>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle text-white nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Idioma
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="http://localhost/Koalas/Koalas_E/">Español</a>
                                                <a class="dropdown-item" href="http://localhost/Koalas/Koalas_S/">Ingles</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle text-white nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Mantenimiento
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/Municipio">Municipio</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/Departamento">Departamento</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/Pais">Pais</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/User">Usuarios</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>index.php/Publication">Publicacion</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="sing-up-button d-lg-none">
                                    <a href="#">Sign Up Free</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
                <!--<div class="col-12 col-lg-2">
                    <div class="sing-up-button d-none d-lg-block">
                        <a href="#">Sign Up Free</a>
                    </div>-->
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->