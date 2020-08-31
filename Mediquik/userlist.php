<?php

session_start();
$id = $_SESSION['id'];

?>
</!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="css/userlist.css">
</head>
<body>
<form method="post" action="labhome.php">
<input type="submit" name="b2" class="btn" value="HOME">
<div class="head">USERS</div>
<div class="container">
<?php
  if(isset($_POST['b1']))
        {
          header('Location: labhome.php');
        }
  $k=0;
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM userinfo";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {  
    while($row=mysqli_fetch_assoc($res))
    {
        $f=$row['firstname'];
        $l=$row['lastname'];
        $u=$row['username'];
        echo"<div class='wrapper'> <a class='seventh before after' href='uprof.php?uname=$u'>$f $l - $u</a> </div>";
    }
  }  
  else
  {
    echo "<h3 class='h1'>NO USERS TO SHOW</h3>";
  }
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
</form>
</body>
</html>




