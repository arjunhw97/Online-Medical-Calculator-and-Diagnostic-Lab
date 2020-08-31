<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
    <meta charset="UTF-8">
    <title>LANDING PAGE</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>



<?php

session_start();
$a = $_SESSION['name'];

?>

<div class="container">   
    <div class ="header">
     <nav>
            <ul>
                <li><a href ="admin.php">HOME</a></li>
                <li><a href ="adminuser.php">USERS</a></li>
                <li><a href ="adminlab.php">LAB TECHNICIANS</a></li>
                <li><a href ="adgen.php">SITE REPORT</a></li>
            </ul>
        </nav>
        <button onclick="window.location.href = 'index.php'" class ="btn">LOG OUT</button>
    </div>
    <div class="outerbox">
    <h1 class="q1">WELCOME</h1>
    <h1 class="q2"> ADMIN </h1>
    </div>
</div>


