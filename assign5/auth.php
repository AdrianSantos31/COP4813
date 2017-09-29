<?php
  //Starts the Session
  session_start();

  //Get the username and password
  $username =$_POST['username'];
  $password =$_POST['password'];

  //Session Username
  $_SESSION['username'] = $username;

  if($username == 'aritzhaupt' && $password == 'coolestProf'){
    header("Location: admin.php");
  }else{
    if($username == "" && $password ==""){
      header("Location: index.php?error=2");
    }else{
    header("Location: index.php?error=1");
  }

  }



 ?>
