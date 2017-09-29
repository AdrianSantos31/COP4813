<?php
  if(isset($_POST['modifyStudent'])){
    //Connect to the database;
    include("dbcon.php");

    //Capture the data from the RadioButton
    $studentID = $_POST["studentID"];

    $sqlinsert = "SELECT * FROM students where id =" .$studentID;
    $result = mysqli_query($dbConnect, $sqlinsert);
    if($studentID == ""){
      header("Location: index.php?error=2");
    }
    if($studentID!=""){

      if ($stmt = $dbConnect->prepare("SELECT * FROM students WHERE id= ?")) {
        //Bind to the Parameter
        $stmt->bind_param("i", $studentID);
        // Execute the statement.
        $stmt->execute();

        $valid = "<div class='alert alert-info'>
                    <strong>Information:</strong> After the desired changes, please press the <strong>Submit</strong> button. If you want to <strong>go back</strong>, please press the <strong>Back</strong> button.
                  </div>";
        $row = mysqli_fetch_row($result);
        $studentID = $row[0];
        $firstName = $row[1];
        $lastName = $row[2];
        $dateOfRegistration = $row[3];
        $gender= $row[4];
        $school = $row[5];
        $modeOfTransportation = explode(", ", $row[6]);
        //Close
        $stmt->close();
      }
    }
    //Close the database
    mysqli_close($dbConnect);
    }
 ?>
<!-- User guide-->
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

    <!-- <script src="jQuery.js"></script> -->
  </head>
  <body>
    <div class="title-container heading">
      <h1>Student Information System</h1>
    </div>
    <div class="container">
      <div class="row">
        <br>
        <?php echo $valid;?>
        <?php echo $empty;?>
        <div class="row">
        <div class="col-md-4">
          <h4>Student Details </h4>
          <form method="post">
            <input type="hidden" name="studentID" value="<?php echo $studentID?>" />
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName?>"/>
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName?>"/>
            <label class="control-label" for="date">School Registration Date: </label>
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text" value="<?php echo $dateOfRegistration?>"/>
            <label for="gender">Gender</label>
            <br>
            <label class="radio-inline"><input type="radio" name="gender" value="Male" <?php if($gender == 'Male') echo "checked";?>>Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female" <?php if($gender == 'Female') echo "checked";?>>Female</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Other" <?php if($gender == 'Other') echo "checked";?>>Other</label>
            <br>
            <label for="school">School:</label>
            <select class="form-control" id="school" name="school" selected="<?php $school?>">
                <option>Select School</option>
                <option value="University of North Florida" <?php if($school == 'University of North Florida') echo 'selected="selected"';?>>University of North Florida</option>
                <option value="Jacksonville University" <?php if($school == 'Jacksonville University') echo 'selected="selected"';?>>Jacksonville University</option>
                <option value="Florida Stage College at Jacksonville" <?php if($school == 'Florida State College at Jacksonville') echo 'selected="selected"';?>>Florida State College at Jacksonville</option>
                <option value="University of Florida" <?php if($school == 'University of Florida') echo 'selected="selected"';?>>University of Florida</option>
                <option value="Florida State University"<?php if($school == 'Florida State University') echo 'selected="selected"';?>>Florida State University</option>
              </select>
            <br>
            <label for="transportation[]">Parking Ticket Type:</label>
            <br>
            <input type="checkbox" name="transportation[]" value="Bicycle" <?php for($x=0;$x<count($modeOfTransportation);$x++){if($modeOfTransportation[$x]=="Bicycle")echo "checked";}?>> Bicycle
            <br>
            <input type="checkbox" name="transportation[]" value="Motorcycle" <?php for($x=0;$x<count($modeOfTransportation);$x++){if($modeOfTransportation[$x]=="Motorcycle")echo "checked";}?>> Motorcycle
            <br>
            <input type="checkbox" name="transportation[]" value="Car" <?php for($x=0;$x<count($modeOfTransportation);$x++){if($modeOfTransportation[$x]=="Car")echo "checked";}?>> Car<br>
            <br>
            <div class="row">
              <div class="col-md-8">
                <button type="submit" id="applyChanges" class="btn btn-block btn-warning"  name="changeStudent" formaction="changeStudent.php">Submit Changes</button>
              </div>
              <div class="col-md-4">
                <button type="submit" id="applyChanges" class="btn btn-block btn-primary"  name="changeStudent" formaction="index.php">Back</button>

              </div>
            </div>
        </div>
        <div class="col-md-8">
          <h4>Students</h4>
          <div class="row" id="result">
            <table class="table table-hover">
              <thead class="head-decorate">
                <tr>
                  <td></td>
                  <td>First Name</td>
                  <td>Last Name</td>
                  <td>Registration Date</td>
                  <td>Gender</td>
                  <td>School</td>
                  <td>Mode of Transportation</td>
                </tr>
              </thead>
              <tbody id="answers">
                <?php
                  include("studentData.php");
                 ?>
              </tbody>
           </table>
           </div>
           </form>
        </div>
        </div>
      </div>
   </div>
  </body>

  </html>
