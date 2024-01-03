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
      text-align: left;
    }

    .contenedor_texto {
      text-align: right;
      /* Alinea el texto a la derecha */
      font-weight: 50;
      color: #141414;
      padding: 5px 10px;
      position: absolute;
      /* Posiciona el elemento de manera absoluta */
      top: 0;
      /* Lo coloca en la parte superior de su contenedor */
      right: 0;
      /* Lo coloca en la esquina superior derecha */
      font-size: 24px;
      /* Tamaño de fuente más grande (ajusta el valor según tus preferencias) */
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
  <div class="contenedor_texto"> <!-- Block parent element -->
    <h3>Bienvenido <?= $_SESSION['usuario'] ?> &#127774;</h3>
    <h4 id="fechaHora"></h4>
  </div>
  <link rel="stylesheet" href="uno.css" />
  <link rel="stylesheet" href="dos.css" />
  <link rel="stylesheet" href="tres.css" />
  <title>Reportes Colima</title>
</head>

<body>
  <div class="contenedor">
    <h1>Reportes</h1>
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
      <a href="\sistema_reportes\php\cerrarsesion.php">
        <button class="boton uno" onclick="cerrarsesion.php"> <span>Cerrar sesion</span> </button>
      </a>
      <div class="icono">
      </div>
    </div>

</body>
<script>
  function mostrarFechaYHora() {
    const fechaHoraElement = document.getElementById("fechaHora");
    const fechaHora = new Date();
    const opciones = {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric'
    };
    const fechaHoraFormateada = fechaHora.toLocaleDateString('es-ES', opciones);
    fechaHoraElement.textContent = "" + fechaHoraFormateada;
  }

  // Llama a la función para mostrar la fecha y hora actual cuando se carga la página.
  mostrarFechaYHora();

  // Actualiza la fecha y hora cada segundo (1000 milisegundos).
  setInterval(mostrarFechaYHora, 1000);
</script>

</html>