<?php

  $q = ($_GET['q']);

  include("dbcon.php");
  if($q=="x"){
      $sqlinsert="SELECT * FROM students ORDER BY id DESC";
  }else{
    $sqlinsert="SELECT * FROM students WHERE school = '$q' ORDER BY id DESC";
  }

  $result = mysqli_query($dbConnect,$sqlinsert);

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
  
    mysqli_close($dbConnect);
 ?>
