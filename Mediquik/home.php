<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
    <meta charset="UTF-8">
    <title>LANDING PAGE</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>



<?php

session_start();
if(!$_SESSION['username']){
    echo "you are not logged in";
    header('Location:index.php');
}

else
{
    $a = $_SESSION['username'];
    $username = 'arjun';
    $password = '123';
    $db = 'medi';
    $conn = mysqli_connect('localhost', $username, $password, $db);
    $sql = "SELECT * FROM `userinfo` WHERE username='$a'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $f = $row['firstname'];
    $l = $row['lastname'];
}

?>

<div class="container">   
    <div class="outerbox"></div>
    
    
   
    <div class ="header">

        
        <nav>
            <ul>
                <li><a href ="home.php">HOME</a></li>
                <li><a href ="usercalc.php">MEDICAL CALC</a></li>
                <li><a href ="fused.php">FREQUENTLY USED</a></li>
                <li><a href ="olab.php">ONLINE LAB</a></li>
                <li><a href ="inventory.php">MYTESTS</a></li>
                <li><a href ="report.php">REPORT</a></li>
            </ul>
        </nav>
        <button onclick="window.location.href = 'profile.php'" class ="btn">PROFILE</button>
        <button onclick="window.location.href = 'logout.php'" class ="btn2">LOG OUT</button>
    </div>
    <h1 class="q1">WELCOME</h1>
    <h1 class="q2"> <?php echo $f." ".$l ?> </h1>

</div>




