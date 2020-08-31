<?php
session_start();
$session = $_SESSION['username'];
$test='DASH Prediction Score for Recurrent VTE';
$x = 0;
?>

<!DOCTYPE html>
<html>

<head>
	<title>DASH Prediction Score for Recurrent VTE</title>
	<link rel="stylesheet" type="text/css" href="calcss/UD1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">DASH Prediction Score for Recurrent VTE</h4>  
<h3 class="l1">D-dimer abnormal</h3>
<h3 class="l2"><input type="radio" name="r1" value="Yes" required>Yes</h3><h3 class="l3"><input type="radio" name="r1" value="No">No</h3>
<h3 class="l4">Age ≤ 50 years</h3>
<h3 class="l5"><input type="radio" name="r2" value="Yes" required>Yes</h3><h3 class="l6"><input type="radio" name="r2" value="No">No</h3>
<h3 class="l7">sBP less than 90 or greater than 180 mmHg</h3>
<h3 class="l8"><input type="radio" name="r3" value="Yes" required>Yes</h3><h3 class="l9"><input type="radio" name="r3" value="No">No</h3>
<h3 class="l10">Male patient</h3>
<h3 class="l11"><input type="radio" name="r4" value="Yes" required>Yes</h3><h3 class="l12"><input type="radio" name="r4" value="No">No</h3>
<h3 class="h7">Risk is <?php echo $x?> %</h3>
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
  if($_POST['r2']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r3']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r4']=="Yes")
  {
    $a=$a-2;
  }

  if($a==-2)
  {
    $x = 1.8;
  }  
  elseif($x==-1)
  {
    $x = 1.0;
  }  
  elseif($x==0)
  {
    $x = 2.4;
  }  
  elseif($x==1)
  {
    $x = 3.9;
  }  
  elseif($x==2)
  {
    $x = 6.3;
  }  
  elseif($x==3)
  {
    $x = 10.8;
  }  
  else
  {
    $x = 19.9;
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
  $test='DASH Prediction Score for Recurrent VTE';
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
    $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UD1.php')";
  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>





