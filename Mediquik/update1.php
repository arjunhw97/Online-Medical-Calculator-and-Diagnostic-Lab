<!DOCTYPE html>
<html>
<?php
 session_start();
 $s = $_SESSION['id'];
 $u = $_GET['uname'];
 $t = $_GET['tname'];
?>
<head>
  <title><?php echo $u." - ".$t  ?></title>
  <link rel="stylesheet" type="text/css" href="css/update1.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b3" class="btn" value="PENDING">
<div class="container">
<select class="styled-select" name="t1">
  <option selected="selected" value="Pending">Pending</option>
  <option value="Positive">Positive</option>
  <option value="Negative">Negative</option>
</select>

<h3 class ="l1"><?php echo $t ?></h3>

<div class="box">
<input type="submit" name="b1" value="Save" class="btn1">
</div>
</div>
</form>
<?php
if(isset($_POST['b1']))
{	
 $b=$_POST['t1'];
 $db = 'medi';
 $user = 'arjun';
 $pass = '123';
 $conn = mysqli_connect('localhost',$user,$pass,$db);
 $sql = "UPDATE tests SET value='$b' WHERE username='$u' AND testname='$t'";
 mysqli_query($conn,$sql);
 header('Location: ptests.php');
}
if(isset($_POST['b3']))
{
	header('Location: ptests.php');
}	
?>

</body>
</html>





