<?php
session_start();
$session = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Online Lab</title>
  <link rel="stylesheet" type="text/css" href="css/olab.css">
</head>
<body>
  <button onclick="window.location.href = 'profile.php'" class ="btn">PROFILE</button>
  <form method="post" action="">
  <div class="head">LAB TESTS</div>
  <div class="container">
  <h4><input type="checkbox" name="olab[]" value="ACTH Suppression#mcg/dL">ACTH Suppression<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Adrenocorticotropic Hormone (ACTH)#pg/ml">Adrenocorticotropic Hormone (ACTH)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Alanine Aminotransferase (ALT)#(IU/L)">Alanine Aminotransferase (ALT)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Albumin#g/dL">Albumin<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Alkaline Phosphatase#(IU/L)">Alkaline Phosphatase<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Bicarbonate (Carbon Dioxide)#mEq/L">Bicarbonate (Carbon Dioxide)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Blood Culture# ">Blood Culture<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Blood Glucose#mg/dL">Blood Glucose<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Blood Type# ">Blood Type<br></h4>
  <h4><input type="checkbox" name="olab[]" value="C-Reactive Protein (CRP)# ">C-Reactive Protein (CRP)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Calcium (Ca)#mg/dL">Calcium (Ca)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Cholesterol and Triglycerides#mg/dL">Cholesterol and Triglycerides<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Dexamethasone Suppression Test#mcg/dL">Dexamethasone Suppression Test<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Electrolyte Panel#mEq/L">Electrolyte Panel<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Folic Acid#nmol/L">Folic Acid<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Gonorrhea# ">Gonorrhea<br></h4>
  <h4><input type="checkbox" name="olab[]" value="HDL Cholesterol#mg/dL">HDL Cholesterol<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Helicobacter pylori# ">Helicobacter pylori<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Homocysteine#µmol/L">Homocysteine<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Iron (Fe)#g/dL">Iron (Fe)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Ketones#mmol/L">Ketones<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Lactic Acid Dehydrogenase (LDH)#U/L">Lactic Acid Dehydrogenase (LDH)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Magnesium (Mg)#mmol/L">Magnesium (Mg)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Microalbumin Urine Test#mg/dL">Microalbumin Urine Test<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Oral Glucose Tolerance Test#mg/dL">Oral Glucose Tolerance Test<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Phosphate (Phosphorus)#mg/dL">Phosphate (Phosphorus)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Prolactin#ng/mL">Prolactin<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Potassium (K) in Blood#mmol/L">Potassium (K) in Blood<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Reticulocyte Count#%">Reticulocyte Count<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Rheumatoid Factor (RF)#IU/ml">Rheumatoid Factor (RF)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Sedimentation Rate#mm/hr">Sedimentation Rate<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Sodium (Na)#mEq/L">Sodium (Na)<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Syphilis# ">Syphilis<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Thyroid Hormone#ug/dl">Thyroid Hormone<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Total Serum Protein#g/dl">Total Serum Protein<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Uric Acid#mg/dL">Uric Acid<br></h4>
  <h4><input type="checkbox" name="olab[]" value="Vitamin B12#pg/mL">Vitamin B12<br></h4>
  <h4><input type="submit" name="b1" class="btn1">
  </div>
  </form>
  <div class="sidenav">
  <a href="home.php">Home</a>
  <a href="usercalc.php">Medical Calculator</a>
  <a href="fused.php">Frequently Used</a>
  <a href="olab.php">Online Lab</a>
  <a href="inventory.php">MyTests</a>
  <a href="logout.php">Logout</a>
</div>
</body>
<?php
if(isset($_POST['b1']))
{
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  foreach($_POST['olab'] as $selected)
  {  
    $test = substr($selected, 0, strpos($selected, '#'));
    $sql="SELECT * FROM tests WHERE username='$session' AND testname='$test';";
    $array = explode("#",$selected);
    $unit = $array[1];
    $res=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($res);
    if($row==0)
    {
      $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','Pending','$unit','O','N','olab.php')";
    }  
    else
    {
      $sql = "DELETE FROM `tests` WHERE testname='$test' AND username='$session'";
      mysqli_query($conn,$sql);
      $sql = "INSERT INTO tests (testname,username,value,unit,type,report,filename) VALUES ('$test','$session','Pending','$unit','O','N','olab.php')";
    } 
    if(!mysqli_query($conn,$sql))
    {
      mysqli_error($conn);
    }
  }
}  

?>
</html>
