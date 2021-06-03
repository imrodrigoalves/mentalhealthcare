<?php

    include_once('connection.inc.php');
    
    $query = "SELECT * FROM user WHERE username='".$_SESSION['utilizador']."'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);

    echo "<li id='useremail'>".$data['email']."</li><li id='usernewpwd'>*******</li><li class='idx' id='usernewpwd2'>*******</li>";

?>