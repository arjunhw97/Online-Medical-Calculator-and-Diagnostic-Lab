<?php
session_start();
$session = $_SESSION['username'];
$test='Mean Arterial Pressure (MAP)';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Mean Arterial Pressure (MAP)</title>
	<link rel="stylesheet" type="text/css" href="calcss/UM1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Mean Arterial Pressure (MAP)</h4>
<form method="post" action="">  
<h3 class="l1">Systolic BP</h3><input type="text" name="t1" placeholder="kg" class="tb1" required>
<h3 class="l2">Diastolic BP</h3><input type="text" name="t2" placeholder="mmol/L" class="tb2" required>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
  
  $y=$_POST['t1'];
  $z=$_POST['t2'];
  $a=((1/3)*$y)+((2/3)*$z);
  $a=round($a,2);
  $_SESSION['a']=$a;
  $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
 mysqli_query($conn,$sql);

}
?>
<input type="text" value="<?php echo $a ?> mm Hg" class="tb3">
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
  $test='Mean Arterial Pressure (MAP)';
  $unit='mm Hg';
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM tests WHERE username='$session' AND testname='$test';";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($res);
  if($row==0)
  {
     $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UM1.php')";
  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>
