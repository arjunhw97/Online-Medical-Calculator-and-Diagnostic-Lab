<?php

session_start();
$session = $_SESSION['username'];

?>
</!DOCTYPE html>
<html>
<head>
    <title>Delete Tests</title>
     <link rel="stylesheet" type="text/css" href="css/del.css">
</head>
<body>
<form method="post" action="profile.php">
<button class ="btn">PROFILE</button>
</form>
<form method="post" action="">
<div class="container">
</form>
<?php
  
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM tests WHERE username='$session' AND type='C'";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {
    echo"<u><p style='font-size:40px; margin-left: 20px;'>CALCULATOR TESTS</p></u>";
    while($row=mysqli_fetch_assoc($res))
    {
        $f = $row['filename'];
        $t = $row['testname'];
        $r = $row['value'];
        $u = $row['unit'];
        echo"<div class='wrapper'> <input type='checkbox' name='check[]' value='$t' class='seventh before after'>$t - $r $u </div>";
    }
  }  
  $sql="SELECT * FROM tests WHERE username='$session' AND type='O'";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {
    echo"<u><p style='font-size:40px; margin-left: 20px;'>LAB TESTS</p></u>";
    while($row=mysqli_fetch_assoc($res))
    {
        $f = $row['filename'];
        $t = $row['testname'];
        $r = $row['value'];
        $u = $row['unit'];
        echo"<div class='wrapper'> <input type='checkbox' name='check[]' value='$t' class='seventh before after'>$t - $r $u </div>";
    }
    
  }  
   echo"<input type='submit' name='b1' class='btn2' value='DELETE'";
?>
<?php
if(isset($_POST['b1']))
{    foreach($_POST['check'] as $selected)
     {
        echo $selected;
       $sql = "DELETE FROM `tests` WHERE testname='$selected' AND username='$session'";
       mysqli_query($conn,$sql);
     }
     header('Location: del.php');
}   
?>

</div>
<div class="sidenav">
  <a href="home.php">Home</a>
  <a href="usercalc.php">Medical Calculator</a>
  <a href="fused.php">Frequently Used</a>
  <a href="olab.php">Online Lab</a>
  <a href="inventory.php">MyTests</a>
  <a href="logout.php">Logout</a>
</div>
</form>
</body>
</html>




