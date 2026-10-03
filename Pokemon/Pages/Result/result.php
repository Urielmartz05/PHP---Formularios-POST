<?php

    $nombrePokemon = strtolower(trim($_GET["pokemon"] ?? ''));
    $url = "https://pokeapi.co/api/v2/pokemon/" . $nombrePokemon;
    $respuesta = file_get_contents($url);
    $datos = json_decode($respuesta, true);

    $respuestaEspecie = file_get_contents($datos["species"]["url"]);
    $datosEspecie = json_decode($respuestaEspecie, true);

    $urlEvolution = $datosEspecie["evolution_chain"]["url"];
    $respuestaEvolution = file_get_contents($urlEvolution);
    $datosEvolution = json_decode($respuestaEvolution, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="result.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon <?php echo $datos["name"] ?></title>
</head>

<body>

    <?php include_once('../../Components/header/header.php') ?>

    <main>

        <div class="pokemon-result-main">

            <div class="pokemon-result-container">

                <div class="result-header">
                    <h1><?php echo $datos["name"] ?></h1>
                </div>

                <div class="result-img-container">
                    <div class="frame">
                        <img src="<?php echo $datos["sprites"]["front_default"] ?>">
                    </div>
                </div>

                <div class="pokemon-bottom-info">
                    <div class="pokemon-data">
                        <p class="data-row">
                            <span class="data-label">Tipo:</span>
                            <span class="types-wrapper">
                                <?php foreach ($datos["types"] as $type): ?>
                                    <span class="type-tag"><?php echo $type["type"]["name"] ?></span>
                                <?php endforeach ?>
                            </span>
                        </p>
                        <p class="data-row">
                            <span class="data-label">Altura:</span>
                            <span class="data-val"><?php echo ($datos["height"] / 10) ?> m</span>
                        </p>
                        <p class="data-row">
                            <span class="data-label">Peso:</span>
                            <span class="data-val"><?php echo ($datos["weight"] / 10) ?> kg</span>
                        </p>
                    </div>

                    <div class="info-divider"></div>

                    <div class="evolutions">
                        <p>Fase inicial: <span><?php echo $datosEvolution["chain"]["species"]["name"]; ?></span></p>

                        <?php 
                        $evolutions = $datosEvolution["chain"]["evolves_to"];
                        foreach ($evolutions as $evo): ?>
                            <p>Evolución: <span><?php echo $evo["species"]["name"]; ?></span></p>

                            <?php foreach ($evo["evolves_to"] as $subEvo): ?>
                                <p>Evolución final: <span><?php echo $subEvo["species"]["name"]; ?></span></p>
                            <?php endforeach; ?>

                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="pokemon-stats-container">

                <div class="stats-header">
                    <h2>Estadísticas</h2>
                </div>

                <div class="stats">

                    <div class="stat-container">
                        <h3 class="stat-name">HP</h3>
                        <div class="stat-bar">
                            <progress class="hp-bar" value="<?php echo $datos["stats"][0]["base_stat"] ?>" max="200"></progress>
                            <span class="stat-value hp-value"><?php echo $datos["stats"][0]["base_stat"] ?></span>
                        </div>
                    </div>

                    <div class="stat-container">
                        <h3 class="stat-name">Attack</h3>
                        <div class="stat-bar">
                            <progress class="attack-bar" value="<?php echo $datos["stats"][1]["base_stat"] ?>" max="100"></progress>
                            <span class="attack-value"><?php echo $datos["stats"][1]["base_stat"] ?></span>
                        </div>
                    </div>

                    <div class="stat-container">
                        <h3 class="stat-name">Defense</h3>
                        <div class="stat-bar">
                            <progress class="def-bar" value="<?php echo $datos["stats"][2]["base_stat"] ?>" max="100"></progress>
                            <span class="def-value"><?php echo $datos["stats"][2]["base_stat"] ?></span>
                        </div>
                    </div>

                    <div class="stat-container">
                        <h3 class="stat-name">Special Attack</h3>
                        <div class="stat-bar">
                            <progress class="sp-atk-bar" value="<?php echo $datos["stats"][3]["base_stat"] ?>" max="100"></progress>
                            <span class="sp-atk-value"><?php echo $datos["stats"][3]["base_stat"] ?></span>
                        </div>
                    </div>

                    <div class="stat-container">
                        <h3 class="stat-name">Special Defense</h3>
                        <div class="stat-bar">
                            <progress class="sp-def-bar" value="<?php echo $datos["stats"][4]["base_stat"] ?>" max="100"></progress>
                            <span class="sp-def-value"><?php echo $datos["stats"][4]["base_stat"] ?></span>
                        </div>
                    </div>

                    <div class="stat-container">
                        <h3 class="stat-name">Speed</h3>
                        <div class="stat-bar">
                            <progress class="speed-bar" value="<?php echo $datos["stats"][5]["base_stat"] ?>" max="100"></progress>
                            <span class="speed-value"><?php echo $datos["stats"][5]["base_stat"] ?></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        
    </main>

    <?php include_once('../../Components/footer/footer.php') ?>

</body>
</html>