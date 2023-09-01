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
    $dependencia = $_POST["dependencia"];
    $receptor = $_POST["receptor"];
    $fecha = $_POST["fecha"];
    $catalogo = $_POST["catalogo"];
    $necesita_personal = $_POST["necesita_personal"];
    //consulta mysql
    $query = "INSERT INTO prestamo_equipos (Dependencia,Receptor,FechaYHora,Catalogo,RequierePersonal,FechaDevolucion) VALUES (?,?,?,?,?,?)";
    //enviar la consulta y preparar la ejecucion 
    $sentencia = mysqli_prepare($getconex, $query);
    //enviar datos en los cuadros de texto
    mysqli_stmt_bind_param($sentencia, "ssssss", $dependencia, $receptor, $fecha, $catalogo, $necesita_personal, $fecha);
    //ejecutar la consulta
    mysqli_stmt_execute($sentencia);
    //mostrar celdas afectadas
    $afectado = mysqli_stmt_affected_rows($sentencia);
    //if para verificar que se agrego correctamente
    if ($afectado == 1) {
        echo "<script> alert('El empleado [$nombre] agrego correctamente su reporte'); location.href='../index.php'; </script>";
    } else {
        echo "<script> alert('El empleado [$nombre] no agrego correctamente su reporte :( '); location.href='../index.php'; </script>";
    }
    //cerrar consulta
    mysqli_stmt_close($sentencia);
    //cerrar conexion
    mysqli_close($getconex);
}
