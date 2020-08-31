<?php
session_start();
$session = $_SESSION['username'];
$test='AST to Platelet Ratio Index (APRI)';
?>

<!DOCTYPE html>
<html>

<head>
	<title>AST to Platelet Ratio Index (APRI)</title>
	<link rel="stylesheet" type="text/css" href="calcss/UA4.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<div class="container">
<h4 class="head">AST to Platelet Ratio Index (APRI)</h4>
<form method="post" action="">	
<h3 class="l1">AST</h3><input type="text" name="t1" placeholder="U/L" class="tb1" required>
<h3 class="l2">AST Upper Limit Of Normal</h3><input type="text" name="t2" placeholder="U/L" class="tb2" required>
<h3 class="l3">AST Upper Limit Of Normal</h3><input type="text" name="t3" placeholder="*10^9/L" class="tb3" required>
<input type="reset" name="r" class="r">
<input type="submit" name="b1" value="Calculate" class="btn1">
<?php
 $a=0;
if(isset($_POST['b1']))
{
  
   $x=$_POST['t1'];
   $y=$_POST['t2'];
   $z=$_POST['t3'];
   $a=(($x/$y)/$z)*100;
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
<input type="text" value="<?php echo $a ?> points" class="tb4">
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
  $unit='points';
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM tests WHERE username='$session' AND testname='$test';";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($res);
  if($row==0)
  {
     $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UA4.php')";
  }  
  else
  {
  	$sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  }	
  mysqli_query($conn,$sql);
 }
}
?>
