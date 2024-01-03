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
echo $usuario_ingresado, $contrasena_ingresada;

// Consulta SQL para verificar las credenciales
$sql = "SELECT * FROM cuentas WHERE username = '$usuario_ingresado'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    $row = $resultado->fetch_assoc();
    $contrasena_db = $row['contrasena'];

    echo "Contraseña almacenada: " . $contrasena_db . "<br>";
    echo "Contraseña ingresada (sin encriptar): " . $contrasena_ingresada . "<br>";
    echo "Contraseña ingresada (encriptada): " . md5($contrasena_ingresada) . "<br>";

    // Verifica si la contraseña ingresada coincide con la contraseña encriptada o sin encriptar
    if ($contrasena_ingresada === $contrasena_db || md5($contrasena_ingresada) === $contrasena_db) {
        // Inicio de sesión exitoso
        session_start();
        $_SESSION["usuario"] = $usuario_ingresado;
        header("Location: /sistema_reportes/Login/index/index.php"); // Redirigir a la página principal
        exit();
    }
}

// Inicio de sesión fallido
//header("Location: Login.html?error=1"); // Redirigir de vuelta al formulario de inicio de sesión

exit();

// Cerrar la conexión a la base de datosf