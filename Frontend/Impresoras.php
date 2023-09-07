<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>
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
</style>

<body>
  <h1>Levantar Reporte</h1>

  <form action="/sistema_reportes/php/insertarImpresoras.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required />

    <label for="area">Área:</label>
    <input type="text" id="area" name="area" required />

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