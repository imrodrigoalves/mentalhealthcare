<?php

include_once('connection.inc.php');

    $query = "select * from quotes order by id_quotes DESC";
    $result = mysqli_query($conn, $query);
    $resultCheckRows =  mysqli_num_rows($result);

    if($resultCheckRows >= 1){
        if($resultCheckRows > 3 ){
            $numrows = 3;
        }else{
            $numrows = $resultCheckRows;
        }
        for($i=1;$i<=$numrows;$i++){
            $data = mysqli_fetch_assoc($result);
            $content = $data['content'];
            $author_quote = $data['author_quote'];
            $imagename = $data['image_name'];
            $username = $data['username'];
            echo "<div class='box-quote'>";
            echo "<div class='formdelete'><a href='#EliminarQuote' class='openoverlaydelete' onclick='deletequote(".$data['id_quotes'].");'><img src='imgs/eliminar.png' class='size24'></a></div>";  
            echo "<p class='quote-title'>".$content."</p><p class='quote-author'>".$author_quote."</p>";
            echo "<div class='quote-image'><img class='quote-img' src='imgs/quotes/$imagename' alt='$content'></div>";
            echo "<div class='quote-sharedby'><p><by>partilhado por </by>".$username."</p></div>";
            echo "</div>";
        }
    }else{
        echo "Sem Quotes.";
     } //End If  

?>