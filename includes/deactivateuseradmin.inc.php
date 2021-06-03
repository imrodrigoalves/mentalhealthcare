<?php

session_start();

    if(isset($_POST['whatusertodelete'])){
        include_once('connection.inc.php');
        
        //Receber dados formulário
        $username = $_POST['whatusertodelete'];
                //Validar se consta um utilizador
                if(empty($username)){
                    $_SESSION['errors'] = "Selecione um utilizador.";
                    header("Location: ../admin.php");
                    exit();
                }else{
                    //Eliminar utilizador
                    $query = "Update user set status = 'deactivated' where username = '".$username."'";
                    mysqli_query($conn, $query);
            
                    $_SESSION['errors']="Desativou a conta de <b>".$username."</b> com sucesso.";
                    header("Location: ../admin.php");
                    exit();
                }              
    }else{
        header("Location: ../index.php");
        exit();
    }

?>