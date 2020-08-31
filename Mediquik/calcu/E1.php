
<!DOCTYPE html>
<html>
<head>
	<title>EUTOS Score for Chronic Myelogenous Leukemia (CML)</title>
	<link rel="stylesheet" type="text/css" href="calcss/UE1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
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
   $test='EUTOS Score for Chronic Myelogenous Leukemia (CML)';
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
</div>
</body>
</html>