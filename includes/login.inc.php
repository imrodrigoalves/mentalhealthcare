<?php 
session_start();    

if(isset($_POST['login'])){
    include_once('connection.inc.php');

    $usernamelogin = mysqli_real_escape_string($conn, str_replace(' ', '',$_POST['username']));
    $passwordlogin = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$usernamelogin';";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);

    if($resultCheck = 0 ){
        $_SESSION['errors'] = 'Não foi possível encontrar esse utilizador.';
        header("Location: ../login.php");
        exit();
    }else{
        if(!password_verify($passwordlogin, $data['password'])){
            $_SESSION['errors'] = 'A combinação Utilizador/Password está incorreta.';
            header("Location: ../login.php");
            exit();
        }else{
            $queryloggedin = "select status from login where username = '".$usernamelogin."'";
            $result = mysqli_query($conn, $queryloggedin);
            $resultreceived = mysqli_fetch_assoc($result);
            if($resultreceived['status'] == 1){
                
                $querysetloggedout = "Update login set status = 0 where username = '".$usernamelogin."'";
                mysqli_query($conn, $querysetloggedout);

                $_SESSION['errors'] = 'Já se encontra com sessão iniciada. Tente novamente.';
                header("Location: ../login.php");
                exit();

            }else{
                $queryaccstatus = "select status from user where username = '".$usernamelogin."'";
                $result = mysqli_query($conn, $queryaccstatus);
                $resultreceived = mysqli_fetch_assoc($result);
                if($resultreceived['status'] == 'deactivated'){
                    $_SESSION['errors'] = 'A sua conta encontra-se desativada.';
                    header("Location: ../login.php");
                }else{
                    $_SESSION['sessao'] = true;
                    $_SESSION['utilizador'] = $data['username'];
                    $_SESSION['tipoutilizador'] = $data['typeuser'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['avatar'] = $data['avatar'];
                    $_SESSION['errors'] = 'Login com sucesso.';
                    
                    $query = "Update login set status = 1, date_lastlogin ='".date("Y-m-d h:i:s")."' where username ='".$usernamelogin."'";
                    mysqli_query($conn, $query);
    
                    $_SESSION['errors'] = 'Login com sucesso.';
                    header("Location: ../index.php");
                    exit();
                }
            }
        }
    }
}else{
    header("Location: ../login.php");
    exit();
}

?>