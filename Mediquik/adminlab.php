<div class="sidenav">
   <a href ="admin.php">HOME</a></li>
   <a href ="adminuser.php">USERS</a></li>
   <a href ="adminlab.php">LAB TECHNICIANS</a></li>
   <a href ="logout.php">LOG OUT</a></li>  
</div>
<?php

session_start();
$id = $_SESSION['name'];

?>
</!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="css/adminlab.css">
</head>
<body>
<form method="post" action="admin.php">
<input type="submit"  class="btn" value="HOME">
</form>
<form method="post" action="">
<h3 class="head">LAB</h3><h3 class="head1">TECHNICIANS</h3>
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
  $sql="SELECT * FROM labtech";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {  
    $k=1;
    while($row=mysqli_fetch_assoc($res))
    {
        $f=$row['firstname'];
        $l=$row['lastname'];
        $i=$row['id'];
        echo"<div class='wrapper'> <a class='seventh before after' href='adlabprof.php?uid=$i'>$f $l - $i</a> </div>";
    }
  }  
  else
  {
    echo "<h3 class='h1'>NO TECHNICIANS TO SHOW</h3>";
  }
  if($k==1)
  {
     echo"<input type='submit' name='b1' class='btn2' value='DELETE TECHNICIANS'>";
  }
     echo "<input type='submit' name='b2' class='btn3' value='ADD TECHNICIANS'";  
?>
<?php
if(isset($_POST['b1']))
{
    header('Location: labdel.php');
}
if(isset($_POST['b2']))
{
  header('Location: labadd.php');
}

?>

</div>
</form>
</body>
</html>




