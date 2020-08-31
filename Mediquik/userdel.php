<div class="sidenav">
   <a href ="admin.php">HOME</a></li>
   <a href ="adminuser.php">USERS</a></li>
   <a href ="adminlab.php">LAB TECHNICIANS</a></li>
   <a href ="logout.php">LOG OUT</a></li>  
</div>
<?php

session_start();
$session = $_SESSION['name'];

?>
</!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
     <link rel="stylesheet" type="text/css" href="css/userdel.css">
</head>
<body>
<form method="post" action="admin.php">
<button class ="btn">HOME</button>
</form>
<form method="post" action="">
<div class="container">
<?php
  
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM userinfo";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {
    echo"<u><p style='font-size:40px; margin-left: 20px;'>USERS</p></u>";
    while($row=mysqli_fetch_assoc($res))
    {
        $f=$row['firstname'];
        $l=$row['lastname'];
        $u = $row['username'];
        echo"<div class='wrapper'> <input type='checkbox' name='check[]' value='$u' class='seventh before after'>$f $l - $u</div>";
    }   
    echo"<input type='submit' name='b1' class='btn2' value='DELETE'";
  }
?>
<?php
if(isset($_POST['b1']))
{    foreach($_POST['check'] as $selected)
     {
       echo $selected;
       $sql = "DELETE FROM userinfo WHERE username='$selected'";
       mysqli_query($conn,$sql);
       $sql = "DELETE FROM tests WHERE username='$selected'";
       mysqli_query($conn,$sql);

     }
     header('Location: userdel.php');
}   
?>

</div>
</form>
</body>
</html>




