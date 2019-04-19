<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php
require("../hr/includes/db_info.php");
$stmt=$mysqli->prepare('SELECT id ,number , floor, is_occupied FROM rooms WHERE is_occupied=0');
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$number,$floor,$is_occupied);

$stmt1=$mysqli->prepare('SELECT id ,number , floor, is_occupied FROM rooms WHERE is_occupied=1');
$stmt1->execute();
$stmt1->store_result();
$stmt1->bind_result($id,$number,$floor,$is_occupied);


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
<h3>  Available Rooms</h3>

<?php while($stmt->fetch()){

$email_id=$_SESSION['username'];
$sql = "SELECT id FROM employees WHERE email = '$email_id'";
$result = $connection->query($sql);
$id = $result->fetch_array()['id'];

?>

<tr>

  <td>Room Number: <?=$number?></td><br>
  <td>Floor: <?=$floor?></td><br>

  <form method="POST" action="reserve_room.php">
    <input style="display:none;" type="text" name="doctor_id" value="<?=$id?>">
    <input style="display:none;" type="text" name="room_number" value="<?=$number?>">
    <input type="submit"  class="btn btn-light right"  value="Select room"/>
 </form>
  
  <br>
  
</tr>
<?php }?>
</div>

<div class="col-sm-4">
<h3>  Occupied Rooms by you</h3>

<?php while($stmt1->fetch()){

$email_id=$_SESSION['username'];
$sql = "SELECT id FROM employees WHERE email = '$email_id'";
$result = $connection->query($sql);
$num_rows = (int) $result->fetch_array()['0'];

$id = $result->fetch_array()['id'];

?>

<tr>

  <td>Room Number: <?=$number?></td><br>
  <td>Floor: <?=$floor?></td><br>

  <form method="POST" action="unoccupy_room.php">
    <input style="display:none;" type="text" name="room_number" value="<?=$number?>">
    <input type="submit"  class="btn btn-light right"  value="Unoccupy room"/>
 </form>
  
  <br><br>
  
</tr>
<?php }?>
</div>
</div>
</div>