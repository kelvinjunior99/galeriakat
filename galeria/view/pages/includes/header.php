<?php session_start(); ?>
<!doctype html>
  <html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="view/asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/asset/bootstrap/templatemo-breezed.css">

    <link rel="stylesheet" href="view/asset/bootstrap/owl-carousel.css">
    <link rel="stylesheet" href="view/asset/font-awesome/css/font-awesome.css">

    <link rel="stylesheet" href="view/asset/bootstrap/lightbox.css">
    <link rel="stylesheet" href="view/asset/css/estilo.css">

    <title>Minha Galaria</title>
  </head>
  <body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-light menu" style="background-color: #fff;">
      <div class="container-fluid container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index">GALERIA</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MENU
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="cad-imagem">adicionar imagem</a></li>
                <li><a class="dropdown-item" href="cad-album">adicionar album</a></li>
              </ul>
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="sobre">SOBRE</a>
            </li>
            </li>
            
          </ul>
          <form class="d-flex" method="post" action="resultado">
            <input class="form-control me-2" type="search" name="pesquisar" required="" placeholder="Procurar imagem" aria-label="Search">
          </form>

         <!-- <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Modo noturno</label>
          </div> -->
        </div>

      </div>
    </nav>

