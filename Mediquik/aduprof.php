<?php

session_start();
$a = $_SESSION['name'];
$u = $_GET['uname'];
?>
<!DOCTYPE html>
<html>
<head>
   <title>Profile</title>
   <link rel="stylesheet" type="text/css" href="css/aduprof.css">
</head>
<body>
<form method="post" action="admin.php">
<input type="submit" name="b1" class="btn" value="HOME">
</form>
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
   <a href ="admin.php">HOME</a></li>
   <a href ="adminuser.php">USERS</a></li>
   <a href ="adminlab.php">LAB TECHNICIANS</a></li>     
</div>


</body>
</html>
</html>