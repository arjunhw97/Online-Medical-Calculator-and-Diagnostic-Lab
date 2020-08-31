<!DOCTYPE html>
<html>
<head>
	<title>Serum Osmolality/Osmolarity</title>
	<link rel="stylesheet" type="text/css" href="calcss/US1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Serum Osmolality/Osmolarity</h4>
<h3 class="l1">Sodium</h3><input type="text" name="t1" placeholder="mmol/L" class="tb1" required>
<h3 class="l2">BUN</h3><input type="text" name="t2" placeholder="mmol/L" class="tb2" required>
<h3 class="l3">Glucose</h3><input type="text" name="t3" placeholder="mmol/L" class="tb3" required>
<h3 class="l4">Ethanol (EtOH)</h3><input type="text" name="t4" placeholder="mmol/Kg" class="tb4" required>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
$x=0;
if(isset($_POST['b1']))
{
  $w=$_POST['t1'];
  $x=$_POST['t2'];
  $y=$_POST['t3'];
  $z=$_POST['t4'];
  $a=(2*$w)+($x/2.8)+($y/18)+($z/3.7);
  $a=round($a,3);
  $_SESSION['a']=$a;
  $test='Serum Osmolality/Osmolarity';
  $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
   mysqli_query($conn,$sql);

}
?>
<input type="text" name="t5" value="<?php echo $a ?>" class="tb5">
</form>
</div>
</body>
</html>

