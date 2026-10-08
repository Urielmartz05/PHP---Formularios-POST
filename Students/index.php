
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <main>
        <div>
            <form action="resultado.php" method="get">

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="materia">Materia</label>
                <input type="text" name="materia" id="materia" required>

                <label for="calificacion">Calificacion</label>
                <input type="number" name="calificacion" id="calificacion" min="0" max="10" step="0.1" required>

                <button type="submit">Enviar</button>

            </form>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>