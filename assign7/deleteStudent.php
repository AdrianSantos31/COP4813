<?php
if(isset($_POST['deleteStudent'])){
  //Connect to the database;
  include("dbcon.php");

  //Capture the data from the RadioButton
  $studentID = $_POST["studentID"];

  //Delete mySQL Query
  // $sqlinsert = "DELETE FROM students where id =" .$studentID;
  //
  // $result = mysqli_query($dbConnect, $sqlinsert);
  if($studentID==""){
    header("Location: index.php?error=3");
  }

  if($studentID !=""){
    if ($stmt = $dbConnect->prepare("DELETE FROM students WHERE id = ?")) {
      // Bind the variable to the parameter as a string.
      $stmt->bind_param("i", $studentID);
      // Execute the statement.
      $stmt->execute();
      // Close the prepared statement.
      $stmt->close();
      //Redirect to index.php
      header("Location: index.php");
    }
  }

  //Close the Database
  mysqli_close($dbConnect);


  }
 ?>
