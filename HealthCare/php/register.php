<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HealthCare Medical Center</title>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="../bootstrap.min.css">
<!--===============================================================================================-->	
<link rel="shortcut icon" type="image/png" href="../images/Caduceus-256.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style_login.css">
	<script src="../loginJS/main.js" defer></script>
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>

</head>

	
<?php 
  include("header.php");
  include("library.php");
	noAccessIfLoggedIn();
?>
<body>
	

<div class="container">
<h1 style="display:flex; justify-content:center;"> HealthCare Medical Center</h1>
		<p class="block-quote" style="color: #003399; display:flex; justify-content:center;">Always bringing world–class medical care for everyone.</p>
  
	<div class="wrap-login100" style="margin-top: -105px;padding-top: 100px;margin-right: auto; margin-left: auto;">
	
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" style="padding-bottom: 75px" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="index.php" method="POST">
					<span class="login100-form-title" style="padding-bottom: 35px;padding-top: 15px;">
						Registration
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Fullname is required">
						<input class="input100" type="text" name="rfullname" placeholder="Full Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</span>
					</div>
			
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: username@domain.com">
						<input class="input100" type="text" name="remail" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required with a minimum of 8 characters">
						<input class="input100" type="password" name="rpassword" minlength="8" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Phone Number is required">
						<input class="input100" type="text" name="rphonenumber" placeholder="Phone Number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100">
							<select class='form-control' required value="1" name="rBloodType">
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
							<button type="submit" class="login100-form-btn" style="dislpay:flex;justify-content:center;width:100%;margin-bottom:15px;" >
								Register
							</button>
							<button type="reset" class="login100-form-btn btn-danger" style="dislpay:flex;justify-content:center;width:100%;" >
								Reset
							</button>
							
						</div>
					</div>
				
					
				
				</form>
			</div>

<?php include("footer.php"); ?>
		</div>
		
</div>


	
<!--===============================================================================================-->	
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	




</body>
</html>