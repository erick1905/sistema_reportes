<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["registrar"])) {
    $area = $_POST["area"];
    $nombre = $_POST["nombre"];
    $reporte = $_POST["reporte"];
    $categoria = $_POST["categoria"];

    $query = "INSERT INTO tecnicoyredes (AreaReporte,NombreReportante,QueReporta,Categoria,Estatus,Observaciones) VALUES (?,?,?,?,true,'sin observaciones')";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "ssss", $area, $nombre, $reporte, $categoria);
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
