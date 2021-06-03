<?php
session_start();

  if(isset($_POST['submit'])){
    include_once('connection.inc.php');
    
    $content = mysqli_real_escape_string($conn, htmlspecialchars($_POST['post']));
     if($_SESSION['utilizador'] == "Anónimo"){
        $user = $_SESSION['utilizador'];
     }else{
      $user = $_POST['user'];
    }
    $date = date("Y-m-d h:i:s");

    //Verificar base de dados por Post com mesmo conteúdo.
    $search = "SELECT * FROM post WHERE content = '$content' AND author = '$user';";
    $result = mysqli_query($conn, $search);
    $resultCheck = mysqli_num_rows($result);
    //Se sim -> erro.
      if($resultCheck > 0){
          $_SESSION['errors'] = "Oops.. Por favor não repitas os mesmos posts.";
          header('Location: ../feed.php');
          exit();
        }else{
          //Se não -> insere base de dados.
          $insPost = "INSERT INTO post (content,author,data_insert) VALUES ('$content','$user','$date');";
          mysqli_query($conn, $insPost);
          $_SESSION['errors'] = "Enviado com sucesso. Obrigado!";
          header('Location: ../feed.php');
          exit();
      }
  }else{
      header("Location: ../feed.php");
      exit(); 
  }
?>