<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
    <meta charset="UTF-8">
    <title>LANDING PAGE</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>



<?php
if (session_id() != '') {
    session_destroy();
}
?>

<div class="container">   
    <div class="outerbox"></div>
    <div class="innerbox1"></div>

     <button  onclick="window.location.href = 'login.php'" class ="btn1">ONLINE DIGNOSTIC LAB</button>
    <div class="innerbox2"></div>
    <button  onclick="window.location.href = 'calc.php'" class ="btn2">MEDICAL CALCULATOR</button>
    <div class="innerbox3"></div>
   
   
    <div class ="header">

        <div class="img"></div>
        <nav>
            <ul>
                <li><a class=active href ="index.php">HOME</a></li>
                <li><a href ="calc.php">MEDICAL CALCULATOR</a></li>
                <li><a href ="about.php">ABOUT</a></li>
            </ul>
        </nav>
        <button onclick="window.location.href = 'login.php'" class ="btn">LOG IN</button>
    </div>
    <h1 class="q1">Get Instant Results With</h1>
    <h1 class="q2">Mediquik</h1>


</div>




