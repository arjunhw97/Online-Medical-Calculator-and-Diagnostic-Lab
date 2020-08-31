<!DOCTYPE html>
<html>
<head>
	<title>DASH Prediction Score for Recurrent VTE</title>
	<link rel="stylesheet" type="text/css" href="calcss/UD1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
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
  $_SESSION['a']=$a;
  $test='DASH Prediction Score for Recurrent VTE';
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
</div>
</body>
</html>