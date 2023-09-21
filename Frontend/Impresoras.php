<!DOCTYPE html>
<html lang="es">
<?php
$mysqli = new mysqli('localhost', 'root', '', 'siste_reportes');

?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <div class="img-container">
    <img src="LOGOTIPO FINAL.png" width="700" height="200">
  </div>
</head>
<style>
  .img-container {
    text-align: center;
  }

  body {
    font-family: Arial, sans-serif;
    text-align: center;
  }

  form {
    max-width: 400px;
    margin: 0 auto;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type="submit"] {
    background-color: #06b8f4;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  html {
    border: 8px solid #06b8f4;
    min-height: 100%;
  }

  select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
</style>

<body>
  <h1>Levantar reporte de impresora</h1>

  <form action="/sistema_reportes/php/insertarImpresoras.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required />

    <label for="area">Dependencia:</label>
    <select id="area" name="area" required>
      <option value="0">Seleccionar dependencia:</option>

      <?php

      $query = $mysqli->query("SELECT * FROM dependencias");

      while ($valores = mysqli_fetch_array($query)) {

        echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
      }

      ?>
      <!-- Agrega más opciones según tus necesidades -->
    </select>

    <label for="impresora">Número de Impresora:</label>
    <input type="text" id="impresora" name="impresora" required />

    <label for="fecha">Fecha y Hora de Entrega:</label>
    <input type="datetime-local" id="fecha" name="fecha" required />

    <label for="descripcion">Descripción del Problema:</label>
    <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
    <input type="submit" value="Regresar" onclick="window.history.back()" />
    <input type="submit" name="registrar" value="Levantar Reporte" />
  </form>
</body>

</html>