<?php
session_start();
$session = $_SESSION['username'];
$test='RAPID Score for Pleural Infection';
?>
<!DOCTYPE html>
<html>
<head>
	<title>RAPID Score for Pleural Infection</title>
	<link rel="stylesheet" type="text/css" href="calcss/UR1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">RAPID Score for Pleural Infection</h4>
<h3 class="l1">BUN, serum</h3>
<h3 class="l2"><input type="radio" name="r1" value="a1" required> < 14 mg/dL (5 mmol/L)</h3><h3 class="l3"><input type="radio" name="r1" value="a2">14–23 mg/dL (5–8 mmol/L)</h3><h3 class="l4"><input type="radio" name="r1" value="a3"> > 23 mg/dL (8 mmol/L)</h3>
<h3 class="l5">Age, Years</h3>
<h3 class="l6"><input type="radio" name="r2" value="b1" required> < 50</h3><h3 class="l7"><input type="radio" name="r2" value="b2">50-70</h3><h3 class="l8"><input type="radio" name="r2" value="b3"> > 70</h3>
<h3 class="l9">Purulent pleural fluid</h3>
<h3 class="l10"><input type="radio" name="r3" value="c1" required>Yes</h3><h3 class="l11"><input type="radio" name="r3" value="c2">No</h3>
<h3 class="l12">Infection source</h3>
<h3 class="l13"><input type="radio" name="r4" value="d1" required>Community-acquired</h3><h3 class="l14"><input type="radio" name="r4" value="d2">Hospital-acquired</h3>
<h3 class="l15">Serum albumin</h3>
<h3 class="l16"><input type="radio" name="r5" value="e1" required>≥2.7 g/dL (27 g/L)</h3><h3 class="l17"><input type="radio" name="r5" value="e2"> < 2.7 g/dL (27 g/L)</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
  
 $a=0;
  if($_POST['r1']=="a2")
  {
    $a=$a+1;
  }
  elseif($_POST['r1']=="a3")
  {
  	$a=$a+2;
  }	
  if($_POST['r2']=="b2")
  {
    $a=$a+1;
  }
  elseif($_POST['r2']=="b3")
  {
    $a=$a+2;
  }
  if($_POST['r3']=="c2")
  {
    $a=$a+1;
  }
  if($_POST['r4']=="d2")
  {
    $a=$a+1;
  }
  if($_POST['r5']=="e2")
  {
    $a=$a+1;
  }
  $_SESSION['a']=$a;
  $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
 mysqli_query($conn,$sql);

}
?>
<input type="text" value="<?php echo $a." points" ?>" class="tb1">
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
  $test='RAPID Score for Pleural Infection';
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
     $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UR1.php')";
  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>