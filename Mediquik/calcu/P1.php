<!DOCTYPE html>
<html>
<head>
	<title>Pediatric Appendicitis Score </title>
	 <link rel="stylesheet" type="text/css" href="calcss/UP1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Pediatric Appendicitis Score</h4>
<h3 class="l1">RLQ tenderness to cough, percussion, or hopping</h3>
<h3 class="l2"><input type="radio" name="r1" value="Yes" required>Yes</h3><h3 class="l3"><input type="radio" name="r1" value="No">No</h3>
<h3 class="l4">Anorexia</h3>
<h3 class="l5"><input type="radio" name="r2" value="Yes" required>Yes</h3><h3 class="l6"><input type="radio" name="r2" value="No">No</h3>
<h3 class="l7">Fever</h3>
<h3 class="l8"><input type="radio" name="r3" value="Yes" required>Yes</h3><h3 class="l9"><input type="radio" name="r3" value="No">No</h3>
<h3 class="l10">Nausea or vomiting</h3>
<h3 class="l11"><input type="radio" name="r4" value="Yes" required>Yes</h3><h3 class="l12"><input type="radio" name="r4" value="No">No</h3>
<h3 class="l13">Tenderness over right iliac fossa</h3>
<h3 class="l14"><input type="radio" name="r5" value="Yes" required>Yes</h3><h3 class="l15"><input type="radio" name="r5" value="No">No</h3>
<h3 class="l16">Leukocytosis</h3>
<h3 class="l17"><input type="radio" name="r6" value="Yes" required>Yes</h3><h3 class="l18"><input type="radio" name="r6" value="No">No</h3>
<h3 class="l19">Left shift</h3>
<h3 class="l20"><input type="radio" name="r7" value="Yes" required>Yes</h3><h3 class="l21"><input type="radio" name="r7" value="No">No</h3>
<h3 class="l22">Migration of pain to RLQ</h3>
<h3 class="l23"><input type="radio" name="r8" value="Yes" required>Yes</h3><h3 class="l24"><input type="radio" name="r8" value="No">No</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
 $a=0;
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
    $a=$a+1;
  }
  if($_POST['r5']=="Yes")
  {
    $a=$a+2;
  }
  if($_POST['r6']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r7']=="Yes")
  {
    $a=$a+1;
  }
  if($_POST['r8']=="Yes")
  {
    $a=$a+1;
  }
  $_SESSION['a']=$a;
  $test='Pediatric Appendicitis Score';
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