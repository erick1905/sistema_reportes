<!DOCTYPE html>
<?php
// $mysqli = new mysqli('localhost', 'usuario', 'password', 'base_de_datos');
$mysqli = new mysqli('localhost', 'root', '', 'siste_reportes');

?>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de Entrega </title>
  <style>
    body {
      font-family: Arial, sans-serif;
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

    select {
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
  </style>
  
  <div class="img-container"> <!-- Block parent element -->
    <img src="LOGOTIPO FINAL.png" width="700" height="200" >
  </div>
</head>

<body>
  <h1>Registro de Entrega</h1>
  <form action="/sistema_reportes/php/InsertarPrestamo.php" method="POST">
    <label for="dependencia">Dependencia:</label>
    <select id="dependencia" name="dependencia" required>
      <option value="0">Selecciona:</option>

      <?php

      $query = $mysqli->query("SELECT * FROM dependencias");

      while ($valores = mysqli_fetch_array($query)) {

        echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
      }

      ?>
      <!-- Agrega más opciones según tus necesidades -->
    </select>

    <label for="receptor">Nombre del Receptor:</label>
    <input type="text" id="receptor" name="receptor" required />

    <label for="fecha">Fecha y Hora de Entrega:</label>
    <input type="datetime-local" id="fecha" name="fecha" required />

    <label for="catalogo">Catalogo:</label>
    <select id="catalogo" name="catalogo" required>
      <option value="">Selecciona un elemento del catalogo</option>
      <option value="Elemento 1">Elemento 1</option>
      <option value="Elemento 2">Elemento 2</option>
      <option value="Elemento 3">Elemento 3</option>
      <!-- Agrega más opciones según tus necesidades -->
    </select>
    <label for="necesita_personal">¿Necesita personal?</label>
    <input type="checkbox" id="necesita_personal" name="necesita_personal" />
    <br />
    <input type="submit" value="Registrar Entrega" name="registrar" />
    <input type="submit" value="Regresar" onclick="window.history.back()" />
  </form>
</body>

</html>