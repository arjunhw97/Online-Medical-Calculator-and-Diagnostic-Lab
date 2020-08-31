
<?php
session_start();
$session = $_SESSION['username'];
$test='EUTOS Score for Chronic Myelogenous Leukemia (CML)';
?>
<!DOCTYPE html>
<html>

<head>
	<title>EUTOS Score for Chronic Myelogenous Leukemia (CML)</title>
	<link rel="stylesheet" type="text/css" href="calcss/UE1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">EUTOS Score for Chronic Myelogenous Leukemia (CML)</h4>
<h3 class="l1">Spleen size</h3><input type="text" name="t1" placeholder="cm" class="tb1" required>
<h3 class="l2">% basophils</h3><input type="text" name="t2" placeholder="%" class="tb2" required>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
 $a=0;
 $txt='';
if(isset($_POST['b1']))
{
 
  $y=$_POST['t1'];
  $z=$_POST['t2'];
  $a=(7*$z)+(4*$y);
  if($a<=87)
  {
  	$txt = "Low";
  }
  else
  {
  	$txt = "High";
  }
   $_SESSION['txt']=$txt;
   $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
 mysqli_query($conn,$sql);

}
?>
<input type="text" value="<?php echo $a ?>" class="tb3"><h3 class="h">Risk is <?php echo $txt ?></h3>
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
  if (!array_key_exists("txt",$_SESSION))
  {
    echo"<script> alert('please calculate your results to save'); </script>";
  }
  else
  {
  $result=$_SESSION['txt'];
  $test='EUTOS Score for Chronic Myelogenous Leukemia (CML)';
  $unit='';
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql="SELECT * FROM tests WHERE username='$session' AND testname='$test';";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($res);
  if($row==0)
  {
     $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UE1.php')";
  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>