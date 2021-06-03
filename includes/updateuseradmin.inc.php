<?php

session_start();

if(isset($_POST['updateuseradmin'])){
    include_once('connection.inc.php');
    
    $newtypeuser = $_POST['changetypeuser'];
    $username = $_POST['user'];

        if(empty($username)){

            $_SESSION['errors']= " Nenhum utilizador selecionado. ";
            header("Location: ../admin.php");
            exit();
            
        }else{

            //Query base de dados
            $queryupdateuser = "UPDATE user set typeuser = '".$newtypeuser."' where username = '".$username."';";
            mysqli_query($conn, $queryupdateuser);
        
            $_SESSION['errors']="Alterou o tipo de utilizador da conta <b>".$username."</b> para <b>".$newtypeuser."</b> com sucesso.";
        
            header("Location: ../admin.php");
            exit();
        }

    }else{

        header("Location: ../admin.php");
        exit();

    }

?>