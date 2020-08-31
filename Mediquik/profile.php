<?php

session_start();
$a = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
   <title>Profile</title>
   <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="Log Out <?php echo $a ?>">
</form>
<div class="container">
<?php
      if(isset($_POST['b1']))
        {
        	header('Location: index.php');
        }

       if(isset($_POST['b2']))
       {

	         header('Location: edit.php');
       }

        $db = 'medi';
        $user = 'arjun';
        $pass = '123';
        $conn = mysqli_connect('localhost',$user,$pass,$db);
        $sql = "SELECT * FROM `userinfo` WHERE username='$a';";
        $res = mysqli_query($conn, $sql);
        $r = mysqli_fetch_assoc($res);
        echo "<div class='l1'> Name : ".$r['firstname']." ".$r['lastname']."</div>";
        echo "<div class='l1'> Username : ".$r['username']." "."</div>";
        echo "<div class='l1'> Gender : ".$r['gender']." "."</div>";
        echo "<div class='l1'> Date Of Birth : ".$r['dateofbirth']." "."</div>";
        echo "<div class='l1'> Address : ".$r['address']." "."</div>";
        echo "<div class='l1'> E-mail : ".$r['email']." "."</div>";
        echo "<div class='l1'> Height : ".$r['height']." "."</div>";
        echo "<div class='l1'> Weight : ".$r['weight']." "."</div>";

?>
<form method="post" action="">
<input type="submit" name="b2" value="Edit" class="btn1" >
</form>
</div>
<div class="sidenav">
  <a href="home.php">Home</a>
  <a href="usercalc.php">Medical Calculator</a>
  <a href="fused.php">Frequently Used</a>
  <a href="olab.php">Online Lab</a>
  <a href="inventory.php">MyTests</a>
</div>


</body>
</html>
</html>