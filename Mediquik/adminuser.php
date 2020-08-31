<?php

session_start();
$id = $_SESSION['name'];

?>
</!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="css/adminuser.css">
</head>
<body>
<form method="post" action="admin.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class="head">USERS</div>
<div class="container">
<?php
  if(isset($_POST['b1']))
        {
          header('Location: admin.php');
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
    $k=1;
    while($row=mysqli_fetch_assoc($res))
    {
        $f=$row['firstname'];
        $l=$row['lastname'];
        $u=$row['username'];
        echo"<div class='wrapper'> <a class='seventh before after' href='aduprof.php?uname=$u'>$f $l - $u</a> </div>";
    }
  }  
  else
  {
    echo "<h3 class='h1'>NO USERS TO SHOW</h3>";
  }
  if($k==1)
  {
     echo"<input type='submit' name='b1' class='btn2' value='DELETE USERS'>";
  }  
  
?>
<?php
if(isset($_POST['b1']))
{
    header('Location: userdel.php');
}


?>

</div>
<div class="sidenav">
   <a href ="admin.php">HOME</a></li>
   <a href ="adminuser.php">USERS</a></li>
   <a href ="adminlab.php">LAB TECHNICIANS</a></li>
   <a href ="logout.php">LOG OUT</a></li>  
</div>
</form>
</body>
</html>




