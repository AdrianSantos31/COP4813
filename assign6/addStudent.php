<?php
  if(isset($_POST['addStudent'])){
    //Connect to the Database
    include("dbcon.php");

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateOfRegistration = $_POST['date'];
    $gender = $_POST['gender'];
    $school = $_POST['school'];
    $transpo = $_POST['transportation'];
    if($transpo==""){
      $transpo="None";
    }
    else if($transpo!=""){
    $modeOfTransportation = implode (", ", $transpo);
    }

      $required = array('firstName', 'lastName', 'date', 'gender', 'school','transportation');

      $error = false;
      foreach($required as $field) {
        if (empty($_POST[$field])) {
          $error = true;
        }
      }

      if($error){
        header("Location: index.php?error=1");
        }
      if(!$error){
        if($school == 'Select School'){
            header("Location: index.php?error=4");
          }
          if($school != 'Select School'){
            if($stmt = $dbConnect->prepare("INSERT INTO students(firstName, lastName, dateOfRegistration, gender, school, modeOfTransportation) VALUES (?, ?, ?, ?, ?, ?)")){
              //Bind the above statements
              $stmt->bind_param("ssssss", $firstName, $lastName, $dateOfRegistration, $gender, $school,$modeOfTransportation);
              // Execute the statement.
              $stmt->execute();
              // Close the prepared statement.
              $stmt->close();
              //Relocate to index.php
              header("Location: index.php");
              }
           }
        }

      mysqli_close($dbConnect);

      //HIDE ALL ERROR
      error_reporting(0);
      // * * * * * * * * * *  * DEBUG MODE * * * * *

  }
 ?>
