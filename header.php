<?php
    // Inicia una nueva sesión o reanuda la sesión existente.
    session_start();
    $menuAction = "";

    // Verifica si la variable de sesión 'txtemail' está configurada.
    // Si la variable de sesión 'txtemail' no está igual a 'el usuario en la DB',
    // se redirige al usuario a la página 'login.php'.
    if(isset($_SESSION['txtemail']) != 'codernaf'){
        // Redirige al usuario a la página de inicio de sesión.
        header('location:login.php');
    }

    $menu = [
        "inicio" => [
            "icon" => "./assets/icons/home-d.svg",      // Usa '=>' para asignar valores a las claves
            "ruta" => 'index.php'
        ],
        "portfolio" => [
            "icon" => "./assets/icons/portfolio-d.svg",
            "ruta" => 'portfolio.php'
        ],
        "ajustes" => [
            "icon" => "./assets/icons/settings.svg",      // Usa '=>' para asignar valores a las claves
            "ruta" => 'settings.php'
        ],
        "close" => [
            "icon" => "./assets/icons/close.svg",      // Usa '=>' para asignar valores a las claves
            "ruta" => 'close.php'
        ]
    ];
    
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portfolio php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/menuHamburguer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
</head>
<body>

    <!-- menú mobile -->
   <menu>
    <div class="infoUser">
        <h3>¡Hola! <?php echo $_SESSION['txtemail'] ?></h3>
        <span class="photoPerfil">   
            <img src="./assets/img/profile.png" alt="">
        </span>
    </div>
   
    <div class="hamburger">
        <input class="checkbox" type="checkbox" />
        <svg fill="none" viewBox="0 0 50 50" height="30" width="30">
            <path
            class="lineTop line"
            stroke-linecap="round"
            stroke-width="4"
            stroke="black"
            d="M6 11L44 11"
            ></path>
            <path
            stroke-linecap="round"
            stroke-width="4"
            stroke="black"
            d="M6 24H43"
            class="lineMid line"
            ></path>
            <path
            stroke-linecap="round"
            stroke-width="4"
            stroke="black"
            d="M6 37H43"
            class="lineBottom line"
            ></path>
        </svg>
        </div>

        <section class="menuContent">
            <?php  foreach($menu as $item => $link){ ?>
                <li>
                    <img src="<?php echo $link['icon'];?>" alt="">
                    <a href="<?php echo $link['ruta'];?>" class="button"><?php echo $item; ?></a>
                </li>
              <?php } ?> 
        </section>
   </menu>
    
    