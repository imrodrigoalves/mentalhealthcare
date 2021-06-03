<?php

/* Função para mostrar erros no Login / Registo / Envio Post / Envio Quotes  */
    function displayerrors(){
        /*Atribuição da variável global a um nome mais simples*/
        if(isset($_SESSION['errors'])){
            $errors = $_SESSION['errors'];

            //Mostra o que está dentro da variável
            if(!empty($errors)){
                if(strpos($errors, 'sucesso')){ // Função que procura numa string x texto
                    echo "<div id='box-error' class='errorbox errorbox-success'>".$errors."<a href='#' onclick='closeerrorbox();'><img src='imgs/close.png' class='img-center size24'></a></div>";
                    $_SESSION['errors'] = '';
                }else{
                    echo "<div id='box-error' class='errorbox errorbox-error'>".$errors."<a href='#' onclick='closeerrorbox();'><img src='imgs/close.png' class='img-center size24'></a></div>";
                    $_SESSION['errors'] = '';
                }
            }
        }
    }
?>