<!DOCTYPE html>
<html>
<?php
 session_start();
 $a=$_SESSION['name'];
 $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);	
 $sql="SELECT * FROM labtech ORDER BY labtech.id DESC LIMIT 1";
 $res=mysqli_query($conn,$sql);
 $num=mysqli_num_rows($res);
 if($num==0)
 {
 	$id=100;
 } 	
 else
 {	
    $row = mysqli_fetch_assoc($res);
    $id = $row['id'];
    $id = $id+1;
 }

 ?>

<head>
  <title>ADD TECHNICIANS</title>
  <link rel="stylesheet" type="text/css" href="css/labadd.css">
</head>
<body>
<form method="post" action="adminlab.php">
<input type="submit" name="b3" class="btn" value="LAB TECHNICIANS">
</form>
<form method="post" action="">
<div class="container">
<input type="text" name="t1" class="tb1" value="<?php echo $id ?>" required readonly>
<input type="text" name="t2" class="tb2" required>
<input type="text" name="t3" class="tb3" required>
<input type="text" name="t4" class="tb4" required>
<input type="text" name="t5" class="tb5" required>
<input type="text" name="t6" class="tb6" required>
<h3 class ="l1">Id</h3>
<h3 class ="l2">First Name</h3>
<h3 class ="l3">Last Name</h3>
<h3 class ="l4">Password</h3>
<h3 class ="l5">Gender</h3>
<h3 class ="l6">Contact</h3>
<input type="submit" name="b1" value="Add" class="btn1">
<input type="reset" name="b2" value="Reset" class="r">
</div>
</form>
<?php
if(isset($_POST['b1']))
{
 $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);	
 $b=$_POST['t1'];
 $c=$_POST['t2'];
 $d=$_POST['t3'];
 $e=$_POST['t4'];
 $f=$_POST['t5'];
 $g=$_POST['t6'];
 $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "INSERT INTO labtech (id,firstname,lastname,password,gender,contact) VALUES ('$b','$c','$d','$e','$f','$g')";
 mysqli_query($conn,$sql);
 header('Location: labadd.php');
}
?>
</body>
</html>





