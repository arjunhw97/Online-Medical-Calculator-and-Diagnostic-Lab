<?php
session_start();
$session = $_SESSION['username'];
$test='THRIVE Score for Stroke Outcome';
?>
<!DOCTYPE html>
<html>
<head>
	<title>THRIVE Score for Stroke Outcome</title>
   <link rel="stylesheet" type="text/css" href="calcss/UT1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">	
<div class="container">
<h4 class="head">THRIVE Score for Stroke Outcome</h4>
<h3 class="l1">Age</h3><input type="text" name="t1" placeholder="years" class="tb1" required>
<h3 class="l2">NIH Stroke Scale</h3><input type="text" name="t2" placeholder="points" class="tb2" required>
<h3 class="l3">History of hypertension</h3>
<h3 class="l4"><input type="radio" name="c1" value="c1" required>Yes</h3><h3 class="l5"><input type="radio" name="c1" value="c2">No</h3>
<h3 class="l6">History of diabetes mellitus</h3>
<h3 class="l7"><input type="radio" name="c2" value="c3" required>Yes</h3><h3 class="l8"><input type="radio" name="c2" value="c4">No</h3>
<h3 class="l9">History of atrial fibrillation</h3>
<h3 class="l10"><input type="radio" name="c3" value="c5" required>Yes</h3><h3 class="l11"><input type="radio" name="c3" value="c6">No</h3>
<input type="reset" name="r" class="r">
<input type="submit" name="b1" value="Calculate" class="btn1">
<?php
$z=0;
$a=0;
if(isset($_POST['b1']))
{
  $x=$_POST['t1'];
  $y=$_POST['t2'];
  if($_POST['c1']=='c1')
  {
   $a=$a+1;
  } 
  if($_POST['c2']=='c3')
  {
   $a=$a+1;
  }
  if($_POST['c3']=='c5')
  {
   $a=$a+1;
  }
  if($x>11 && $x<20)
  {
   $a=$a+2;
  }
  elseif($x>=21)
  {
   $a=$a+4;
  }
  if($y>60 && $y<79)
  {
   $a=$a+1;
  }
  elseif($y>=80)
  {
   $a=$a+2;
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

<input type="text" value="<?php echo $a.' points' ?>" class="tb3">
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
  $test='THRIVE Score for Stroke Outcome';
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
     $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UT1.php')";
  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>