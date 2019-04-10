<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="../loginJS/main.js" defer></script>
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<?php 
  include("header.php");
  include("library.php");

  noAccessForClerk();
  noAccessForDoctor();
  noAccessForNormal();

  noAccessIfNotLoggedIn();

?>
 	
  
  <?php 
    if(isset($_POST['demail'])){
  //doctors
      $i = registerD($_POST['demail'],$_POST['dpassword'],$_POST['dfullname'],$_POST['dSpecialist'],$_POST['dphonenumber'],$_POST['droomnumber'],$_POST['dBloodType'],"doctors");
    }
    if(isset($_POST['aemail'])){
      //clerks
      $i = register($_POST['aemail'],$_POST['apassword'] ,$_POST['afullname'],$_POST['aphonenumber'],$_POST['aBloodType'],'non',"clerks");
    }
    if(isset($_POST['DrDelEmail'])){
      $i = delete("doctors",$_POST['DrDelEmail']);
    }
    if(isset($_POST['ClDelEmail'])){
      $i = delete("clerks",$_POST['ClDelEmail']);
    }
    
  ?>

<div class= "container">
<h2 align=center style="font-family: Poppins-Bold;">Admin Panel for HealthCare Medical Center</h2>
      <div class="row">
          <div class="col-md-6 box1">
    <form method="post" action="admin_home.php">
    
      <span class="login100-form-title" style="padding-bottom: 35px;padding-top: 15px;">
						Clerk Registration
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Fullname is required">
						<input class="input100" style="background-color:white;margin-bottom:30px" type="text" name="afullname" placeholder="Full Name" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</span>
					</div>
			
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: username@domain.com">
						<input class="input100" type="email" style="background-color:white;margin-bottom:30px" name="aemail" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required with a minimum of 8 characters">
						<input class="input100" type="password"   style="background-color:white;margin-bottom:30px"  name="apassword" minlength="8" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Phone Number is required">
						<input class="input100" type="text"  style="background-color:white;margin-bottom:29px"  name="aphonenumber" minlength="8" maxlength="12" placeholder="Phone Number" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100">
							<select class='input100'  style="background-color:white;margin-bottom:30px"   required value="1" name="aBloodType">
							<option value="A+" class="option">A+</option>
							<option value="A-" class="option">A-</option>
							<option value="O+" class="option">O+</option>
							<option value="O-" class="option">O-</option>
							<option value="AB" class="option">AB</option>
							<option value="B+" class="option">B+</option>
							<option value="B-" class="option">B-</option>
							</select>
					</div>
					
					<div class="form-group"style="margin-bottom: 0px;">
						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn" style="dislpay:flex;justify-content:center;width:100%;margin-bottom:5px;height:45px;" >
								Register
							</button>
							<button type="reset" class="login100-form-btn btn-danger" style="dislpay:flex;justify-content:center;width:100%;height:45px;" >
								Reset
							</button>
							
						</div>
					</div>
    </form>
      <hr>
  <form method="post" action="admin_home.php">

    

      <div class="wrap-input100">
      <span class="login100-form-title" style="padding-bottom: 35px;padding-top: 100px;">
						Delete Clerk
          </span>
          <select class='input100' style="background-color:white" required value="1" name="ClDelEmail">
            <?php 
                $result = getListOfEmails('clerks');

                if(is_bool($result)){
                  echo "No clerks found in database";
                }else{
                  while($row = $result->fetch_array())
                  {
                    echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                  }
                }

            ?>
            </select>
      </div>
      <div class="form-group" style="margin-bottom: 0px;">
							<button type="submit" class="login100-form-btn btn-danger" style="dislpay:flex;justify-content:center;width:100%;margin-bottom:5px;height:45px;margin-top:15px;" >
								Delete
							</button>
						</div>

</form>
          
          </div>
          <div class="col-md-6 box2">
    <form method="post" action="admin_home.php">
    <span class="login100-form-title" style="padding-bottom: 35px;padding-top: 15px;">
						Doctor Registration
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Fullname is required">
						<input class="input100" style="background-color:white" type="text" name="dfullname" placeholder="Full Name" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</span>
					</div>
			
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: username@domain.com">
						<input class="input100" type="email" style="background-color:white" name="demail" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required with a minimum of 8 characters">
						<input class="input100" type="password"  style="background-color:white" name="dpassword" minlength="8" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Phone Number is required">
						<input class="input100" type="text" style="background-color:white" name="dphonenumber" minlength="8" maxlength="12" placeholder="Phone Number" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Phone Number is required">
						<input class="input100" type="text" style="background-color:white" name="droomnumber" maxlength="3" placeholder="Room Number" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
						</span>
          </div>

          

					<div class="wrap-input100">
							<select class='input100' style="background-color:white"  required value="1" name="dBloodType">
							<option value="A+" class="option">A+</option>
							<option value="A-" class="option">A-</option>
							<option value="O+" class="option">O+</option>
							<option value="O-" class="option">O-</option>
							<option value="AB" class="option">AB</option>
							<option value="B+" class="option">B+</option>
							<option value="B-" class="option">B-</option>
							</select>
          </div>
          
          <div class="wrap-input100">
            <select class='input100' style="background-color:white" required value="1" name="dSpecialist">
              <option value="Audiologist" class="option">Audiologist - Ear Expert</option>
              <option value="Allergist" class="option">Allergist - Allergy Expert</option>
              <option value="Anesthesiologist" class="option">Anesthesiologist - Anesthetic Expert</option>
              <option value="Cardiologist" class="option">Cardiologist - Heart Expert</option>
              <option value="Dentist" class="option">Dentist - Oral Care Expert</option>
              <option value="Dermatologist" class="option">Dermatologist - Skin Expert</option>
              <option value="Endocrinologist" class="option">Endocrinologist - Endocrine Expert</option>
            </select>
        </div>
          
					<div class="form-group" style="margin-bottom: 0px;">
						
							<button type="submit" class="login100-form-btn" style="dislpay:flex;justify-content:center;width:100%;margin-bottom:5px;height:45px;" >
								Register
							</button>
							<button type="reset" class="login100-form-btn btn-danger" style="dislpay:flex;justify-content:center;width:100%;margin-bottom:5px;height:45px;" >
								Reset
							</button>
							
						
        </div>
    </form>


        <hr>
     <form method="post" action="admin_home.php">

        <div class="form-group">
        <span class="login100-form-title" style="padding-bottom: 35px;padding-top: 100px;">
						Delete Doctor
					</span>
            <select class='input100' style="background-color:white" required value="1" name="DrDelEmail">

            <?php 
                $result = getListOfEmails('doctors');

                if(is_bool($result)){
                  echo "No doctors found in database";
                }else{
                  while($row = $result->fetch_array())
                  {
                    echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                  }
                  echo '&emsp;';

                }

            ?>
            </select></div>
            <div class="form-group" style="margin-bottom: 0px;">
							<button type="submit" class="login100-form-btn btn-danger" style="dislpay:flex;justify-content:center;width:100%;margin-bottom:5px;height:45px;" >
								Delete
							</button>
						</div>
          </form>
        </div>
      </div>    
    </div>
  </div>
</div>

<?php include("footer.php"); ?>

