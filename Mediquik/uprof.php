<?php

session_start();
$a = $_SESSION['id'];
$u = $_GET['uname']
?>
<!DOCTYPE html>
<html>
<head>
   <title>Profile</title>
   <link rel="stylesheet" type="text/css" href="css/uprof.css">
</head>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="HOME">
</form>
<body>
<div class="container">
<?php
      if(isset($_POST['b1']))
        {
        	header('Location: labhome.php');
        }

        $db = 'medi';
        $user = 'arjun';
        $pass = '123';
        $conn = mysqli_connect('localhost',$user,$pass,$db);
        $sql = "SELECT * FROM `userinfo` WHERE username='$u';";
        $res = mysqli_query($conn, $sql);
        $r = mysqli_fetch_assoc($res);
        echo "<h3 class='l1'> Name :  ".$r['firstname']." ".$r['lastname']."</h3>";
        echo "<h3 class='l2'> Username :  ".$r['username']." "."</h3>";
        echo "<h3 class='l3'> Gender :  ".$r['gender']." "."</h3>";
        echo "<h3 class='l4'> Date Of Birth : ".$r['dateofbirth']." "."</h3>";
        echo "<h3 class='l5'> Address :  ".$r['address']." "."</h3>";
        echo "<h3 class='l6'> E-mail :  ".$r['email']." "."</h3>";
        echo "<h3 class='l7'> Height :  ".$r['height']." "."</h3>";
        echo "<h3 class='l8'> Weight :  ".$r['weight']." "."</h3>";

?>

</div>
<div class="sidenav">
  <a href="labhome.php">Home</a>
  <a href="userlist.php">Users</a>
  <a href="labprof.php">Profile</a>
  <a href="ptests.php">Pending Tests</a>
  <a href="labinvent.php">Inventory</a>
  <a href="logout.php">Logout</a>
</div>

</body>
</html>
</html>