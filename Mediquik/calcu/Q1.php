<!DOCTYPE html>
<html>
<head>
	<title>qSOFA (Quick SOFA) Score for Sepsis</title>
	<link rel="stylesheet" type="text/css" href="calcss/UQ1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">qSOFA (Quick SOFA) Score for Sepsis</h4>
<h3 class="l1">Altered mental status</h3>
<h3 class="l2"><input type="radio" name="r1" value="Yes" required>Yes</h3><h3 class="l3"><input type="radio" name="r1" value="No">No</h3>
<h3 class="l4">Respiratory rate ≥22</h3>
<h3 class="l5"><input type="radio" name="r2" value="Yes" required>Yes</h3><h3 class="l6"><input type="radio" name="r2" value="No">No</h3>
<h3 class="l7">Systolic BP ≤100</h3>
<h3 class="l8"><input type="radio" name="r3" value="Yes" required>Yes</h3><h3 class="l9"><input type="radio" name="r3" value="No">No</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
 $a=0;
 $txt=0;
if(isset($_POST['b1']))
{
 $a=0;
  if($_POST['r1']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r2']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r3']=="Yes")
  {
    $a=$a+1;
  }
  if($a>=2)
  {
    $txt="High Risk";
  }
  else
  {
    $txt="Not High Risk";
  }

  $_SESSION['a']=$a;
  $test='qSOFA (Quick SOFA) Score for Sepsis';
  $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
   mysqli_query($conn,$sql);
}
?>
<input type="text" value="<?php echo $a." points - ".$txt ?>" class="tb1">
</form>
</div>
</body>
</html>