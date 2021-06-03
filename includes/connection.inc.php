<?php

  $dbServername = "localhost";

  $dbUsername = "root";

  $dbPassword = "";

  $dbName = "mhc";



$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){

  header("Location: error_pages/404.php");

  exit();

}

?>

