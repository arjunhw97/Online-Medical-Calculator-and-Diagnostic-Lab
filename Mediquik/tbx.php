<!DOCTYPE html>
<html>
<?php
 session_start();
 $a=$_SESSION['username'];
 $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "SELECT * FROM userinfo WHERE username='$a'";
 $res = mysqli_query($conn,$sql);
 $r = mysqli_fetch_assoc($res);


?>
<head>
  <title>Textboxes</title>
  <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b3" class="btn" value="Profile">
<div class="container">
<input type="text" name="t1" class="tb1" value="<?php echo $r['firstname'] ?>">
<input type="text" name="t2" class="tb2" value="<?php echo $r['lastname'] ?>">
<input type="text" name="t3" class="tb3" value="<?php echo $r['username'] ?>">
<input type="text" name="t4" class="tb4" value="<?php echo $r['gender'] ?>">
<input type="date" name="t5" class="tb5" value="<?php echo $r['dateofbirth'] ?>">
<input type="text" name="t6" class="tb6" value="<?php echo $r['address'] ?>">
<input type="text" name="t7" class="tb7" value="<?php echo $r['email'] ?>">
<input type="text" name="t8" class="tb8" value="<?php echo $r['height'] ?>">
<input type="text" name="t9" class="tb9" value="<?php echo $r['weight'] ?>">
<h3 class ="l1">First Name</h3>
<h3 class ="l2">Last Name</h3>
<h3 class ="l3">Username</h3>
<h3 class ="l4">Gender</h3>
<h3 class ="l5">Date Of Birth</h3>
<h3 class ="l6">Address</h3>
<h3 class ="l7">E-mail</h3>
<h3 class ="l8">Height</h3>
<h3 class ="l9">Weight</h3>
<div class="box">
<input type="submit" name="b1" value="Save" class="btn1">
<input type="reset" name="b2" value="Reset" class="r">
</div>
</div>
</form>
<?php
if(isset($_POST['b1']))
{
 $a=$_SESSION['username'];	
 $b=$_POST['t1'];
 $c=$_POST['t2'];
 $d=$_POST['t3'];
 $e=$_POST['t4'];
 $f=$_POST['t5'];
 $g=$_POST['t6'];
 $h=$_POST['t7'];
 $i=$_POST['t8'];
 $j=$_POST['t9'];	
 $k=$_SESSION['username'];
 $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "UPDATE userinfo SET firstname='$b', lastname='$c', username='$d', gender='$e', dateofbirth='$f', address='$g', email='$h', height='$i', weight='$j' WHERE username='$k'";
 mysqli_query($conn,$sql);
 header('Location: tbx.php');
}
if(isset($_POST['b3']))
{
	header('Location: profile.php');
}	


?>

</body>
</html>





