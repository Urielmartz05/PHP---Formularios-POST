<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="resultado.php" method="get">

        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="">Materia</label>
        <input type="text" name="materia" id="materia" required>

        <label>Calificacion</label>
        <input type="number" name="calificacion" id="calificacion" min="0" max="10" step="0.1" required>

        <button type="submit">Enviar</button>

    </form>
        
</body>

</html>