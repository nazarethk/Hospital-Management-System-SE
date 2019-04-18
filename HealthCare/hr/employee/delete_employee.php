<?php
session_start();
require("../includes/db_info.php");

if(isset($_POST['DeleteEmp']))
{
    $id=$mysqli->real_escape_string($_POST['DeleteEmp']);
    
}
else
{
    die("dont mess around bro");
}

    $stmt=$mysqli->prepare("DELETE FROM employees WHERE id='$id';");
    $stmt1=$mysqli->prepare("DELETE FROM employee_attend WHERE employee_id='$id';");
    $stmt->execute();
    $stmt1->execute();
    header("Location: ../main/home.php");

?>