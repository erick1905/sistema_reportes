<?php
//crear vinculo a la conexion
include("conexion.php");
//clase de la conexion
$getmysql = new mysqlconex();
//metodo
$getconex = $getmysql->conex();
//boton para registrar y verificar si esta con informacion
if (isset($_POST["registrar"])) {
    //cuadros de texto con su respectivos datos
    $nombre = $_POST["nombre"];
    $area = $_POST["area"];
    $impresora = $_POST["impresora"];
    $fecha = $_POST["fecha"];
    $descripcion = $_POST["descripcion"];
    //consulta mysql
    $query = "INSERT INTO impresoras (Nombre_Reportante,Area,NumeroImpresora,Fecha_Hora,Descripcion,Estado,Detalle_Pendiente) VALUES (?,?,?,?,?,true,'sin observaciones')";
    //enviar la consulta y preparar la ejecucion 
    $sentencia = mysqli_prepare($getconex, $query);
    //enviar datos en los cuadros de texto
    mysqli_stmt_bind_param($sentencia, "sssss", $nombre, $area, $impresora, $fecha, $descripcion);
    //ejecutar la consulta
    mysqli_stmt_execute($sentencia);
    //mostrar celdas afectadas
    $afectado = mysqli_stmt_affected_rows($sentencia);
    //if para verificar que se agrego correctamente
    if ($afectado == 1) {
        echo "<script> alert('El empleado [$nombre] agrego correctamente su reporte'); location.href='/sistema_reportes/Login/index/index.php'; </script>";
    } else {
        echo "<script> alert('El empleado [$nombre] no agrego correctamente su reporte :( '); location.href=' /sistema_reportes/Login/index/index.php'; </script>";
    }
    //cerrar consulta
    mysqli_stmt_close($sentencia);
    //cerrar conexion
    mysqli_close($getconex);
}
