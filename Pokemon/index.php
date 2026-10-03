<?php

    $bulbasaur = "https://pokeapi.co/api/v2/pokemon/1/";
    $url1 = "$bulbasaur";
    
    $respuesta1 = file_get_contents($url1);
    $datos1 = json_decode($respuesta1, true);

    $charmander = "https://pokeapi.co/api/v2/pokemon/4/";
    $url2 = "$charmander";
    
    $respuesta2 = file_get_contents($url2);
    $datos2 = json_decode($respuesta2, true);

    $squirtle = "https://pokeapi.co/api/v2/pokemon/7/";
    $url3 = "$squirtle";
    
    $respuesta3 = file_get_contents($url3);
    $datos3 = json_decode($respuesta3, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Search</title>
</head>
<body>

    <?php include_once('Components/header/header.php') ?>

    <main>

        <div class="pokemon-search-container">

            <div class="pokemon-search">
                
                <div class="title-search">
                    <h1>Pokemon Search</h1>
                </div>

                <div class="search-bar">
                    <form action="Pages/Result/result.php" method="GET">
                        <input type="text" name="pokemon" id="pokemon" placeholder="Busca un pokemon">
                        <button type="submit" aria-label="Buscar" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </form>
                </div>
                
            </div>

        </div>

        <div class="pokemon-cards-container">

            <div class="cards-container">
            
                <div class="cards">

                    <div class="card-header">
                        <h1><?php echo $datos1["name"] ?></h1>
                    </div>

                    <div class="card-img-container">
                        <div class="frame">
                            <img src="<?php echo $datos1["sprites"]["front_default"] ?>">
                        </div>

                    </div>

                    <div class="card-info-container">

                        <div class="description">

                            <p>Tipo: <?php echo $datos1["types"][0]["type"]["name"] ?></p>
                            <p>Habilidades: <?php echo $datos1["abilities"][0]["ability"]["name"] ?></p>
                            <p>Altura: <?php echo $datos1["height"] ?></p>
                            <p>Peso: <?php echo $datos1["weight"] ?></p>
                            
                        </div>
                        
                    </div>
                </div>


                <div class="cards">

                    <div class="card-header">
                        <h1><?php echo $datos2["name"] ?></h1>
                    </div>

                    <div class="card-img-container">
                        <div class="frame">
                            <img src="<?php echo $datos2["sprites"]["front_default"] ?>">
                        </div>

                    </div>

                    <div class="card-info-container">

                        <div class="description">

                            <p>Tipo: <?php echo $datos2["types"][0]["type"]["name"] ?></p>
                            <p>Habilidades: <?php echo $datos2["abilities"][0]["ability"]["name"] ?></p>
                            <p>Altura: <?php echo $datos2["height"] ?></p>
                            <p>Peso: <?php echo $datos2["weight"] ?></p>
                            
                        </div>
                        
                    </div>
                    
                </div>


                <div class="cards">

                    <div class="card-header">
                        <h1><?php echo $datos3["name"] ?></h1>
                    </div>

                    <div class="card-img-container">
                        <div class="frame">
                            <img src="<?php echo $datos3["sprites"]["front_default"] ?>">
                        </div>

                    </div>

                    <div class="card-info-container">

                        <div class="description">

                            <p>Tipo: <?php echo $datos3["types"][0]["type"]["name"] ?></p>
                            <p>Habilidades: <?php echo $datos3["abilities"][0]["ability"]["name"] ?></p>
                            <p>Altura: <?php echo $datos3["height"] ?></p>
                            <p>Peso: <?php echo $datos3["weight"] ?></p>
                            
                        </div>
                        
                    </div>
                </div>

            </div>

            <div class="view-more">
                <button onclick="location.href='Pages/All/all.php'">View more</button>
            </div>

        </div>
        
    </main>

    <?php include_once('Components/footer/footer.php') ?>

</body>
</html>