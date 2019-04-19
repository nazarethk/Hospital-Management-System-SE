<?php
session_start();
require("../hr/includes/db_info.php");

if(isset($_POST['request_id']))
{
    $request_id=$mysqli->real_escape_string($_POST['request_id']);
    
}

else
{
    die("dont mess around bro");
}

    $stmt=$mysqli->prepare("UPDATE `medicine_requests` SET `is_ordered` = '1' WHERE `medicine_requests`.`id` = $request_id;");
    $stmt->execute();
    header("Location: ../php/medical_staff.php");

?>