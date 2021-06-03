<?php
session_start();
if(isset($_POST['submitdelete'])){
        include_once('connection.inc.php');

        $idpost = $_POST['idpost'];

        $query = "DELETE FROM post where id_post = $idpost;";
        mysqli_query($conn, $query);

        $_SESSION['errors'] = "Eliminado com sucesso.";

        header("Location: ../admin.php#EliminadoPost");
        exit();
    }else{
        header("Location: ../admin.php");
        exit();
    }


?>