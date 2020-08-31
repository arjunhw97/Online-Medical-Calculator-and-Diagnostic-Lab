<?php
session_start();
$session = $_SESSION['username'];
$test='Vancouver Chest Pain Rule';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Vancouver Chest Pain Rule</title>
	<link rel="stylesheet" type="text/css" href="calcss/UV1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/home.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Vancouver Chest Pain Rule</h4>
<h3 class="head1">Step One</h3>
<h3 class="l1">Abnormal initial EKG</h3>
<h3 class="l2"><input type="radio" name="r1" value="Yes" required>Yes</h3><h3 class="l3"><input type="radio" name="r1" value="No">No</h3>
<h3 class="l4">Positive troponin at 2 hours</h3>
<h3 class="l5"><input type="radio" name="r2" value="Yes" required>Yes</h3><h3 class="l6"><input type="radio" name="r2" value="No">No</h3>
<h3 class="l7">Prior ACS or nitrate use</h3>
<h3 class="l8"><input type="radio" name="r3" value="Yes" required>Yes</h3><h3 class="l9"><input type="radio" name="r3" value="No">No</h3>
<h3 class="head2">Step Two</h3>
<h3 class="l10">Prior ACS or nitrate use</h3>
<h3 class="l11"><input type="radio" name="r4" value="Yes" required>Yes</h3><h3 class="l12"><input type="radio" name="r4" value="No">No</h3>
<h3 class="head3">Step Three</h3>
<h3 class="l13">Age 50 and above?</h3>
<h3 class="l14"><input type="radio" name="r5" value="Yes" required>Yes</h3><h3 class="l15"><input type="radio" name="r5" value="No">No</h3>
<h3 class="l16">Does pain radiate to neck, jaw, or left arm?</h3>
<h3 class="l17"><input type="radio" name="r6" value="Yes" required>Yes</h3><h3 class="l18"><input type="radio" name="r6" value="No">No</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$txt='';
if(isset($_POST['b1']))
{
  if($_POST['r1']=='No' && $_POST['r2']=='No' && $_POST['r3']=='No')
  {
    if($_POST['r4']=='Yes')
    {
       $txt='Low Risk';
    } 
    else
    {
       if($_POST['r5']=='No' && $_POST['r6']=='No')
       {
         $txt='Low Risk';
       } 
       else
         $txt='Standard Evaluation';
    } 
  } 
  else
   $txt='Standard Evaluation'; 

   $_SESSION['txt']=$txt;
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
  $result=$_SESSION['txt'];
  $test='Vancouver Chest Pain Rule';
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
    $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','$result','$unit','C','N','UV1.php')";
  }  
  else
  {
    $sql = "UPDATE tests SET value='$result' WHERE username='$session' AND testname='$test'";
  } 
  mysqli_query($conn,$sql);
 }
}
?>

















