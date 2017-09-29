<?php
  if(isset($_POST['changeStudent'])){
  //Connect to the Database
  include("dbcon.php");

  //Captured Modified Data
	$studentID = $_POST['studentID'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $dateOfRegistration = $_POST['date'];
  $gender = $_POST['gender'];
  $school = $_POST['school'];
  $modeOfTransportation = implode (", ", $_POST['transportation']);


  $required = array('firstName', 'lastName', 'date', 'gender', 'school','transportation');

  $error = false;
  foreach($required as $field) {
    if (empty($_POST[$field])) {
      $error = true;
    }
  }

  if($error){
    $empty = '<div class="alert alert-warning">
                    <strong>Warning</strong> Please do not leave empty fields. Please <a href="index.php"> click here</a> to go back to the main page and check the radio button of the student data that you would like to edit.
                  </div>';
              }

  if(!$error){
      if ($stmt = $dbConnect->prepare("UPDATE students SET firstName = ?, lastName = ?, dateOfRegistration = ?, gender = ?, school = ?, modeOfTransportation = ? WHERE id= ?")) {
        // Bind the variables to the parameter as strings.
        $stmt->bind_param("ssssssi", $firstName, $lastName, $dateOfRegistration, $gender, $school, $modeOfTransportation, $studentID);
        // Execute the statement.
        $stmt->execute();
        // Close the prepared statement.
        $stmt->close();
        //Relocate to index.php
        header("Location: index.php");
    }
  }

  //Close the database
  mysqli_close($dbConnect);


  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset=utf-8>
     <title>Student Information System</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Style CSS-->
     <link rel="stylesheet" type="text/css" href="../style.css">
     <!--jQuery-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <!--Icon-->
     <link rel="icon" href="https://lh3.ggpht.com/7B2IoeJhz_RdHhJm6WNhAfbnL3HTyqdtNDI-291PRIASGESP2oxTkMYtMrww2u9L__c=w300">
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <!-- Bootstrap Date-Picker Plugin -->
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
     <!--Custom javaScript-->
     <script src="js/datepick.js"></script>
     <script src="js/imgup.js"></script>
     <script src="js/datepickjQuery.js"></script>
     <!--Custom jQuery-->
     <script src="js/jQuery.js"></script>
   </head>
   <body>
     <?php echo $empty; ?>
   </body>
   </html>
