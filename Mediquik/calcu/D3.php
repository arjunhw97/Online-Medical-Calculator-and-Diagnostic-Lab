<!DOCTYPE html>
<html>
<head>
	<title>D'Amico Risk Classification for Prostate Cancer</title>
	 <link rel="stylesheet" type="text/css" href="calcss/UD3.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">D'Amico Risk Classification for Prostate Cancer</h4>
<h3 class="l1">PSA level</h3>
<h3 class="l2"><input type="radio" name="r1" value="<10 ng/mL" required> < 10 ng/mL</h3><h3 class="l3"><input type="radio" name="r1" value="10-20 ng/mL">10-20 ng/mL</h3>
<h3 class="l4"><input type="radio" name="r1" value=">20 ng/mL"> > 20 ng/mL</h3>
<h3 class="l5">Gleason Score</h3>
<h3 class="l6"><input type="radio" name="r2" value="≤6" required>≤6</h3><h3 class="l7"><input type="radio" name="r2" value="7">7</h3>
<h3 class="l8"><input type="radio" name="r2" value="≥8">≥8</h3>
<h3 class="l9">Clinical stage</h3>
<h3 class="l10"><input type="radio" name="r3" value="T1-T2a" required>T1-T2a</h3><h3 class="l11"><input type="radio" name="r3" value="T2b">T2b</h3>
<h3 class="l12"><input type="radio" name="r3" value="≥T2c">≥T2c
</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
 $a=0;
 $txt=0;
if(isset($_POST['b1']))
{
  if($_POST['r1']=="<10 ng/mL")
  {
    $a=$a+1;
  }
  elseif($_POST['r1']=="10-20 ng/mL")
  {
    $a=$a+2;
  } 
  elseif($_POST['r1']==">20 ng/mL")
  {
    $a=$a+3;
  }
  if($_POST['r2']=="≤6")
  {
    $a=$a+1;
  }
  elseif($_POST['r2']=="7")
  {
    $a=$a+2;
  }
  elseif($_POST['r2']=="≥8")
  {
    $a=$a+3;
  }
  if($_POST['r3']=="T1-T2a")
  {
    $a=$a+1;
  }
  elseif($_POST['r3']=="T2b")
  {
    $a=$a+2;
  }
  elseif($_POST['r3']=="≥T2c")
  {
    $a=$a+3;
  }
  
  if($a>=5)
  {
    $txt="High_Risk";
  }
  elseif($a==5)
  {
    $txt="Intermediary_Risk";
  }
  elseif($a<5)
  {
    $txt="Low_Risk";
  }
  $_SESSION['txt']=$txt;
  $test="DAmico Risk Classification for Prostate Cancer";
  $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
   mysqli_query($conn,$sql);

}
?>
<input type="text" value="<?php echo $txt ?>" class="tb1">
</form>
</div>
</body>
</html>