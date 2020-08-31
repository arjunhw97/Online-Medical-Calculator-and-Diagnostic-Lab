<?php
session_start();
$session = $_SESSION['username'];
$test='Arterial Oxygen Content';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Arterial Oxygen Content</title>
	<link rel="stylesheet" type="text/css" href="calcss/UA1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b3" class="btn" value="Home">
</form>	
<form method="post" action="">
<div class='container'>
<h4 class="head">Arterial Oxygen Content</h4>
<h3 class="l1">SaO2</h3><input type=text name='t1' placeholder="in percent" required="field required" class="tb1">
<h3 class="l2">Hgb</h3><input type=text name='t2' placeholder="g/dL" required="field required" class="tb2">
<h3 class="l3">PaO2</h3><input type=text name='t3' placeholder="mmHg" required="field required" class="tb3">
<input type='submit' name='b1' value="Calculate" class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$b=0;
if(isset($_POST['b1']))
{
 $x = $_POST['t1'];
 $y = $_POST['t2'];
 $z = $_POST['t3'];
 $a = (($x*1.36*$y)+(0.0031*$z))/100;
 $b = round($a,2);
 $_SESSION['b'] = $b;
 $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
 mysqli_query($conn,$sql);
}
?>
<input type="text" name="t4" value="<?php echo $b ?> ml O2/100ml" class="tb4">
</form>
<?php 
if(isset($_POST['r']))
{
	$b=0;
}	
?>

<form method="post" action="">
<input type='submit' name='b2' value='Save' class="btn2">
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['b2']))
{
   if (!array_key_exists("b",$_SESSION))
  {
    echo"<script> alert('please calculate your results to save'); </script>";
  }
  else
  {
  $result=$_SESSION['b'];
  $unit='ml O2/100ml';
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM tests WHERE username='$session' AND testname='$test';";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($res);
  if($row==0)
  {
    $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UA1.php')";
  }  
  else
  {
  	$sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  }	
  mysqli_query($conn,$sql);
 }
}
?>