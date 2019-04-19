<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>


<link href="../bootstrap.min.css" rel="stylesheet">

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
<?php
  include 'header.php';
  include 'library.php';
  noAccessIfNotLoggedIn();
  noAccessForNormal();
  noAccessForClerk();
  noAccessForAdmin();

  include("nav-bar.php");
?>
<div class = 'container'>
<div class="row">
          <div class="col-lg-12">
<h3 style="text-align:center;padding-bottom:10px;">Request Info</h3>
<?php 

$email_id=$_SESSION['username'];
$sql = "SELECT id FROM employees WHERE email = '$email_id'";
$result = $connection->query($sql);
$id = $result->fetch_array()['id'];

?>

  <form method="POST" action="request_med_equip.php">
    <input  type="text" style="display:none;" name="doctor_id" value="<?=$id?>">
    <div class="wrap-login100" style="padding-top: 100px;margin-right: auto; margin-left: auto;">
    <div class="wrap-input100 validate-input" data-validate = "Request info is required">
						<input class="input100" type="text" name="request_info" placeholder="Request">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							
						</span>
                    </div>
    
    <input type="submit"  class="btn btn-light right" style="display:flex;margin:auto;margin-bottom:15px;" value="Submit"/>
    </div>
 </form>
  
  <br>
  

</div>
</div>
</div>