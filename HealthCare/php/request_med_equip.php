<?php
session_start();
require("../hr/includes/db_info.php");

if(isset($_POST['doctor_id']))
{
    $doctor_id=$mysqli->real_escape_string($_POST['doctor_id']);
    
}

if(isset($_POST['request_info']))
{
    $request_info=$mysqli->real_escape_string($_POST['request_info']);
    
}
else
{
    die("dont mess around bro");
}
$stmt=$mysqli->prepare('INSERT INTO medicine_requests(doctor_id,  request_info) values(?,?)');
$stmt->bind_param('is',$doctor_id,$request_info);
    $stmt->execute();
    
    header("Location: ../php/patient_info.php");

?>