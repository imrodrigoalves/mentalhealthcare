<?php
session_start();

  if(isset($_POST['register'])){
    include_once 'connection.inc.php';

    // Obtenção de Variáveis 
    $username = mysqli_escape_string($conn, htmlspecialchars(str_replace(' ', '',$_POST['username'])));
    $pwd =  mysqli_escape_string($conn, $_POST['pwd']);
    $pwdverify = mysqli_escape_string($conn, $_POST['pwdverify']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $typeuser = 'user';
    $avatar = 'defaultuser.png';

      // Pesquisa na BD por utilizador com mesmo nome pedido no formulário
      $query = "SELECT * FROM user where username = '$username'";

      // Atribuição do resultado da pequisa a uma variável 
      $result = mysqli_query($conn, $query);

      // Função para contagem de valores obtidos
      $resultCheck = mysqli_num_rows($result);

      // Validação da existência de utilizador com mesmo nome
      if($resultCheck > 0){
        // Validar por sim (erro), redirecionar página de registo com mensagem de erro
        $_SESSION['errors'] = 'Já existe esse username. Escolha outro.';
        header('Location: ../register.php');
        exit();
      }else{
        // Validar igualdade de passwords
        if($pwd != $pwdverify){
            // Se as passwords não corresponderem, Redirecionar página de registo com mensagem de erro
            $_SESSION['errors'] = 'As passwords não correspondem.';
            header('Location: ../register.php');
            exit();
          }
        // Senão,
        // Encriptar password
        $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);
        // Preparar Query para a base de dados com inserção dos valores
        $query = "INSERT INTO user (username, email, password, typeuser, avatar, data_registo) values ('$username','$email','$pwdhashed','$typeuser','$avatar','".date("Y-m-d h:i:s")."');";
        $queryx = "INSERT INTO `login` (username, status, date_lastlogin) values('$username', 0, null);";
        // Executar o query
        if(!mysqli_query($conn, $query) || !mysqli_query($conn, $queryx) ){
            // Mensagem de sucesso
            $_SESSION['errors'] = "Ocorreu um erro ao registar..";
            // Redirecionar para página de registo
            header('Location: ../register.php');
            exit();
        }else{
            // Mensagem de sucesso
            $_SESSION['errors'] = "Registado o utilizador <b>".$username."</b> com sucesso. Entre <a href='login.php'>aqui</a>.";
            // Redirecionar para página de registo
            header('Location: ../register.php');
            exit();
        }
      }

  }else{
    header("Location: ../register.php");
    exit();
  }
 
?>