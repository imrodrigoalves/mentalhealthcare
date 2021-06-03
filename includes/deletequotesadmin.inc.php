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
    unlink($caminho);
    
    //Remover Quote base de Dados
        $query = "DELETE FROM quotes where id_quotes = $idquotes;";
        mysqli_query($conn, $query);

        $_SESSION['errors']="Eliminado quote com sucesso.";
        header("Location: ../admin.php#EliminadaQuote");
        exit();
    }else{
        header("Location: ../admin.php");
        exit();
    }

?>