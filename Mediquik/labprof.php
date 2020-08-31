<?php

session_start();
$a = $_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
   <title>Profile</title>
   <link rel="stylesheet" type="text/css" href="css/labprof.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="Log Out">
</form>
<div class="container">
<?php
      if(isset($_POST['b1']))
        {
        	header('Location: index.php');
        }

        $db = 'medi';
        $user = 'arjun';
        $pass = '123';
        $conn = mysqli_connect('localhost',$user,$pass,$db);
        $sql = "SELECT * FROM `labtech` WHERE id='$a';";
        $res = mysqli_query($conn, $sql);
        $r = mysqli_fetch_assoc($res);
        echo "<h3 class='l1'> Name : ".$r['firstname']." ".$r['lastname']."</h3>";
        echo "<h3 class='l2'> id : ".$r['id']." "."</h3>";
        echo "<h3 class='l3'> Gender : ".$r['gender']." "."</h3>";
        echo "<h3 class='l4'> Contact : ".$r['contact']." "."</h3>";

?>

</div>
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