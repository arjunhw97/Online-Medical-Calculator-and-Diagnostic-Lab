<?php
session_start();
$session = $_SESSION['username'];
$test='Anion Gap Calculator';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Anion Gap Calculator</title>
	<link rel="stylesheet" type="text/css" href="calcss/UA2.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Anion Gap Calculator</h4>
<h3 class='l1'>Serum sodium level (Na)</h3><input type="text" name="t1" placeholder="mmol/L" class="tb1" required>
<h3 class='l2'>Serum potassium level (K)</h3><input type="text" name="t2" placeholder="mmol/L" class="tb2" required>
<h3 class='l3'>Serum chloride level (Cl)</h3><input type="text" name="t3" placeholder="mmol/Lmmol/L" class="tb3" required>
<h3 class='l4'>Serum bicarbonate level (HCO3)</h3><input type="text" name="t4" placeholder="mmol/L" class="tb4" required>
<input type='submit' name='b1' value="Calculate"  class="btn1">
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
  $a=($w+$x)-($y+$z);
  $_SESSION['a']=$a;
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
  mysqli_query($conn,$sql);
}
?>
<input type="text" name="t5" value="<?php echo $a ?> mmol/L" class="tb5">
</form>
<form method="post" action="">
<input type='submit' name='b2' value='Save' class="btn2">
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['b2']))
{
  if (!array_key_exists("a",$_SESSION))
  {
    echo"<script> alert('please calculate your results to save'); </script>";
  }
  else
  {
   $result=$_SESSION['a'];
   $unit='mmol/L';
   $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql="SELECT * FROM tests WHERE username='$session' AND testname='$test';";
   $res=mysqli_query($conn,$sql);
   $row=mysqli_num_rows($res);
   if($row==0)
   {
      $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UA2.php')";
   }  
   else
   {
   	$sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
   }	
   mysqli_query($conn,$sql);
  }
}
?>
