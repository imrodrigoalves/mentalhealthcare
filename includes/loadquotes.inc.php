<?php
    include_once('connection.inc.php');

   if(isset($_GET['pesquisarcategory'])){
    $srchcategory = $_GET['pesquisarcategory'];
    $error = "<p>Sem nada para mostrar na categoria <b>".$srchcategory.". </b></p><a href='quotes.php'>Retroceder..</a>";
    $title = "<p>Selecionadas as quotes de: <b>".$srchcategory."</b></p>";

        if(empty($srchcategory)){
            $query = "SELECT quotes.*, user.avatar FROM quotes, user WHERE quotes.username = user.username AND user.status != 'deactivated' ORDER BY id_quotes DESC";
            $error = "";
            $title = "";
        }else{
            $query = "SELECT quotes.*, user.avatar FROM quotes, user WHERE quotes.username = user.username AND category='".$srchcategory."' AND user.status != 'deactivated' ORDER BY id_quotes DESC";
        }

        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            echo $title;
            for($i=1;$i<=$resultCheck;$i++){
                $data = mysqli_fetch_assoc($result);
                    $content = $data['content'];
                    $author_quote = $data['author_quote'];
                    $imagename = $data['image_name'];
                    $username = $data['username'];
                    $avatar = $data['avatar'];

                    echo "<div class='box-quote'>";   
                    if($_SESSION['tipoutilizador'] == 'admin' || $_SESSION['tipoutilizador'] == 'moderador' || $_SESSION['utilizador'] == $username){
                        echo "<div class='formdelete'><a href='#EliminarQuote' class='openoverlaydelete' onclick='deletequote(".$data['id_quotes'].")';><img src='imgs/eliminar.png' class='size24'></a></div>";
                    }      
                        echo "<p class='quote-title'> ".$content."</p>";
                        echo "<p class='quote-author'> ".$author_quote."</p>";
                        echo "<div class='quote-img centervertical'><img class='quote-img' src='imgs/quotes/".$imagename."' alt='$content'></div>";
                        echo "<div class='quote-sharedby'><p><img class='img-center avatar avatar50' src='imgs/avatar/".$avatar."'> ".$username."</p></div>";                  
                        echo "</div>";        
                    }//End For 
        }else{
            echo $error;
        } //End If               
    }else{
        $query = "SELECT quotes.*, user.avatar FROM quotes, user WHERE quotes.username = user.username AND user.status != 'deactivated' ORDER BY id_quotes DESC";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            for($i=1;$i<=$resultCheck;$i++){
                $data = mysqli_fetch_assoc($result);
                    $content = $data['content'];
                    $author_quote = $data['author_quote'];
                    $imagename = $data['image_name'];
                    $username = $data['username'];
                    $avatar = $data['avatar'];

                    echo "<div class='box-quote'>";   
                    if($_SESSION['tipoutilizador'] == 'admin' || $_SESSION['tipoutilizador'] == 'moderador' || $_SESSION['utilizador'] == $username){
                        echo "<div class='formdelete'><a href='#EliminarQuote' class='openoverlaydelete' onclick='deletequote(".$data['id_quotes'].")';><img src='imgs/eliminar.png' class='size24'></a></div>";
                    }      
                        echo "<p class='quote-title'> ".$content."</p>";
                        echo "<p class='quote-author'> ".$author_quote."</p>";
                        echo "<div class='quote-img centervertical'><img class='quote-img' src='imgs/quotes/".$imagename."' alt='$content'></div>";
                        echo "<div class='quote-sharedby'><p><img class='img-center avatar avatar50' src='imgs/avatar/".$avatar."'> ".$username."</p></div>";                  
                        echo "</div>";        
                    }//End For 
        }else{
            echo "Ainda ninguém postou nada. <img src='imgs/sadface.png'>";
        } //End If               
    }
        
?>