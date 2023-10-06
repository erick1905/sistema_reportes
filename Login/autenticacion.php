<?php
// Datos de conexión a la base de datos
$host = "localhost";
$usuario_db = "root";
$contrasena_db = "";
$nombre_db = "siste_reportes";

// Conexión a la base de datos
$conn = new mysqli($host, $usuario_db, $contrasena_db, $nombre_db);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recuperar datos del formulario
$usuario_ingresado = $_POST["usuario"];
$contrasena_ingresada = $_POST["password"];

// Consulta SQL para verificar las credenciales
$sql = "SELECT * FROM cuentas WHERE username = '$usuario_ingresado' AND password = '$contrasena_ingresada'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    // Inicio de sesión exitoso
    session_start();
    $_SESSION["usuario"] = $usuario_ingresado;
    header("Location: /sistema_reportes/Login/index/index.php"); // Redirigir a la página principal
    exit();
} else {
    // Inicio de sesión fallido
    header("Location: Login.html?error=1"); // Redirigir de vuelta al formulario de inicio de sesión
    exit();
}

// Cerrar la conexión a la base de datosf