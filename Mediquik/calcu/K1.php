<!DOCTYPE html>
<html>
<head>
	<title>Kruis Score for Diagnosis of Irritable Bowel Syndrome</title>
	<link rel="stylesheet" type="text/css" href="calcss/UK1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Kruis Score for Diagnosis of Irritable Bowel Syndrome</h4>
<h3 class="l1">Symptoms of abdominal pain, flatulence, or bowel irregularity</h3>
<h3 class="l2"><input type="radio" name="r1" value="Yes" required>Yes</h3><h3 class="l3"><input type="radio" name="r1" value="No">No</h3>
<h3 class="l4">Symptom duration greater than 2 years</h3>
<h3 class="l5"><input type="radio" name="r2" value="Yes" required>Yes</h3><h3 class="l6"><input type="radio" name="r2" value="No">No</h3>
<h3 class="l7">Pain described as burning, cutting, very strong, terrible, feeling of pressure, dull, boring, or 'not so bad'</h3>
<h3 class="l8"><input type="radio" name="r3" value="Yes" required>Yes</h3><h3 class="l9"><input type="radio" name="r3" value="No">No</h3>
<h3 class="l10">Alternating constipation and diarrhea</h3>
<h3 class="l11"><input type="radio" name="r4" value="Yes" required>Yes</h3><h3 class="l12"><input type="radio" name="r4" value="No">No</h3>
<h3 class="l13">Abnormal physical findings or history pathognomonic of other disease</h3>
<h3 class="l14"><input type="radio" name="r5" value="Yes" required>Yes</h3><h3 class="l15"><input type="radio" name="r5" value="No">No</h3>
<h3 class="l16">ESR > 10 mm/hr</h3>
<h3 class="l17"><input type="radio" name="r6" value="Yes" required>Yes</h3><h3 class="l18"><input type="radio" name="r6" value="No">No</h3>
<h3 class="l19">WBC > 10,000/µL</h3>
<h3 class="l20"><input type="radio" name="r7" value="Yes" required>Yes</h3><h3 class="l21"><input type="radio" name="r7" value="No">No</h3>
<h3 class="l22">Hemoglobin (female < 12 g/dL; male < 14 g/dL)</h3>
<h3 class="l23"><input type="radio" name="r8" value="Yes" required>Yes</h3><h3 class="l24"><input type="radio" name="r8" value="No">No</h3>
<h3 class="l25">History of blood in stool</h3>
<h3 class="l26"><input type="radio" name="r9" value="Yes" required>Yes</h3><h3 class="l27"><input type="radio" name="r9" value="No">No</h3>
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
 $a=0;
  if($_POST['r1']=="Yes")
  {
    $a=$a+34;
  }
  if($_POST['r2']=="Yes")
  {
    $a=$a+16;
  }
  if($_POST['r3']=="Yes")
  {
    $a=$a+23;
  }
  if($_POST['r4']=="Yes")
  {
    $a=$a+14;
  }
  if($_POST['r5']=="Yes")
  {
    $a=$a-47;
  }
  if($_POST['r6']=="Yes")
  {
    $a=$a-13;
  }
  if($_POST['r7']=="Yes")
  {
    $a=$a-50;
  }
  if($_POST['r8']=="Yes")
  {
    $a=$a-98;
  }
  if($_POST['r9']=="Yes")
  {
    $a=$a-98;
  }
  $_SESSION['a']=$a;
  $test='Kruis Score for Diagnosis of Irritable Bowel Syndromet';
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