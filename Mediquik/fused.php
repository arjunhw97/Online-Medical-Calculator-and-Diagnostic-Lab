<?php

session_start();
$session = $_SESSION['username'];

?>
</!DOCTYPE html>
<html>
<head>
    <title>Frequently Used</title>
    <link rel="stylesheet" type="text/css" href="css/fused.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="PROFILE">
<h3 class="head">FREQUENTLY</h3><h3 class="head1">USED</h3>
<div class="container">
<?php
  $result=0;
  if(isset($_POST['b1']))
        {
          header('Location: profile.php');
        }
  $k=0;
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM test_list ORDER BY visits DESC LIMIT 5";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {  
    while($row=mysqli_fetch_assoc($res))
    {
        $t=$row['testname'];
        $f=$row['filename'];
        echo"<div class='wrapper'> <a class='seventh before after' href='ucalc/$f'>$t</a> </div>";
    }
  }  
  else
  {
    echo "<h3 class='h1'>NO TESTS SHOW</h3>";
  }
?>

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




