<?php
  //Connect to the Database
  include("dbcon.php");

  if ($stmt = $dbConnect->prepare("SELECT * FROM students ORDER BY id=? DESC")) {
      $query = "SELECT * FROM students ORDER BY id DESC";
      $result = mysqli_query($dbConnect, $query);

      // Fetch the data.
      $stmt->fetch();
      // Display the data.
      //Print the results
      while($row = mysqli_fetch_array($result)){
        $studentID = $row['id'];
        echo '<tr>';
        echo '<td>' ."<input type='radio' name='studentID' value='$studentID'/>" .'</td>';
        echo '<td>' .$row["firstName"] .'</td>';
        echo '<td>' .$row["lastName"] .'</td>';
        echo '<td>' .$row["dateOfRegistration"] .'</td>';
        echo '<td>' .$row["gender"] .'</td>';
        echo '<td>' .$row["school"] .'</td>';
        echo '<td>' .$row["modeOfTransportation"] .'</td>';
        echo '</tr>';
      }

      // Close the prepared statement.
      $stmt->close();

  }
 ?>
