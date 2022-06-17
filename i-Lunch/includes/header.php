<?php
$paginaActiva;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>i-Lunch</title>

    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
    para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <link rel="icon" href="/images/favicon.png">

  </head>

  <body>
    <ul class="nav">
      <?php if ($paginaActiva == 0): ?>  
        <li class="nav-item nav-pills">
          <a class="nav-link active" href="/index.php">Inicio</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/index.php">Inicio</a>
        </li>
      <?php endif; ?>

      <?php if ($paginaActiva == 1): ?>  
        <li class="nav-item nav-pills">
          <a class="nav-link active" href="/administrador/administrador.php">Administradores</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/administrador/administrador.php">Administradores</a>
        </li>
      <?php endif; ?>

      <?php if ($paginaActiva == 2): ?>  
        <li class="nav-item nav-pills">
          <a class="nav-link active" href="/franquicia/franquicia.php">Franquicias</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/franquicia/franquicia.php">Franquicias</a>
        </li>
      <?php endif; ?>

      <?php if ($paginaActiva == 3): ?>  
        <li class="nav-item nav-pills">
          <a class="nav-link active" href="/restaurante/restaurante.php">Restaurantes</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/restaurante/restaurante.php">Restaurantes</a>
        </li>
      <?php endif; ?> 
    </ul>