<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8>
    <title>Student Information System (AJAX)</title>
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
    <!-- <script src="js/jQuery.js"></script> -->
    <!--AJAX-->
    <script src="js/filter.js"></script>
  </head>
  <body>
    <div class="title-container heading">
      <h1>Improved Student Information System</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="row">
          <br>
          <div class="col-md-4">
          </div>
          <div class="col-md-8">
            <div class="alert alert-info">
              <h3>Filter by School:
                <select name="schools" id="schoolFilter" onchange="showUsers(this.value)">
                  <option value="x">All Schools</option>
                  <option value="University of North Florida">University of North Florida</option>
                  <option value="Jacksonville University">Jacksonville University</option>
                  <option value="Florida State College at Jacksonville">Florida State College at Jacksonville</option>
                  <option value="University of Florida">University of Florida</option>
                  <option value="Florida State University">Florida State University</option>
                </select>
              </h3>
            </div>
          </div>
        </div>
        <!-- <br>
        <div class="alert alert-info">
          <strong>Information:</strong> To <strong>add</strong> a student record, please put the <strong>student information</strong> below. Press the <strong>Add button</strong> afterwards.
                                    <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo <strong>modify</strong> a student record, please select a student by checking the radio button, then click the <strong>Modify button</strong>.
                                    <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThe selected student's information will be populated inside the textbox where you can edit it.
                                    <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo <strong>remove</strong> a student record, please choose the <strong>radio button</strong> of the student record that you want to delete, then press the <strong>Delete button</strong>.
        </div> -->

        <div class="row">
        <div class="col-md-4">
          <h4>Student Details </h4>
          <?php
            $error = $_GET['error'];
            if($error == 1){
              echo '<div class="alert alert-danger alert-dismissable fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error: </strong> Please fill out all data fields.
                    </div>';
            }else if($error == 4){
              echo '<div class="alert alert-danger alert-dismissable fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error: </strong> Please select a school.
                    </div>';
            }
           ?>
          <form method="post">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName"/>
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName"/>
            <label class="control-label" for="date">School Registration Date: </label>
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
            <label for="gender">Gender</label>
            <br>
            <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Other">Other</label>
            <br>
            <label for="school">School:</label>
            <select class="form-control" id="school" name="school">
                <option>Select School</option>
                <option>University of North Florida</option>
                <option>Jacksonville University</option>
                <option>Florida State College at Jacksonville</option>
                <option>University of Florida</option>
                <option>Florida State University</option>
            </select>
            <br>
            <label for="transportation[]">Parking Ticket Type:</label>
            <br>
            <input type="checkbox" name="transportation[]" value="Bicycle"> Bicycle<br>
            <input type="checkbox" name="transportation[]" value="Motorcycle"> Motorcycle<br>
            <input type="checkbox" name="transportation[]" value="Car"> Car<br>
            <br>
            <div class="row">
              <div class="col-md-4">
                <button type="submit" id="addStudent" class="btn btn-block btn-primary"  name="addStudent" formaction="addStudent.php">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add</button>
              </div>
              <div class="col-md-4">
                <button type="submit" id="modifyStudent" class="btn btn-block btn-info" name="modifyStudent" formaction="modifyStudent.php">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modify</button>
              </div>
              <div class="col-md-4">
                <button type="submit" id="deleteStudent" class="btn btn-block btn-danger" name="deleteStudent" formaction="deleteStudent.php">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
              </div>
            </div>
        </div>
        <div class="col-md-8">
          <h4>Students</h4>
          <?php
            $error = $_GET['error'];
            if($error == 2){
              echo '<div class="alert alert-danger alert-dismissable fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error: </strong> Please pick a student data to be edited.
                    </div>';
            }else if($error == 3){
              echo '<div class="alert alert-danger alert-dismissable fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error: </strong> Please pick a student data to be deleted.
                    </div>';
            }
           ?>
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
      <br>
      <div class="row">
        <a href="../index.html">
          <button type="button" class="btn btn-primary btn-lg btn-block" id="backPort">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Back to E-Portfolio
              </button>
        </a>
      </div>
   </div>
  </body>

  </html>
