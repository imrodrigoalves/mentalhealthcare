<?php
    include_once('connection.inc.php');

    $query = "select count(id) as usersonline from login where status = 1";
    $result = mysqli_query($conn, $query);
    $resultvalues = mysqli_fetch_assoc($result);

    echo $resultvalues['usersonline'];

?>