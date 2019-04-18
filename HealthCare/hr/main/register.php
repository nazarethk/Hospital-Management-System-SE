<?php
session_start();
require("../includes/db_info.php");
if(isset($_POST['name']))
{
    $name=$mysqli->real_escape_string($_POST['name']);
}
else
{
    die("dont mess around bro");
}
if(isset($_POST['position']))
{
    $position=$mysqli->real_escape_string($_POST['position']);
}
else
{
    die("dont mess around bro");
}

if(isset($_POST['office']))
{
    $office=$mysqli->real_escape_string($_POST['office']);
}
else
{
    die("dont mess around bro");
}


if(isset($_POST['age']))
{
    $age=$mysqli->real_escape_string($_POST['age']);
}
else
{
    die("dont mess around bro");
}
if(isset($_POST['salary']))
{
    $salary=$mysqli->real_escape_string($_POST['salary']);
}
else
{
    die("dont mess around bro");
}
if(isset($_POST['date']))
{
    $date=$mysqli->real_escape_string($_POST['date']);
}

if(isset($_POST['email']))
{
    $email=$mysqli->real_escape_string($_POST['email']);
}
if(isset($_POST['password']))
{
    $password=$mysqli->real_escape_string($_POST['password']);
}
if(isset($_POST['speciality']))
{
    $speciality=$mysqli->real_escape_string($_POST['speciality']);
}
if(isset($_POST['phonenumber']))
{
    $phonenumber=$mysqli->real_escape_string($_POST['phonenumber']);
}
if(isset($_POST['bloodtype']))
{
    $bloodtype=$mysqli->real_escape_string($_POST['bloodtype']);
}
else
{
    die("dont mess around bro");
}



    $password_hashed = hash("sha256", $password);
    $stmt=$mysqli->prepare('INSERT INTO employees(`email`,`password`,`fullname`, `speciality`,`phonenumber`,`bloodtype`,`position`, `office`, `age`, `date`, `salary`) values(?,?,?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('ssssssssiss', $email, $password_hashed, $name, $speciality, $phonenumber, $bloodtype, $position,$office,$age,$date,$salary);
    $stmt->execute();
    header("Location: ./home.php");





?>