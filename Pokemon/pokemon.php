<?php

    $pokemon = $_GET['pokemon'] ?? "pikachu";
    $url = "https://pokeapi.co/api/v2/pokemon/" . strtolower($pokemon);
    
    $respuesta = file_get_contents($url);
    $datos = json_decode($respuesta, true)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>pokemon</h1>

    <form action="" method="GET">
        <label for="pokemon">Pokemon</label>
        <input type="text" name="pokemon" id="pokemon" placeholder="Busca un pokemon">
        <button type="submit">Buscar</button>
    </form>

    <hr>
    <h2>
        <?php echo $datos['name'] ?>
    </h2>
    <img src="<?php echo $datos['sprites']['front_default'] ?>" width="150">

    <p>
        Tipo: 
        <?php echo $datos['types'][0]['type']['name'] ?>
    </p>

    <p>
        Altura: 
        <?php echo $datos['height'] ?>
    </p>    

    <p>
        Peso: 
        <?php echo $datos['weight'] ?>
    </p>
</body>
</html>