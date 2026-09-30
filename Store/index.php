<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="form-main-container">

        <div class="title">
            <h1>Store</h1>
        </div>

        <form action="resultado.php" method="get" class="form-container">

            <label for="cliente">Cliente</label>
            <input type="text" name="cliente" id="cliente" require>

            <label for="producto">Producto</label>
            <input type="text" name="producto" id="producto" require>

            <label for="precio-unitario">Precio Unitario</label>
            <input type="text" name="precio-unitario" id="precio-unitario" require>

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" require min="1" max="1000">

            <button type="submit" class="submit-button">Calcular Total</button>

        </form>
        
    </div>
    
</body>
</html>