<?php
session_start();

if(isset($_POST['submitdelete'])){
        include_once('connection.inc.php');
        //Receber dados Form
        $idpost = $_POST['idpost'];
        //Eliminar post com id recebido.
        $query = "DELETE FROM post where id_post = $idpost;";
        mysqli_query($conn, $query);

        $_SESSION['errors']='Eliminado com sucesso.';
        header("Location: ../feed.php");
        exit();
    }else{
        header("Location: ../feed.php");
        exit();
    }


?>