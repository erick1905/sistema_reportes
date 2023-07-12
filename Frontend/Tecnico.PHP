<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Levantar Reporte</title>
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
      background-color: #4caf50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <h1>Levantar Reporte</h1>
  <form action="/sistema_reportes/php/insertar.php" method="POST">
    <label for="area">Área que Reporta:</label>
    <input type="text" id="area" name="area" required />

    <label for="nombre">Nombre de Quien Reporta:</label>
    <input type="text" id="nombre" name="nombre" required />

    <label for="reporte">Qué Reporta:</label>
    <textarea id="reporte" name="reporte" rows="4" required></textarea>

    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria" required>
      <option value="">Selecciona una categoría</option>
      <option value="Hardware">Hardware</option>
      <option value="Software">Software</option>
      <option value="Redes">Redes</option>
      <option value="Otros">Otros</option>
    </select>
    <input type="submit" name="registrar" value="registrar" />
  </form>
</body>

</html>