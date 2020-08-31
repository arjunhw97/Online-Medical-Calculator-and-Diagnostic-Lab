<?php
session_start();
$session = $_SESSION['username'];
$test='Creatinine Clearance (Cockcroft-Gault Equation)';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Creatinine Clearance (Cockcroft-Gault Equation)</title>
	<link rel="stylesheet" type="text/css" href="calcss/UC2.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Creatinine Clearance (Cockcroft-Gault Equation)</h4>
<h3 class="l1">Gender:</h3><h3 class="l5"><input type="radio" name="r1" value="Male" required>Male</h3><h3 class="l6"><input type="radio" name="r1" value="Female">Female</h3>
<h3 class="l2">Age:</h3><input type="text" name="t1" placeholder="Years" class="tb1" required>
<h3 class="l3">Weight</h3><input type="text" name="t2" placeholder="Kg" class="tb2" required>
<h3 class="l4">Creatinine</h3><input type="text" name="t3" placeholder="umol/L" class="tb3" required>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
  
  $x=$_POST['t1'];
  $y=$_POST['t2'];
  $z=$_POST['t3'];
  $s=$_POST['r1'];
  if($s=='Male')
  {
  	$k=1;
  }
  else
  {
  	$k=0.85;
  }
  $a = ((140-$x)*$y*$k)/(72*$z);
  $a=round($a,2);
  $_SESSION['a']=$a;
  $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
}
?>
<input type="text" value="<?php echo $a." ml/min" ?>" class="tb4">
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
  $test='Creatinine Clearance (Cockcroft-Gault Equation)';
  $unit=' ml/min';
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM tests WHERE username='$session' AND testname='$test';";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($res);
  if($row==0)
  {
     $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UC2.php')";
  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>




