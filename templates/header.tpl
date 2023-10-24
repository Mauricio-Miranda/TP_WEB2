<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Orbitron&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f810954eb8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="header_div_uno">
            <img src="images/lobo.png" alt="lobo" id="logo">
            <h1><span>I</span>nfo<span class="g_logo">G</span>ame<span>s</span></h1>
        </div>
        <div class="header_div_dos">
            <ul class="lista_plataformas"> 
                <li class"items_lista"> <h3><i class="fa-brands fa-steam"></i></h3></li>
                <li class"items_lista"> <h3><i class="fa-brands fa-xbox"></i></h3> </li>
                <li class"items_lista"> <h3><i class="fa-brands fa-playstation"></i></h3></li>
            </ul>  
        </div>
    </header>
    <nav>
        <div class="divBox">
            <button class="btn_nav"> <a href="home" class="a_nav"> Home </a> </button>
        </div>
        
        <div class="divBox">
            <button class="btn_nav"> <a href="games" class="a_nav"> Todos los Juegos </a> </button>
        </div>
        <div class="divBox">
            <button class="btn_nav"> <a href="company" class="a_nav"> Todas las Companias </a> </button>
        </div>

        
        {if isset($smarty.session.loggeado) }
            <div class="divBox">
            <button class="btn_nav"> <a href="agregaJuego" class="a_nav"> Agregar Juego </a> </button>
        </div>
            <div class="divBox">
                <button class="btn_nav"><a href="logout" class="a_nav">({$smarty.session.user}) Logout </a> </button>
            </div>
        {else}
            <div class="divBox">
                <button class="btn_nav"><a href="login" class="a_nav"> Login </a> </button>
            </div>
        {/if}    
        </nav>
        
</nav>

    <script src="js/main.js"></script>
</body>
</html>