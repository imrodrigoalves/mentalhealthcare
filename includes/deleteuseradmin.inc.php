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
                    //Pesquisar se utilizador tem Posts Feitos
                    $queryposts = "select * from post where author ='".$username."'";
                    $resultposts = mysqli_query($conn, $queryposts);
                    $resultpostsrows = mysqli_num_rows($resultposts);
                        //Pesquisar se utilizador tem Quotes Feitas
                        $queryquotes = "select * from post where author = '".$username."'";
                        $resultquotes = mysqli_query($conn, $queryquotes);
                        $resultquotesrows = mysqli_num_rows($resultquotes);

                        //Validar caso tenha um dos dois, não ser possível eliminar
                    if( ($resultpostsrows > 0) || ($resultquotesrows > 0) ){
                        $_SESSION['errors']="Não foi possível eliminar este utilizador, pois contém posts ou quotes.";     
                        header("Location: ../admin.php");
                        exit();
                    }else{
                        //Pesquisar pelo utilizador na base de dados
                        $queryuser = "SELECT * FROM user WHERE username = '".$username."'";
                        $result = mysqli_query($conn,$queryuser);
                        $data = mysqli_fetch_assoc($result);
                        //Definir imagem e eliminar.
                        if($data['avatar']!= "defaultuser.png"){
                            $caminhoimg =  $_SESSION['path']."/imgs/avatar/".$data['avatar'];
                            if(!unlink($caminhoimg)){
                                $_SESSION['errors'] += "\n Não foi possível eliminar a imagem do utilizador ".$username;
                            };
                        }

                        //Eliminar utilizador
                        $query = "Update user set status = 'deactivated' where username = '".$username."'";
                        mysqli_query($conn, $query);
                
                        $_SESSION['errors']="Desativou a conta de <b>".$username."</b> com sucesso.";
                        header("Location: ../admin.php");
                        exit();
                    }
                }
    }else{
        header("Location: ../index.php?erro");
        exit();
    }

?>