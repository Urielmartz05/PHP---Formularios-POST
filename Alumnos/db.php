<?php
    $host = "localhost";
    $usuario = 'root';
    $password = 'Martzcal05@';
    $baseDatos = "university";
    $table = "alumnos";

    $conexion = new mysqli(
        $host,
        $usuario,
        $password,
        $baseDatos
    );

    if ($conexion->connect_error) {
        die("Error de conexion" . $conexion->connect_error);
    }

?>