<?php 

    include_once('connection.inc.php');

    session_start();

        if($_SESSION['sessao'] == true){
            $query = "Update login set status = 0 where username ='".$_SESSION['utilizador']."'";
            mysqli_query($conn, $query);

            session_destroy();
            header("Location: ../logoutpage.php");
            exit();
        }
?>