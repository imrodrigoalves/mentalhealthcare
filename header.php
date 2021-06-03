<?php 

// Iniciar variáveis Sessão
session_start();
//Caminho do servidor
$_SESSION['path'] = str_replace("\\",'/',getcwd());
//Declarar as Variáveis de Sessão
// A função isset verifica se está declarado na página uma x variável
// Com a função not (!) pretende-se verificar se não está declarada a x variável
if(!isset($_SESSION["sessao"])){
    //Definir todas as variáveis com valores Default
    $_SESSION['sessao'] = false;
    $_SESSION['utilizador'] = 'Anónimo';
    $_SESSION['tipoutilizador'] = 'user';
    $_SESSION['email'] = '';
    $_SESSION['errors'] = '';
    $_SESSION['avatar'] = '';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mental Health Care</title>
        <link rel="shortcut icon" href="imgs/logox.png" type="image/png">
        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- JQuery -->
        <script src="jquery/jquery-3.2.1.min.js"></script>
         <!-- JavaScript -->
         <script src="js/script.js"></script>
    </head>
    <body onload="autoReloadindex(); autoReloadadmin(); autoCloseErrorBox(); autopeopleonline();">
        <header>
        <a id="openoverlaymenu" href="#Menu" class="box-menu-header"><i class="fa fa-bars"></i>  Menu</a>
        <div id="overlaymenu" class="overlay" onclick='closeoverlay();'>
            <div id="menu">
            <a href="#Menu" class="closeoverlaymenu box-menu"><i class="fa fa-close"></i>  Menu</a>
                <hr>
                <nav>
                    <ul>
                        <li><a href="index.php"><img src='imgs/home.png' class='img-center size24'> Home</a></li>
                        <li><a href="feed.php"><img src='imgs/post.png' class='img-center size24'> Posting</a></li>
                        <li><a href="quotes.php"><img src='imgs/quotes.png' class='img-center size24'> Quotes</a></li>
                        <li><a href="coaching.php"><img src='imgs/video.png' class='img-center size24'> Coaching</a></li>
                        <li><a href="help.php"><img src='imgs/support.png' class='img-center size24'> Apoio</a></li>
                        <hr>
                        <!-- Validar sessão iniciada ou não -->
                        <?php  
                        if($_SESSION['sessao'] == false){
                            echo "<li><a href='login.php'><img src='imgs/login.png' class='img-center size24'> Iniciar sessão</a></li><li><a href='register.php'><img src='imgs/registar.png' class='img-center size24'> Registar</a></li></ul>";
                        }else{
                            echo "</ul><a href='utilizador.php'><h4><img class='img-center avatar avatar50' src='imgs/avatar/".$_SESSION['avatar']."'> ".$_SESSION['utilizador']."</h4></a>";
                            if($_SESSION['tipoutilizador'] === 'admin'){
                                echo "<a href='admin.php'><img src='imgs/admin.png' class='img-center size24'> Página administração</a><br>";
                            }
                            echo "<a href='utilizador.php'><img src='imgs/alterar.png' class='img-center size24'> Alterar dados</a><br>";
                            /*Botão Sair*/echo "<a href='includes/logout.inc.php'><img class='img-center size24' src='imgs/sair.png'> Terminar Sessão</a>";      
                        }  
                        ?>
                    <li><span id='onlinepeople'><?php include_once('includes/getpeopleonline.inc.php');?></span> utilizador(es) online.</li>
                </nav>
            </div>
        </div>
            <div class="brand">
                <a href="index.php"><img src="imgs/logox.png" alt="Logo" title="Mental Health Care" class="logo"> Mental Health Care</a>
               <p>Somos apenas definidos pela nossa Coragem e Força.</p>
            </div>
            <span id='targetSession'></span>
        </header>
