<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["registrar"])) {
    $nombre = $_POST["nombre"];
    $area = $_POST["area"];
    $impresora = $_POST["impresora"];
    $fecha = $_POST["fecha"];
    $descripcion = $_POST["descripcion"];

    $query = "INSERT INTO impresoras (Nombre_Reportante,Area,NumeroImpresora,Fecha_Hora,Descripcion,Estado,Detalle_Pendiente) VALUES (?,?,?,?,?,true,'sin observaciones')";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "sssss", $nombre, $area, $impresora, $fecha, $descripcion);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El empleado [$nombre] se agrego correctamente'); location.href='../index.php'; </script>";
    } else {
        echo "<script> alert('El empleado [$nombre] no agrego correctamente :( '); location.href='../index.php'; </script>";
    }
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}
