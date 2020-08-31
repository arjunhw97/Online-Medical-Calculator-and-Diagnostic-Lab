<?php

session_start();
$session = $_SESSION['username'];

?>
</!DOCTYPE html>
<html>
<head>
    <title>MyTests</title>
    <link rel="stylesheet" type="text/css" href="css/invent.css">
</head>
<body>
<form method="post" action="Profile.php">
<input type="submit" name="b2" value="Profile" class ="btn">
</form>
<form method="post" action="">
<div class="head">MYTESTS</div>
<div class="container">
<?php
  $k=0;
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM tests WHERE username='$session' AND type='C'";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {
    $k=1;
    echo"<u><p style='font-size:40px; margin-left: 20px;'>CALCULATOR TESTS</p></u>";
    while($row=mysqli_fetch_assoc($res))
    {
        $f = $row['filename'];
        $t = $row['testname'];
        $r = $row['value'];
        $u = $row['unit'];
        echo"<div class='wrapper'> <a class='seventh before after' href=ucalc/$f>$t -  $r $u</a> </div>";
    }
  }  
  $sql="SELECT * FROM tests WHERE username='$session' AND type='O'";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {
    $k=1;
    echo"<u><p style='font-size:40px; margin-left: 20px;'>LAB TESTS</p></u>";
    while($row=mysqli_fetch_assoc($res))
    {
        $f = $row['filename'];
        $t = $row['testname'];
        $r = $row['value'];
        $u = $row['unit'];
        if($r=='Pending')
        {
          echo"<div class='wrapper'> <a class='seventh before after' href=$f>$t - <font color='green'>Pending</font></a> </div>";  
        }  
        else
        {
          echo"<div class='wrapper'> <a class='seventh before after' href=$f>$t -  $r $u</a> </div>";
        }
    }
  }
  if($k==1)
  {
     echo"<input type='submit' name='b1' class='btn2' value='DELETE RESULTS'";
  }  
  else
  {
    echo"<h4>NO TESTS TO SHOW</h4>";
  }
?>
<?php
if(isset($_POST['b1']))
{
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




