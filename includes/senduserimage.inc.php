<?php
    session_start();
    include_once('connection.inc.php');

    if(isset($_FILES['image'])){
        // Tratamento de dados da Imagem
        $ErroFicheiro = $_FILES['image']['error'];
        $NomeFicheiro = $_FILES['image']['name'];
        $NomeTempFicheiro = $_FILES['image']['tmp_name'];//
        $TamanhoFicheiro = $_FILES['image']['size'];
        $Extensao = explode('.',$NomeFicheiro); //Função explode devolve um array que assume valores após cada ponto
        $ExtensaoFicheiro = strtolower(end($Extensao)); // strtolower converte texto para minusculas & end retorna o ultimo valor de um array
        $NovoNomeImagem = $_SESSION['utilizador']."avatar.".$ExtensaoFicheiro; // Função uniqid cria um id único
        $caminho = $_SESSION['path']."/imgs/avatar/".$NovoNomeImagem;
        
        //Eliminar Imagem Antiga
        $queryimg = "SELECT avatar FROM user where username = '".$_SESSION['utilizador']."'";
        $resultimg = mysqli_query($conn, $queryimg);
        $data = mysqli_fetch_assoc($resultimg);
        if($data['avatar'] != "defaultuser.png"){
            if(!unlink($_SESSION['path']."/imgs/avatar/".$data['avatar'])){
                $_SESSION['errors'] = "Não foi possível eliminar antiga imagem..";
                $queryx = "Update user set avatar = 'defaultuser.png' where username = '".$_SESSION['utilizador']."'";
                mysqli_query($conn, $queryx);
                $_SESSION['avatar'] = 'defaultuser.png';
            }
        };
        //Mover imagem nova da pasta temporária para pasta dos avatares
        if(!move_uploaded_file($NomeTempFicheiro, $caminho)){
            $_SESSION['errors'] = "Não foi possível enviar a imagem.";  
            $queryxb = "Update user set avatar = 'defaultuser.png' where username = '".$_SESSION['utilizador']."'";
            mysqli_query($conn, $queryxb); 
            $_SESSION['avatar'] = 'defaultuser.png'; 
            header("Location: ../utilizador.php");
            exit();
        }; 

        //Atualizar base de dados com nome da nova imagem
        $query = "UPDATE user set avatar ='".$NovoNomeImagem."' where username='".$_SESSION['utilizador']."'";
        if(!mysqli_query($conn,$query)){
            $_SESSION['errors'] = "Não foi possível atualizar na base de dados.";
            header("Location: ../utilizador.php");
            exit();
        };

        //Sucesso e definição nova imagem 
        $_SESSION['errors'] = "Imagem atualizada com sucesso.";
        $_SESSION['avatar'] = $NovoNomeImagem;
        header("Location: ../utilizador.php");
        exit();
    }else{
        $_SESSION['errors'] = "Ocorreu um erro..";
        header("Location: ../index.php");
        exit();
    }

?>