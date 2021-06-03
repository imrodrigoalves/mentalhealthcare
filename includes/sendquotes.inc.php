<?php

session_start();

  if(isset($_POST['submit']) && isset($_FILES['image'])){
    include_once('connection.inc.php');
    
    //DADOS
    $content = mysqli_real_escape_string($conn, htmlspecialchars($_POST['contentquote']));
    $author_quote = mysqli_real_escape_string($conn, $_POST['authorquote']);
    $category = $_POST['category'];
    $username = $_SESSION['utilizador'];
    $date = date("Y-m-d h:i:s");

    //IMAGEM
    $ErroFicheiro = $_FILES['image']['error'];
    $NomeFicheiro = $_FILES['image']['name'];
    $NomeTempFicheiro = $_FILES['image']['tmp_name'];//
    $TamanhoFicheiro = $_FILES['image']['size'];
    $Extensao = explode('.',$NomeFicheiro); //FunÃ§Ã£o explode devolve um array que assume valores apÃ³s cada ponto
    $ExtensaoFicheiro = strtolower(end($Extensao)); // strtolower converte texto para minusculas & end retorna o ultimo valor de um array
    $NovoNomeImagem = uniqid().".".$ExtensaoFicheiro; // FunÃ§Ã£o uniqid cria um id Ãºnico
    $caminho = $_SESSION['path']."/imgs/quotes/".$NovoNomeImagem;

    //Verificar base de dados por Quote com mesmo conteÃºdo.
    $search = "SELECT * FROM quotes WHERE content = '$content';";
    $result = mysqli_query($conn, $search);
    $resultCheck = mysqli_num_rows($result);
    
    //VALIDAÃ‡Ã•ES
    // Verificar erro no ficheiro
    if($ErroFicheiro === 0){
      // Verificar tamanho ficheiro maior que 30MB (30000Kb)
      if($TamanhoFicheiro > 30000000){
        $_SESSION['errors'] = "O tamanho máximo de 30Mb foi excedido.".$_FILES['image']['size'];
        header("Location: ../quotes.php");
        exit();
      }else{
        // Verificar conteÃºdo igual
        if($resultCheck > 0){
          $_SESSION['errors'] = "Oops.. Alguém já enviou isso.";
          header("Location: ../quotes.php");
          exit();  
        }else{     
            if(!move_uploaded_file($NomeTempFicheiro, $caminho)){
              $_SESSION['errors'] = "Não foi possível enviar a imagem."; 
              header("Location: ../quotes.php");
              exit();
            }; //FunÃ§Ã£o que move ficheiros de caminho x para y
            $insPost = "INSERT INTO quotes (content,author_quote,username,image_name,category,data_insert) VALUES ('$content','$author_quote','$username','$NovoNomeImagem','$category','$date');";
              if(!mysqli_query($conn, $insPost)){
                $_SESSION['errors'] = "Não foi possível enviar a quote."; 
                header("Location: ../quotes.php");
                exit();  
              };
            $_SESSION['errors'] = "Enviado com sucesso. Obrigado!"; 
            header("Location: ../quotes.php");
            exit();      
        }
      }
    }else{
      //Caso erro no ficheiro
      $_SESSION['errors'] = "Ocorreu um erro ao enviar o ficheiro.";
      header("Location: ../quotes.php");
      exit();  
    }
  }else{
      $_SESSION['errors'] = "Algo inesperado aconteceu. Tente outra vez.";
      header("Location: ../quotes.php");
      exit(); 
  }

?>