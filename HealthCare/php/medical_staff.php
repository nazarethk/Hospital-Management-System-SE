<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php
require("../hr/includes/db_info.php");
$stmt=$mysqli->prepare('SELECT id , request_info FROM medicine_requests WHERE is_ordered=0');
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$request_info);

$stmt1=$mysqli->prepare('SELECT id , request_info FROM medicine_requests WHERE is_ordered=1');
$stmt1->execute();
$stmt1->store_result();
$stmt1->bind_result($id,$request_info);

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
          <div class="col-sm-6">
<h3 style="text-align:center;padding-bottom:10px;">Pending requests</h3>
<?php while($stmt->fetch()){


?>

<tr>

 
<h5 style="text-align:center;">Info: <?=$request_info?></h5><br>

<form method="POST" action="order_item.php">
  <input style="display:none;" type="text" name="request_id" value="<?=$id?>">
  <input type="submit"  class="btn btn-light right" style="display:flex;margin:auto;margin-bottom:15px;" value="Order Request"/>
</form>

<br>

</tr>

  
  <br>
  
  <?php }?>
</div>

<div class="col-sm-6">
<h3 style="text-align:center;padding-bottom:10px;">Made requests</h3>
<?php while($stmt1->fetch()){


?>

<tr>

 
<h5 style="text-align:center;">Info: <?=$request_info?></h5>
<h6 style="text-align:center;color:green;">Order completed!</h6>
<br>

</tr>

  
  <br>
  
  <?php }?>
</div>
</div>
  
  </div>