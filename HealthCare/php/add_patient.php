<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<link href="../bootstrap.min.css" rel="stylesheet">
<?php
  include("header.php");
  include("library.php");
  noAccessForAdmin();
  noAccessIfNotLoggedIn();
  if($_SESSION["user-type"] != 'normal'){
    include("nav-bar.php");
  }
?>
<div class="container">
  <h2>Welcome, <?php echo $_SESSION["fullname"];?>!</h2>
      <div class='alert alert-info'>
              <strong>Info!</strong> Appointment will be booked only for today - <?php echo date('j/n/y'); ?>. Appointment time will be between 10:30 to 3:30 or 4:30 to 9:30 once appointment is booked.</div>
            <h3>Enter Information</h3>
            <?php
                  if(isset($_POST["apfullname"])){
                    $i = enter_patient_info($_POST["apfullname"],$_POST['apAge'],$_POST['apweight'],$_POST['apphone_no'],$_POST['apaddress'],$_POST['aBloodType']);
                    appointment_booking($i, $_POST['apSpecialist'], $_POST['apCondition']);
                    unset($_POST['apfullname']); //unset all post variables
                    if (isset($_POST['apfullname'])){
                      echo '<script type="text/javascript">location.reload();</script>';
                    }

                  }
            ?>
            <form action="add_patient.php" method="POST">

            <div class="form-group" >
              <label for="usr">Full Name:</label>
              <input type="text" class="form-control" id="usr" name="apfullname" required>
            </div>

            <div class="form-group">
              <label for="pwd">Age: (in years)</label>
              <input type="number" class="form-control" id="pwd" name="apAge" min="1" max="200" required>
            </div>
            <div class="form-group">
              <label for="pwd">Weight (in kgs):</label>
              <input type="text" class="form-control" id="pwd" name="apweight" min="1" max="300" required>
            </div>
            <div class="form-group">
              <label for="pwd">Phone No:</label>
              <input type="text" class="form-control" id="pwd" name="apphone_no" required>
            </div>
            <div class="form-group">
              <label for="pwd">Address:</label>
              <textarea class="form-control" id="pwd" name="apaddress" required></textarea>
            </div>

            <div class="form-group">
              <label for="pwd">Doctor Needed:</label>
              <select required value=1 name="apSpecialist">
                <option value="Audiologist" class="option">Audiologist - Ear Expert</option>
                <option value="Allergist" class="option">Allergist - Allergy Expert</option>
                <option value="Anesthesiologist" class="option">Anesthesiologist - Anesthetic Expert</option>
                <option value="Cardiologist" class="option">Cardiologist - Heart Expert</option>
                <option value="Dentist" class="option">Dentist - Oral Care Expert</option>
                <option value="Dermatologist" class="option">Dermatologist - Skin Expert</option>
                <option value="Endocrinologist" class="option">Endocrinologist - Endocrine Expert</option>
              </select>
            </div>
           

            <div class="form-group">
          <label for="pwd">Blood Type:</label>
            <select  style="width:7%" required value=1 name="aBloodType">
              <option value="A+" class="option">A+</option>
              <option value="A-" class="option">A-</option>
              <option value="O+" class="option">O+</option>
              <option value="O-" class="option">O-</option>
              <option value="AB" class="option">AB</option>
              <option value="B+" class="option">B+</option>
              <option value="B-" class="option">B-</option>
            </select>
        </div>

            <div class="form-group">
              <label for="pwd">Medical Condition / Purpose of visit:</label>
              <textarea class="form-control" id="pwd" name="apCondition" required></textarea>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary"  style="width:15%; margin-right:10px; margin-bottom: 15px;">
              <input type="reset" name="" class="btn btn-danger" style="width:15%;margin-bottom: 15px;">
            </div>
          </form>
</div>
<?php
  include("footer.php");
?>
