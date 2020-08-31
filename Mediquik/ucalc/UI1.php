<?php
session_start();
$session = $_SESSION['username'];
$test='International Prognostic Index for Chronic Lymphocytic Leukemia (CLL-IPI)';
?>
<!DOCTYPE html>
<html>

<head>
	<title>International Prognostic Index for Chronic Lymphocytic Leukemia (CLL-IPI)</title>
	<link rel="stylesheet" type="text/css" href="calcss/UI1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">International Prognostic Index for Chronic Lymphocytic Leukemia (CLL-IPI)</h4>
<h3 class="l1">Age</h3>
<h3 class="l2"><input type="radio" name="r1" value="a1" required>≤65 years</h3><h3 class="l3"><input type="radio" name="r1" value="a2"> > 65 years</h3>
<h3 class="l4">Clinical stage</h3>
<h3 class="l5"><input type="radio" name="r2" value="b1" required>Binet A or Rai</h3><h3 class="l6"><input type="radio" name="r2" value="b2">Binet B-C or Rai I-IV</h3>
<h3 class="l7">Serum β2 microglobulin, mg/L (or µg/mL)</h3>
<h3 class="l8"><input type="radio" name="r3" value="c1" required>≤3.5</h3><h3 class="l9"><input type="radio" name="r3" value="c2"> > 3.5</h3>
<h3 class="l10">IGHV mutational status</h3>
<h3 class="l11"><input type="radio" name="r4" value="d1" required>Mutated</h3><h3 class="l12"><input type="radio" name="r4" value="d2">Unmutated</h3>
<h3 class="l13">TP53 status</h3>
<h3 class="l14"><input type="radio" name="r5" value="e1" required>No abnormalities</h3><h3 class="l15"><input type="radio" name="r5" value="e2">Deletion 17p (FISH) and/or TP53 mutation</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
$txt=0;
if(isset($_POST['b1']))
{
  

  if($_POST['r1']=="a2")
  {
    $a=$a+1;
  }

 
  if($_POST['r2']=="b2")
  {
    $a=$a+1;
  }
  
  
  if($_POST['r3']=="c2")
  {
    $a=$a+2;
  }

  
  if($_POST['r4']=="d2")
  {
    $a=$a+2;
  }
 
  if($_POST['r5']=="e2")
  {
    $a=$a+4;
  }
 
   
  if($a>=0 && $a<=1)
  {
  	$txt="Low Risk";
  }
  elseif($a>=2 && $a<=3)
  {
  	$txt="Intermediary Risk";
  }
  elseif($a>=4 && $a<=6)
  {
  	$txt="High Risk";
  }
  elseif($a>=7 && $a<=10)
  {
    $txt="Very High Risk";
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
<input type="text" value="<?php echo $a.' points - '.$txt ?>" class="tb1">
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
  $test='International Prognostic Index for Chronic Lymphocytic Leukemia (CLL-IPI)';
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
    $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UI1.php')";  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>
