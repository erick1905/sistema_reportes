<?php


// confirmar sesion

session_start();


if (!isset($_SESSION['usuario'])) {

  header('Location: ../Login.html');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilos.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />
  <style>
    html {
      border: 8px solid #06b8f4;
      min-height: 100%;
    }

    .img-container {
      text-align: center;
    }

    html {
      border: 8px solid #06b8f4;
      min-height: 100%;
    }
  </style>
  <!-- Estilos de los botones -->
  <div class="img-container"> <!-- Block parent element -->
    <img src="LOGOTIPO FINAL.png" width="700" height="200">
  </div>
  <link rel="stylesheet" href="uno.css" />
  <link rel="stylesheet" href="dos.css" />
  <link rel="stylesheet" href="tres.css" />
  <title>Reportes Colima</title>

</head>

<body>
  <div class="contenedor">
    <h1>Reportes</h1>
    <p>Hola de nuevo, <?= $_SESSION['usuario'] ?> !!!</p>
    <div class="contenedor-botones">
      <a href="\sistema_reportes\Frontend\Impresoras.php">
        <button class="boton uno" onclick="Impresoras.html"> <span>Fallos de impresoras</span> </button>
      </a>
      <a href="\sistema_reportes\Frontend\Tecnico.PHP">
        <button class="boton dos"><span>Tecnicos y redes</span></button>
      </a>
      <a href="\sistema_reportes\Frontend\Prestamos.php">
        <button class="boton tres"><span>Prestamo equipos</span></button>
      </a>
      <a href="\sistema_reportes\Frontend\CambiarContrasena.php">
        <button class="boton uno" onclick="Impresoras.html"> <span>Cambiar Contraseña</span> </button>
      </a>
      <div class="icono">
      </div>
    </div>

</body>

</html>