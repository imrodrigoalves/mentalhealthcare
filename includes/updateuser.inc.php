<?php

session_start();

if(isset($_POST['submit'])){
    include_once('connection.inc.php');
    
    //Pesquisar base de dados
    $queryuser = "SELECT * from user where username = '".$_SESSION['utilizador']."'";
    $result = mysqli_query($conn, $queryuser);
    $dados = mysqli_fetch_assoc($result);
    //dados da base de dados
    $utilizador = $dados['username'];
    $pwdbd = $dados['password'];
    $email = $dados['email'];
    $typeuser = $dados['typeuser'];

    //dados do formulário
    $pwdatual = mysqli_escape_string($conn, $_POST['atualpwd']);
    $pwd =  mysqli_escape_string($conn, $_POST['newpwd']);
    $pwdverify = mysqli_escape_string($conn, $_POST['newpwdverify']);
    $email = mysqli_escape_string($conn, $_POST['newemail']);

    //Verificar a inserção da Palavra-passe atual
    if(empty($pwdatual)){
        //Se não conter dados, mensagem de erro.
            $_SESSION['errors'] = 'Insira a palavra-passe atual para prosseguir.';
            header("Location: ../utilizador.php");
            exit();
    }else{
        //Validar se a palavra-passe atual inserida é igual à da base de dados
        if(!password_verify($pwdatual, $pwdbd)){
            //Se não corresponder, mensagem de erro
            $_SESSION['errors'] = 'A palavra-passe atual e a introduzida não conferem.';
            header("Location: ../utilizador.php");
            exit();
        }else{
            //Se a palavra-passe atual corresponder à da base de dados:
            //Palavra-Passe
            //Verificar se a nova palavra-passe foi inserida
            if(!empty($pwd)){
                    //Validar a confirmação da nova palavra-passe
                if($pwd != $pwdverify){
                    //Se não corresponder, mensagem de erro
                    $_SESSION['errors'] = 'A nova palavra-passe não confere com a verificação.';
                    header("Location: ../utilizador.php");
                    exit();
                }else{
                    //Se corresponder , encriptar a nova palavra-passe
                    $newpwd= password_hash($pwd, PASSWORD_DEFAULT);
                }
            }else{
                $newpwd = $pwdbd;
            }// Fim Palavra-Passe

            // QUERY BASE DE DADOS TABELA USERNAME
            $query = "UPDATE user set password='".$newpwd."', email='".$email."', typeuser='".$typeuser."' where username='".$_SESSION['utilizador']."'";
            mysqli_query($conn, $query);

            $queryx = "UPDATE login set status = 0 where username ='".$_SESSION['utilizador']."'";
            mysqli_query($conn, $queryx);
                                
            session_destroy();
            header("Location: ../login.php");
            exit();
        }
    }
}else{
    header("Location: ../utilizador.php");
    exit();
}

?>