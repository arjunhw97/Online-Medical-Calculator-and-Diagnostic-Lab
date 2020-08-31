<!DOCTYPE html>
<html>
<head>
	<title>HOMA-IR (Homeostatic Model Assessment for Insulin Resistance)</title>
	<link rel="stylesheet" type="text/css" href="calcss/UH1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">HOMA-IR (Homeostatic Model Assessment for Insulin Resistance)</h4>
<h3 class="l1">Insulin</h3><input type="text" name="t1" placeholder="mIU/L" class="tb1" required>
<h3 class="l2">Glucose</h3><input type="text" name="t2" placeholder="mmol/L" class="tb2" required>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
  
  $x=$_POST['t1'];
  $y=$_POST['t2'];
  $a = ($x*$y)/405;
  $a=round($a,2);
  $_SESSION['a']=$a;
  $test='HOMA-IR (Homeostatic Model Assessment for Insulin Resistance)';
  $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
   mysqli_query($conn,$sql);
}
?>
<input type="text" value="<?php echo $a." mg/dL" ?>" class="tb3">
</form>
</div>
</body>
</html>

