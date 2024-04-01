<?php

include("inc.aplication_top.php");

//HABILITACIÓN DE PÁGINAS POR FECHAS
date_default_timezone_set("America/Lima");

$fecha_actual = date("Y-m-d h:i:s");
$fechaLimite = '2024-03-32 00:00:00';

$_SESSION['fecha_actual']=$fecha_actual;
$_SESSION['fechaLimite']=$fechaLimite;

if (isset($_GET['seccion'])) {

  switch ($_GET['seccion']) {

    case 'proveedor':
      $proveedores->addProveedor();
      break;
    case 'validar-sesion':
      $proveedores->validarProveedor();
      break;
    case 'sesion':
      $titulo = $_GET["seccion"] . " | " . NOMBRE_SITIO;
      $plantilla = _templates_ . 'tpl_' . $_GET["seccion"] . '.php';
      break;
    case 'evento-conteo':
      $titulo = $_GET["seccion"] . " | " . NOMBRE_SITIO;
      $plantilla = _templates_ . 'tpl_' . $_GET["seccion"] . '.php';
      break;
    case 'registro-exitoso':
      $titulo = $_GET["seccion"] . " | " . NOMBRE_SITIO;
      $plantilla = _templates_ . 'tpl_' . $_GET["seccion"] . '.php';
      break;
    case 'registro-no-exitoso':
      $titulo = $_GET["seccion"] . " | " . NOMBRE_SITIO;
      $plantilla = _templates_ . 'tpl_' . $_GET["seccion"] . '.php';
      break;
    case 'registro-exitoso-de':
      $titulo = $_GET["seccion"] . " | " . NOMBRE_SITIO;
      $plantilla = _templates_ . 'tpl_' . $_GET["seccion"] . '.php';
      break;
    case 'contactanos':
      $titulo = $_GET["seccion"] . " | " . NOMBRE_SITIO;
      $plantilla = _templates_ . 'tpl_' . $_GET["seccion"] . '.php';
      break;
    case 'validar-contactanos':
        $proveedores->validarContactanos();
        break;
    case 'contactanos-exitoso':
      $titulo = $_GET["seccion"] . " | " . NOMBRE_SITIO;
      $plantilla = _templates_ . 'tpl_' . $_GET["seccion"] . '.php';
      break;

  }
} else {

  $titulo = NOMBRE_SITIO;
  if ($fecha_actual < $fechaLimite) {
      $plantilla = _templates_ . "tpl_home.php";
  }else{
      $plantilla = _templates_ . "tpl_home-de.php";
  }

}

include_once(_templates_includes_ . "inc.header.php");
?>
</head>

<body class="container">
  <header>
    <?php include_once(_templates_includes_ . 'inc.top.php'); ?>
  </header>
  <main>
    <?php include_once($plantilla); ?>
  </main>
  <?php
    if (isset($_GET['seccion'])) {
    } else {
  ?>    
    <footer class="position-relative">
      <?php include_once(_templates_includes_ . 'inc.bottom.php'); ?>
    </footer>
  <?php
    } 
  ?> 
</body>

</html>
