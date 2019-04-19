<?php
session_start();
require("../hr/includes/db_info.php");


if(isset($_POST['room_number']))
{
    $room_number=$mysqli->real_escape_string($_POST['room_number']);
    
}
else
{
    die("dont mess around bro");
}

    $stmt=$mysqli->prepare("UPDATE `rooms` SET `is_occupied` = '0' WHERE `rooms`.`number` = $room_number;");
    $stmt1=$mysqli->prepare("UPDATE `rooms` SET `doctor_id` = '0' WHERE `rooms`.`number` = $room_number;");
    $stmt->execute();
    $stmt1->execute();
    header("Location: ../php/patient_info.php");

?>