
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
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <h3>Welcome to Stock Portfolio Manager! Please log in below.</h3>
          <?php
            $error = $_GET['error'];
            if($error == 1){
              echo '<div class="alert alert-danger alert-dismissable fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error: </strong> You entered the wrong username and/or password.
                    </div>';
            }else if($error == 2){
              echo '<div class="alert alert-warning alert-dismissable fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error: </strong> You did not enter any username and password.
                    </div> ';
            }

           ?>
        <form method="post" action ="auth.php">
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
      <div class="col-md-4">
      </div>
    </div>
  </body>

</html>
