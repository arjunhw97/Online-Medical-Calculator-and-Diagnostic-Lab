<!DOCTYPE html>
<html>
<head>
	<title>US (MEDPED) Diagnostic Criteria for Familial Hypercholesterolemia (FH)</title>
	<link rel="stylesheet" type="text/css" href="calcss/UU1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">US (MEDPED) Diagnostic Criteria for Familial Hypercholesterolemia (FH)</h4>
<h3 class="l1">Weight</h3> <input type="text" name="t1" placeholder="Kg" class="tb1" required>
<h3 class="l2">total urine output</h3> <input type="text" name="t2" placeholder="mL" class="tb2" required>
<h3 class="l3">hours</h3> <input type="text" name="t3" placeholder="hours" value='24' class="tb3" required>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
  $x=$_POST['t1'];
  $y=$_POST['t2'];
  $z=$_POST['t3'];
  $a=$y/($x*$z); 
  $a=round($a,3);
  $_SESSION['a']=$a;
  $test='US (MEDPED) Diagnostic Criteria for Familial Hypercholesterolemia (FH)';
  $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
   mysqli_query($conn,$sql);
}
?>
<input type="text" value="<?php echo $a." cc/kg/hr" ?>" class="tb4">
</form>
</div>
</body>
</html>