<?php

include_once('connection.inc.php');

    // Selecionar todos os dados da tableas post
    $query = "select * from post order by id_post DESC";
    $result = mysqli_query($conn, $query);
    //Consulta nº de resultados
    $resultCheckRows =  mysqli_num_rows($result);
    //Se existir pelo menos um resultado, percorrer o nº de resultados recebido e mostrar dados.
    if($resultCheckRows >= 1){
        for($i=1;$i<=$resultCheckRows;$i++){
            $data = mysqli_fetch_assoc($result);
            $content = $data['content'];
            $author = $data['author'];
            $date = $data['data_insert'];
            echo "<div class='box-post'>";
            echo "<div class='formdelete'><a href='#EliminarPost' class='openoverlaydelete' onclick='deletepost(".$data['id_post'].");'><img src='imgs/eliminar.png' class='size24'></a></div>";  
            echo "<p class='post-content'>".$content."</p><p class='post-author'><by>por</by> ".$author."</p><p class='post-date'>".$date."</p>";
            echo "</div>";
        }
    }else{
        echo "Sem Posts.";
     } //End If  

?>