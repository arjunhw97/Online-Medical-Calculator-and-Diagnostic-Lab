<!DOCTYPE html>
<html>
<head>
	<title>BMR Calculator</title>
	<link rel="stylesheet" type="text/css" href="calcss/UB1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">BMR Calculator</h4>
<h3 class="l1">Gender:</h3><h3 class="l5"><input type=checkbox name=c1 value='Female'>Female</h3><h3 class="l6"><input type=checkbox name=c2 value='Male'>Male</h3>
<h3 class="l2">Age</h3><input type="text" name="t1" class="tb1" required>
<h3 class="l3">Height</h3><input type="text" name="t2" placeholder="cm" class="tb2" required>
<h3 class="l4">Weight</h3><input type="text" name="t3" placeholder="kg" class="tb3" required>
<h3 class="h7">NORMAL RANGE: 1400 - 1800</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$b=0;
$x=0;
if(isset($_POST['b1']))
{
  if(isset($_POST['c1']))
  {
    $x=$x-160;
  }
  else
  {
    $x=$x+5;
  } 
  $y=$_POST['t1'];
  $z=$_POST['t2'];
  $a=$_POST['t3'];
  $b=(10*$a)+(6.25*$z)-(5*$y)+$x;
  $b=round($b,2);
  $_SESSION['b']=$b;
  $test='BMR Calculator';
  $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
   mysqli_query($conn,$sql);
}
?>
<input type="text" value="<?php echo $b ?> calories" class="tb4">
</form>
</div>
</body>
</html>
