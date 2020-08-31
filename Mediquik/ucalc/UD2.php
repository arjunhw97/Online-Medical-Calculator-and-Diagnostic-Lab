<?php
session_start();
$session = $_SESSION['username'];
$test='DRAGON Score for Post-TPA Stroke Outcome';
?>
<!DOCTYPE html>
<html>

<head>
	<title>DRAGON Score for Post-TPA Stroke Outcome</title>
	<link rel="stylesheet" type="text/css" href="calcss/UD2.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">DRAGON Score for Post-TPA Stroke Outcome</h4>
<h3 class="l1">HyperDense Cerebral Artery / Early Infarct on CT</h3>
<h3 class="l2"><input type="radio" name="r1" value="No" required>No</h3><h3 class="l3"><input type="radio" name="r1" value="Either">Either</h3><h3 class="l4"><input type="radio" name="r1" value="Both">Both</labe>
<h3 class="l5">Modified Rankin Scale >1, prestroke</h3>
<h3 class="l6"><input type="radio" name="r2" value="Yes" required>Yes</h3><h3 class="l7"><input type="radio" name="r2" value="No">No</h3>
<h3 class="l8">Age</h3>
<h3 class="l9"><input type="radio" name="r3" value="<65" required> < 65 </h3><h3 class="l10"><input type="radio" name="r3" value="65-79">65-79</h3><h3 class="l11"><input type="radio" name="r3" value="≥80">≥80</h3>
<h3 class="l12">Glucose at Baseline>144 mg/dL (8 mmol/L)</h3>
<h3 class="l13"><input type="radio" name="r4" value="Yes" required>Yes</h3><h3 class="l14"><input type="radio" name="r4" value="No">No</h3>
<h3 class="l15">Onset of Treatment >90 minutes</h3>
<h3 class="l16"><input type="radio" name="r5" value="Yes" required>Yes</h3><h3 class="l17"><input type="radio" name="r5" value="No">No</h3>
<h3 class="l18">Baseline NIH Stroke Scale</h3>
<h3 class="l19"><input type="radio" name="r6" value="0-4" required>0-4</h3><h3 class="l20"><input type="radio" name="r6" value="5-9">5-9</h3><h3 class="l21"><input type="radio" name="r6" value="10-15">10-15</h3><h3 class="l22"><input type="radio" name="r6" value="≥16">≥16</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
  
  if($_POST['r1']=="Yes")
  {
    $a=$a+2;
  }
  elseif($_POST['r1']=="Either")
  {
  	$a=$a+1;
  }	
  if($_POST['r2']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r3']=="65-79")
  {
    $a=$a+1;
  }
  elseif($_POST['r3']=="≥80")
  {
  	$a=$a+2;
  }
  if($_POST['r4']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r5']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r6']=="5-9")
  {
  	$a=$a+1;
  }
  elseif($_POST['r6']=="10-15")
  {
  	$a=$a+2;
  }
  elseif($_POST['r6']=="≥16")
  {
  	$a=$a+3;
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
<input type="text" value="<?php echo $a.' points' ?>" class="tb1">
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
  $test='DRAGON Score for Post-TPA Stroke Outcome';
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
     $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UD2.php')";
  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>






