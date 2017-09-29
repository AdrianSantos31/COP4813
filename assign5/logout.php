<?php
  session_start();
  $username = $_SESSION['username'];
  session_destroy();
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset=utf-8>
     <title>Stock Portfolio Manager</title>
     <!--Style CSS-->
     <link rel="stylesheet" type="text/css" href="../style.css">
     <!--jQuery-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <!--Icon-->
     <link rel="icon" href="https://lh3.ggpht.com/7B2IoeJhz_RdHhJm6WNhAfbnL3HTyqdtNDI-291PRIASGESP2oxTkMYtMrww2u9L__c=w300">
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   </head>
   <body>
     <div class="title-container heading">
       <h1>Stock Portfolio Manager</h1>
     </div>
     <div class="container">
       <div class="row">
         <div class="col-md-4">
         </div>
         <div class="col-md-4">
           <?php
              echo "<h4>Thank you for visiting, $username. Please visit us soon.</h4>";
            ?>
            <h2> Would you like to know more about stocks? <small>Here are some resources: </small></h2>
            <ul>
              <li><a href="http://www.investopedia.com/">Investopedia</a></li>
              <li><a href="http://www.themarket101.com/">The Market 101</a></li>
              <li><b>Site in Construction: <a href="http://www.adriancode.com/">AdrianCode</a></b></li>
            </ul>

            <br>
            <a href="../index.html">
              <button type="button" class="btn btn-primary btn-lg btn-block" id="backPort">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Back to E-Portfolio
                  </button>
            </a>
         </div>
         <div class="col-md-4">
           <h4>Want to log in again?</h4>
           <?php
             $error = $_GET['error'];
             if($error == 1){
               echo '<div class="alert alert-danger">
                       <strong>Error: </strong> You entered the wrong username and/or password.
                     </div>';
             }else if($error == 2){
               echo '<div class="alert alert-warning">
                       <strong>Error: </strong> You did not enter any username and password.
                     </div> ';
             }

            ?>
         <form method="post" action ="authout.php">
           <label for="username">Username:</label>
           <input type="text" class="form-control" id="username" name="username"/>
           <label for="password">Password:</label>
           <input type="password" class="form-control" id="password" name="password"/>
           <br>
           <br>
           <br>
           <input type="Submit" class="btn button-success" name="login">
         </form>
         </div>
       </div>
     </div>
   </body>
   </html>
