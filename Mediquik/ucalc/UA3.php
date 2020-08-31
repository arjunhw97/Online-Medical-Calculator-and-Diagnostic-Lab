 <?php
session_start();
$session = $_SESSION['username'];
$test='Asymptomatic Myeloma Prognosis';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Asymptomatic Myeloma Prognosis</title>
   <link rel="stylesheet" type="text/css" href="calcss/UA3.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">	
<div class="container">
<h4 class="head">Asymptomatic Myeloma Prognosis</h4>
<h3 class="l1">Bone marrow plasmacytosis</h3>
<h3 class="l2"><input type="radio" name="c1" value="greater than 10%" required> > 10%</h3>
<h3 class="l3"><input type="radio" name="c1" value="less than 10%"> < 10%</h3>
<h3 class="l4">Serum monoclonal protein, g/dL</h3>
<h3 class="l5"><input type="radio" name="c2" value="greater than 3" required> > 3</h3>
<h3 class="l6"><input type="radio" name="c2" value="less than 3"> < 3</h3>
<h3 class="h7">NORMAL: BELOW 43% </h3>
<input type="reset" name="r" class="r">
<input type="submit" name="b1" value="Calculate" class="btn1">
<?php
$z=0;
if(isset($_POST['b1']))
{
   $x=$_POST['c1'];
   $y=$_POST['c2'];
 if($x=='greater than 10%' && $y=='greater than 3')
   {
   	 $z=69;
   }
   else if($x=='greater than 10%' && $y=='less than 3')
   {
   	 $z=43;
   }
   else if($x=='less than 10%' && $y=='greater than 3')
   {
   	 $z=15;
   }
   else
   {
   	$z='not defined';
   }	

   $_SESSION['z']=$z;
   $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
   mysqli_query($conn,$sql); 
}
?>

<h3 class="h">Risk:</h3><input type="text" value="<?php echo $z ?> %" class='tb4'>
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
   if (!array_key_exists("z",$_SESSION))
  {
    echo"<script> alert('please calculate your results to save'); </script>";
  }
  else
  {
  $result=$_SESSION['z'];
  $unit='%';
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM tests WHERE username='$session' AND testname='$test';";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($res);
  if($row==0)
  {
     $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UA3.php')";
  }  
  else
  {
   $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  }   
  mysqli_query($conn,$sql);
 }
}
?>
