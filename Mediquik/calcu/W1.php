
<!DOCTYPE html>
<html>
<head>
	<title>Wells' Criteria for DVT</title>
	<link rel="stylesheet" type="text/css" href="calcss/UW1.css">
</head>
<body>
<form method="post" action="http://localhost/Mediquik/index.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class='container'>
<h4 class="head">Wells' Criteria for DVW</h4>
<h3 class="l1">Active cancer</h3>
<h3 class="l2"><input type="radio" name="r1" value="Yes" required>Yes</h3><h3 class="l3"><input type="radio" name="r1" value="No" required>No</h3>
<h3 class="l4">Bedridden recently >3 days or major surgery within four weeks</h3>
<h3 class="l5"><input type="radio" name="r2" value="Yes" required>Yes</h3><h3 class="l6"><input type="radio" name="r2" value="No" required>No</h3>
<h3 class="l7">Calf swelling >3 cm compared to the other leg</h3>
<h3 class="l8"><input type="radio" name="r3" value="Yes" required>Yes</h3><h3 class="l9"><input type="radio" name="r3" value="No" required>No</h3> 
<h3 class="l10">Collateral (nonvaricose) superficial veins present</h3>
<h3 class="l11"><input type="radio" name="r4" value="Yes" required>Yes</h3><h3 class="l12"><input type="radio" name="r4" value="No" required>No</h3>
<h3 class="l13">Entire leg swollen</h3>
<h3 class="l14"><input type="radio" name="r5" value="Yes" required>Yes</h3><h3 class="l15"><input type="radio" name="r5" value="No" required>No</h3> 
<h3 class="l16">Localized tenderness along the deep venous system</h3>
<h3 class="l17"><input type="radio" name="r6" value="Yes" required>Yes</h3><h3 class="l18"><input type="radio" name="r6" value="No" required>No</h3>
<h3 class="l19">Pitting edema, confined to symptomatic leg</h3>
<h3 class="l20"><input type="radio" name="r7" value="Yes" required>Yes</h3><h3 class="l21"><input type="radio" name="r7" value="No" required>No</h3>
<h3 class="l22">Paralysis, paresis, or recent plaster immobilization of the lower extremity</h3>
<h3 class="l23"><input type="radio" name="r8" value="Yes" required>Yes</h3><h3 class="l24"><input type="radio" name="r8" value="No" required>No</h3> 
<h3 class="l25">Previously documented DVT</h3>
<h3 class="l26"><input type="radio" name="r9" value="Yes" required>Yes</h3><h3 class="l27"><input type="radio" name="r9" value="No" required>No</h3> 
<h3 class="l28">Alternative diagnosis to DVT as likely or more likely</h3>
<h3 class="l29"><input type="radio" name="r10" value="Yes" required>Yes</h3><h3 class="l30"><input type="radio" name="r10" value="No" required>No</h3> 
<input type='submit' name='b1' value='Calculate' class="btn1">
<input type='reset' value='Reset' name='r' class="r">
<?php
$a=0;
if(isset($_POST['b1']))
{
  if($_POST['r1']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r2']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r3']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r4']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r5']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r6']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r7']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r8']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r9']=='Yes')
   {
    $a=$a+1;
   } 
  if($_POST['r10']=='No')
   {
    $a=$a-1;
   } 
   $_SESSION['a']=$a;
   $test='Wells Criteria for DVT';
   $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $sql = "UPDATE test_list SET visits=visits+1 WHERE testname='$test'";
   mysqli_query($conn,$sql);
}
?>
<input type="text" value="<?php echo $a." Points" ?>" class="tb1">
</form>
</div>
</body>
</html>