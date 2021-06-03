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
            echo "<div class='box-quoteindex'>";
            echo "<p class='quote-title'>".$content."</p><p class='quote-author'>~ ".$author_quote."</p>";
            echo "<img class='quote-imageindex' src='imgs/quotes/$imagename' alt='$content'>";
            echo "<p class='quote-sharedby'><by>partilhado por </by>".$username."</p>";
            echo "</div>";
            echo "<hr>";
        }
    }else{
        echo "Sem Quotes.";
     } //End If  

?>