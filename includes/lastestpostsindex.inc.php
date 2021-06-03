<?php

include_once('connection.inc.php');

    $query = "select * from post order by id_post DESC";
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
            $author = $data['author'];
            $date = $data['data_insert'];
            echo "<div class='box-postindex'>";
            echo "<p class='post-content'>".$content."</p><p class='post-author'><by>por</by> ".$author."</p><p class='post-date'>".$date."</p>";
            echo "</div>";
            echo "<hr>";
        }
    }else{
        echo "Sem Posts.";
     } //End If  

?>