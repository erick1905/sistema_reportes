<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reportes Tecnicos</title>
  <div class="img-container"> <!-- Block parent element -->
    <img src="LOGOTIPO FINAL.png" width="700" height="200">
  </div>
  <style>
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

    .img-container {
      text-align: center;
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
</head>
<script>
  function mostrarCuadroDeTexto() {
    var categoriaSelect = document.getElementById("categoria");
    var cuadroDeTexto = document.getElementById("cuadroDeTexto");

    if (categoriaSelect.value === "otros") {
      cuadroDeTexto.style.display = "block";
    } else {
      cuadroDeTexto.style.display = "none";
    }
  }
</script>

<body>
  <h1>Levantar reporte tecnico</h1>
  <form action="/sistema_reportes/php/insertar.php" method="POST">
    <label for="area">Área que Reporta:</label>
    <input type="text" id="area" name="area" required />

    <label for="nombre">Nombre de Quien Reporta:</label>
    <input type="text" id="nombre" name="nombre" required />

    <label for="reporte">Qué Reporta:</label>
    <textarea id="reporte" name="reporte" rows="4" required></textarea>

    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria" onchange="mostrarCuadroDeTexto()">
      <option value="">Selecciona una categoría</option>
      <option value="Hardware">Hardware</option>
      <option value="Software">Software</option>
      <option value="Redes">Redes</option>
      <option value="otros">Otros</option>
    </select>
    <div id="cuadroDeTexto" style="display: none">
      <label for="otraCategoria" name="cuadroDeTexto">Especificar Categoría:</label>
      <input type="text" id="otraCategoria" name="otraCategoria" />
    </div>
    <input type="submit" value="Regresar" onclick="window.history.back()" />
    <input type="submit" name="registrar" value="registrar" />
  </form>
</body>

</html>