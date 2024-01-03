<?php
// Iniciar o reanudar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // El usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header('Location: ../Login.html');
    exit;
}
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar la contraseña actual y la nueva contraseña proporcionadas por el usuario
    $contrasena_actual = $_POST["contrasena_actual"];
    $nueva_contrasena = $_POST["nueva_contrasena"];

    // Obtener el nombre de usuario del usuario que ha iniciado sesión
    $nombre_usuario = $_SESSION["usuario"];

    // Consulta SQL para verificar la contraseña actual del usuario
    $sql = "SELECT contrasena FROM cuentas WHERE username = '$nombre_usuario'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $contrasena_db = $fila["contrasena"];
        // Verificar si la contraseña actual coincide (en este caso, asumimos que la contraseña en la base de datos está en MD5)
        if (md5($contrasena_actual) == $contrasena_db) {
            // La contraseña actual es válida, proceder a actualizar la contraseña (en MD5)
            $nueva_contrasena_md5 = md5($nueva_contrasena);
            $sql = "UPDATE cuentas SET contrasena = '$nueva_contrasena_md5' WHERE username = '$nombre_usuario'";
            if ($conn->query($sql) === TRUE) {
                header("Location: /sistema_reportes/Login/index/index.php");
                echo "<script> alert('El empleado [$nombre] agrego correctamente su reporte');</script>";
            } else {
                echo "Error al actualizar la contraseña: " . $conn->error;
            }
        } else {
            echo "La contraseña actual es incorrecta. Inténtalo de nuevo.";
        }
    }
}
