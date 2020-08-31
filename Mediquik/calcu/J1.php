<!DOCTYPE html>
<html>
<head>
	<title>Jones Criteria for Rheumatic Fever Diagnosis</title>
	<link rel="stylesheet" type="text/css" href="calcss/UJ1.css">
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Jones Criteria for Rheumatic Fever Diagnosis</h4>
<h3 class="l1">Required Criteria</h3>
<h3 class="l2"><input type="checkbox" name="c1[]" value="a1">Positive throat culture or rapid strep test</h3>
<h3 class="l3"><input type="checkbox" name="c1[]" value="a2">Elevated or rising streptococcal antibody titer</h3>
<h3 class="l4">Major Criteria</h3>
<h3 class="l5"><input type="checkbox" name="c2[]" value="b1">Carditis</h3>
<h3 class="l6"><input type="checkbox" name="c2[]" value="b2">Polyarthritis</h3>
<h3 class="l7"><input type="checkbox" name="c2[]" value="b3">Chorea</h3>
<h3 class="l8"><input type="checkbox" name="c2[]" value="b4">Erythema marginatum</h3>
<h3 class="l9"><input type="checkbox" name="c2[]" value="b5">Subcutaneous nodules</h3>
<h3 class="l10">Minor Criteria</h3>
<h3 class="l11"><input type="checkbox" name="c3[]" value="c1">Arthralgia</h3>
<h3 class="l12"><input type="checkbox" name="c3[]" value="c2">Fever</h3>
<h3 class="l13"><input type="checkbox" name="c3[]" value="c3">Elevated acute phase reactants</h3>
<h3 class="l14"><input type="checkbox" name="c3[]" value="c4">Erythema marginatum</h3>
<h3 class="l15"><input type="checkbox" name="c3[]" value="c5">C-reactive protein</h3>
<h3 class="l16"><input type="checkbox" name="c3[]" value="c6">Prolonged PR interval</h3>


<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$txt = 0;
if(isset($_POST['b1']))
{
  $checked_arr = $_POST['c1'];
  $count1 = count($checked_arr);
  $checked_arr = $_POST['c2'];
  $count2 = count($checked_arr);
  $checked_arr = $_POST['c3'];
  $count3 = count($checked_arr);
  if(($count1==0) || ($count1==2 && ($count2==0 || ($count2==1 && $count3==0))) || ($count1==1 && $count2==1 && ($count3==1||$count3==0)))
   $txt="Negative";
  elseif($count1==1)
  {
    $txt="Positive";
  }
  $_SESSION['txt']=$txt;
}
?>
<input type="text" value="<?php echo $txt ?>" class="tb1">
</form>
</div>
</body>
</html>