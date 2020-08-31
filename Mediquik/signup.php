<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="css/sign.css">
</head>
<form method="post" action="">
<body>
<button onclick="window.location.href = 'index.php'" class ="btn">HOME</button>
	<div class="container">
  <h4 class="head">Sign Up</h4>
	<h3 class ="l1">First Name</h3>
	<input type=text name="t1" class="tb1" required="Please Fill">
      <h3 class ="l2">Last Name</h3>
	<input type=text name="t2" class="tb2" required="Please Fill">
	 <h3 class ="l3">Gender</h3>
	<input type=text name="t3" class="tb3" required="Please Fill">
	 <h3 class ="l4">Date Of Birth</h3>
	<input type="date" name="dob" class="tb4" required="Please Fill">
      <h3 class ="l5">Username</h3>
	<input type=text name="t4" class="tb5" required="Please Fill">
      <h3 class ="l6">Password</h3>
	<input type=password name="t5" class="tb6" required="Please Fill">
      <h3 class ="l7">Address</h3>
	<input type=text name="t6" class="tb7" required="Please Fill">
      <h3 class ="l8">Ph No:</h3>
	<input type=text name="t7" class="tb8" required="Please Fill">
	 <h3 class ="l9">E-mail</h3>
	<input type=email name="t8" class="tb9" required="Please Fill">
	 <h3 class ="l10">Height</h3>
	<input type=text name="t9" class="tb10" required="Please Fill" placeholder="In cm">
	 <h3 class ="l11">Weight</h3>
	<input type=text name="t10" class="tb11" required="Please Fill" placeholder="In Kg">
	<input type=submit name="b1" value="Signup" class="btn1">
   </div>

</body>

<?php
   if(isset($_POST['b1']))
   {

     $a=$_POST['t1'];
     $b=$_POST['t2'];
     $c=$_POST['t3'];
     $d=$_POST['t4'];
     $e=$_POST['t5'];
     $f=$_POST['t6'];
     $g=$_POST['t7'];
     $h=$_POST['t8'];
     $i=$_POST['t9'];
     $j=$_POST['t10'];
     $x=$_POST['dob'];
     

 if(!(preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_+[A-Za-z0-9]+)*$/',$d)) || strlen($d) > 25)
 {
    echo"<script> alert('Invalid Username!'); </script>";
 }
  
 $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql= "SELECT * FROM userinfo WHERE username='$d'";
 $res=mysqli_query($conn,$sql);
 $n = mysqli_num_rows($res);
 if($n!=0)
 {
   echo"<script> alert('Username already exists!'); </script>";
 }
 $sql= "SELECT * FROM userinfo WHERE email='$h'";
 $res=mysqli_query($conn,$sql);
 $n = mysqli_num_rows($res);
 if($n!=0)
 {
   echo"<script> alert('This Email is already under use!'); </script>";
 }
 $sql="INSERT INTO userinfo (firstname,lastname,gender,dateofbirth,username,password,address,`phoneno:`,email,height,weight) VALUES ('$a','$b','$c','$x','$d','$e','$f','$g','$h','$i','$j')";
 session_start();
 $_SESSION['username'] = $d;
 $_SESSION['password'] = $e;

 mysqli_query($conn,$sql);
 echo mysqli_error($conn);                       
 header('Location: home.php');

 }
 ?>
</form>
</html>
