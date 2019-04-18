<?php
session_start();
require("../includes/db_info.php");


if(isset($_POST['date']))
{
    $date=$mysqli->real_escape_string($_POST['date']);
}
else
{
    die("dont mess around bro");
}
if(isset($_POST['arrival']))
{
    $arrival=$mysqli->real_escape_string($_POST['arrival']);
}
else
{
    die("dont mess around bro");
}
if(isset($_POST['leave']))
{
    $leave=$mysqli->real_escape_string($_POST['leave']);
}
else
{
    die("dont mess around bro");
}
if(isset($_GET['id']))
{
  $ids=$_GET['id'];
}
else
{
    die("dont mess around bro");
}

$stmt=$mysqli->prepare('INSERT INTO employee_attend(employee_id, date , start_time, end_time) values(?,?,?,?)');
$stmt->bind_param('isss',$ids,$date,$arrival,$leave);
$stmt->execute();
header("Location: ./employee.php?id=$ids");





?>