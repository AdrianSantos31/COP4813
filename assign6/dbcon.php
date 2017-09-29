<?php
  $serverName = "localhost";
  $username = "n00798593";
  $password = "Adriansantos123";
  $dbName = "n00798593";

  //Create connection
  $dbConnect = new mysqli($serverName, $username, $password, $dbName);

  if ($dbConnect->connect_error){
    die("Connection to the server failed");
  }

 ?>
