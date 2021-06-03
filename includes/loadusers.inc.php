<?php

    include_once('connection.inc.php');

    $query =  "SELECT * from user";
    $result = mysqli_query($conn, $query);
    $resultRows = mysqli_num_rows($result);      

    for($i = 1; $i <= $resultRows; $i++){
        $data = mysqli_fetch_assoc($result);
        $username = $data['username'];
        $typeuser = $data['typeuser'];
        $avatar = $data['avatar'];
        $status = $data['status'];
        if($username != 'admin' && $username !='Anónimo' ){
            if($status == 'deactivated'){
                echo '<li><a href="#" onclick=loaddatauser("'.$username.'","'.$typeuser.'","'.$avatar.'","'.$status.'")><img src="imgs/alterargrey.png" class="img-center size24">'.$data['username'].' Desativada</a></li>';
            }else{
                echo '<li><a href="#" onclick=loaddatauser("'.$username.'","'.$typeuser.'","'.$avatar.'","'.$status.'")><img src="imgs/alterargrey.png" class="img-center size24">'.$data['username'].'</a></li>';
            }
        }
    }

?>