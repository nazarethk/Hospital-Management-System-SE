<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>HealthCare Medical Center</title>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="../css/bootstrap.min.css">
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
  include("./header.php");
  include("./library.php");
  noAccessIfLoggedIn();
?>


 <?php
 $_SESSION['wrongPass']=false;
    if(isset($_POST['lemail'])){
      $i = login($_POST['lemail'],$_POST['lpassword'],"patient","users");
      if($i==1){
        echo '<script type="text/javascript"> window.location = "add_patient.php" </script>';
	  }
    }else if(isset($_POST['remail'])){
      $i = register($_POST['remail'],$_POST['rpassword'],$_POST['rfullname'],$_POST['rphonenumber'],$_POST['rBloodType'],"users");
      if($i==1){
        echo '<script type="text/javascript"> window.location = "add_patient.php"</script>';
      }
	}
	
	unset($_POST);
	
  ?>
		<style>
			@media (max-width: 992px) {
				#title{
					margin-top:25px;
					font-size: 25px !important;
					display:flex;
					justify-content:center;
				}
				#subtitle{
					font-size: 12px;
				}
				#mobile{
					margin-top: -80px;
					padding-top: 100px;
					margin-right: auto;
					margin-left: auto;
					width: 100%;
					min-height: 70vh;
					display: flex;
					flex-wrap: wrap;
					justify-content: center;
					align-items: center;
				}
			}	
			@media (min-width: 992px) {
				#title{
					display:flex;
					justify-content:center;
				}

				#subtitle{
					display:flex;
					justify-content:center;
				}
			}
		</style>

	<h1 id="title"> HealthCare Medical Center</h1>
		<p class="block-quote" id="subtitle" style="color: #003399; display:flex; justify-content:center;">Always bringing world–class medical care for everyone.</p>
  
<body class="container" style="background-image: linear-gradient(to bottom right,#ffffff 0%, #2cbcbc 100%);">
	
	<div class="wrap-login100" style="margin-top: -105px;padding-top: 100px;margin-right: auto; margin-left: auto; width: 100%;min-height: 70vh;display: flex; flex-wrap: wrap; justify-content: center; align-items: center;">

		<div class="login100-pic js-tilt" data-tilt>

			<img src="../images/img-01.png" style="padding-bottom: 75px; margin-left: -50px;" alt="IMG">
		</div>
		
		<form class="login100-form validate-form" action="index.php" method="POST">
			
			<span class="login100-form-title">
				User Login
			</span>
			
		
	<?php if($_SESSION['wrongPass']===true){
		echo'<p style="color:red;display:flex;justify-content:center">Wrong email or password!</p>';
	} ?>


			<div class="wrap-input100 validate-input" data-validate = "Valid email is required: username@domain.com">
				<input class="input100" type="text" name="lemail" placeholder="Email">
				<span class="focus-input100"></span>
				<span class="symbol-input100">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</span>
			</div>

			<div class="wrap-input100 validate-input" data-validate = "Password is required with a minimum of 8 characters">
				<input class="input100" type="password" name="lpassword" minlength="8" placeholder="Password">
				<span class="focus-input100"></span>
				<span class="symbol-input100">
					<i class="fa fa-lock" aria-hidden="true"></i>
				</span>
			</div>
			
			<div class="form-group"style="margin-bottom: 0px;">
				<div class="container-login100-form-btn">


					<button type="submit" class="login100-form-btn" style="dislpay:flex;justify-content:center;width:100%;margin-bottom:15px;" >
						Login
					</button>
					<button type="reset" class="login100-form-btn btn-danger" style="dislpay:flex;justify-content:center;width:100%;" >
						Reset
					</button>
					
				</div>
			</div>
			

			<div class="text-center p-t-136" style="margin: 10px;">
				<a class="txt2" href="./register.php">
					Create your Account 
					<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
				</a><br>
				<a class="txt2" href="./staff.php">
					Staff Login
					<i class="fa fa-user-md" aria-hidden="true"></i>
				</a>
			</div>
			
		
		</form>
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
<?php
include("./footer.php");
?>
</html>