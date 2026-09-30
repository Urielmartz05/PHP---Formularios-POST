<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $nombre = trim((string) ($_GET["nombre"] ?? ""));
        $materia = trim((string) ($_GET["materia"] ?? ""));
        $calificacion = filter_var(
            $_GET["calificacion"] ?? "",
            FILTER_VALIDATE_FLOAT
        );

        if (
            $nombre === "" ||
            $materia === "" ||
            $calificacion === false ||
            $calificacion < 0 ||
            $calificacion > 10 
        ) {
            echo "<p>Ingresa todos los datos y una calificacion entre 0 y 10</p>";
        } else {
            echo "<h2>Datos registrados</h2>";
            echo "<p>Nombre: " . htmlspecialchars($nombre, ENT_QUOTES, "UTF-8") . "</p>";
            echo "<p>Materia: " . htmlspecialchars($materia, ENT_QUOTES, "UTF-8") . "</p>";
            echo "<p>Calificacion: ". $calificacion ."</p>";                
        }
    }

?>