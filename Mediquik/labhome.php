<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
    <meta charset="UTF-8">
    <title>LANDING PAGE</title>
    <link rel="stylesheet" href="css/labhome.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>



<?php

session_start();
if(!$_SESSION['id']){
    echo "you are not logged in";
    header('Location:index.php');
}

else
{
    $a = $_SESSION['id'];
    $username = 'arjun';
    $password = '123';
    $db = 'medi';
    $conn = mysqli_connect('localhost', $username, $password, $db);
    $result = "SELECT * FROM `labtech` WHERE id='$a'";
    $sql=mysqli_query($conn,$result);
    $row=mysqli_fetch_assoc($sql);
    $_SESSION['fname']=$f=$row['firstname'];
    $_SESSION['lname']=$l=$row['lastname'];     
}  

?>

<div class="container">   
    <div class ="header">
     <nav>
            <ul>
                <li><a href ="labhome.php">HOME</a></li>
                <li><a href ="userlist.php">USERS</a></li>
                <li><a href ="ptests.php">PENDING TESTS</a></li>
                <li><a href ="labinvent.php">INVENTORY</a></li>
        </nav>
        <button onclick="window.location.href = 'labprof.php'" class ="btn">PROFILE</button>
        <button onclick="window.location.href = 'logout.php'" class ="btn2">LOG OUT</button>
    </div>
    <div class="outerbox">
    <h1 class="q1">WELCOME</h1>
    <h1 class="q2"> <?php echo $f." ".$l ?> </h1>
    </div>
</div>




