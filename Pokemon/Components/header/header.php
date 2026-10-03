<link rel="stylesheet" href="/Components/header/header.css">

<header>
    <nav>
        <div class="logo">
            <a href="/index.php"><img src="https://thumb.wikimedia.org/wikipedia/commons/thumb/9/98/International_Pok%C3%A9mon_logo.svg/960px-International_Pok%C3%A9mon_logo.svg.png?utm_source=es.wikipedia.org&utm_campaign=index&utm_content=thumbnail" alt="logo"></a>
        </div>

        <div class="more-info">
            <ul>
                <li>
                    <a href="/index.php">Inicio</a>
                </li>
                <li>
                    <a href="/Pages/All/all.php">Todos</a>
                </li>
                <li>
                    <a href="/Pages/Result/result.php?pokemon=<?php echo rand(1, 1025); ?>">Aleatorio</a>
                </li>
            </ul>
        </div>
    </nav>

</header>