<?php
session_start();

if(isset($_POST['submitdelete'])){
    include_once('connection.inc.php');
    
    //DADOS Form
    $idquotes = $_POST['idquotes'];
    
    //Eliminar imagem da pasta 
    $querybd = "SELECT image_name from quotes where id_quotes = $idquotes";
    $result = mysqli_query($conn, $querybd);
    $ficheiro = mysqli_fetch_assoc($result);
    $caminho = $_SESSION['path']."/imgs/quotes/".$ficheiro['image_name'];
    if(!unlink($caminho)){
        $_SESSION['errors']="Não foi possível eliminar a imagem.";
        header("Location: ../quotes.php#ErroEliminar");
        exit();
    };
    
    //Remover Quote base de Dados
        $query = "DELETE FROM quotes where id_quotes = $idquotes;";
        mysqli_query($conn, $query);

        $_SESSION['errors']='Eliminado com sucesso.';
        header("Location: ../quotes.php#EliminadaQuote");
        exit();
    }else{
        header("Location: ../quotes.php");
        exit();
    }

?>