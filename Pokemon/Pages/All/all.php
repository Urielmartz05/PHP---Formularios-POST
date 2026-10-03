<?php

    $limit = 12;
    $pagina = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($pagina < 1) $pagina = 1;

    $offset = ($pagina - 1) * $limit;

    $url = "https://pokeapi.co/api/v2/pokemon?offset={$offset}&limit={$limit}";
    $respuesta = file_get_contents($url);
    $datos = json_decode($respuesta, true);
    $totalPokemons = $datos['count'] ?? 0;
    $totalPages = ceil($totalPokemons / $limit);
    $pokemons = $datos['results'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.css">
    <title>All Pokemons - Page <?php echo $pagina; ?></title>
</head>


<body>

    <?php include_once('../../Components/header/header.php') ?>
    
    <main>
        <div class="pokemon-cards-container">

            <?php foreach ($pokemons as $pokemon): 
                $respuesta = file_get_contents($pokemon['url']);
                $datos = json_decode($respuesta, true);
                $idPokemon = $datos['id'];
                $sprite = $datos['sprites']['front_default'];
                $tipo = $datos['types'][0]['type']['name'];
                $habilidad = $datos['abilities'][0]['ability']['name'];
                $altura = $datos['height'];
                $peso = $datos['weight'];
            ?>

                <div class="card">

                    <div class="card-header">
                        <h1><?php echo $pokemon["name"] ?></h1>
                    </div>

                    <div class="card-img-container">

                        <div class="frame">
                            <img src="<?php echo $sprite; ?>" alt="<?php echo $pokemon['name']; ?>">
                        </div>

                    </div>

                    <div class="card-info-container">

                        <div class="description">

                            <p>Tipo: <?php echo $tipo; ?></p>
                            <p>Habilidades: <?php echo $habilidad; ?></p>
                            <p>Altura: <?php echo $altura; ?></p>
                            <p>Peso: <?php echo $peso; ?></p>
                            
                        </div>
                        
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="pagination">
            <?php if ($pagina > 1): ?>
                <a href="?page=<?php echo $pagina - 1; ?>" class="page-btn">← Anterior</a>
            <?php endif; ?>

            <span class="page-info">Página <?php echo $pagina; ?> de <?php echo $totalPages; ?></span>

            <?php if ($pagina < $totalPages): ?>
                <a href="?page=<?php echo $pagina + 1; ?>" class="page-btn">Siguiente →</a>
            <?php endif; ?>
        </div>
    </main>
    
    <?php include_once('../../Components/footer/footer.php') ?>

</body>
</html>