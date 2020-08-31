<?php

session_start();
$session = $_SESSION['username'];

?>
</!DOCTYPE html>
<html>
<head>
    <title>Pending Tests</title>
    <link rel="stylesheet" type="text/css" href="css/ptests.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="HOME">
<h3 class="head">PENDING</h3><h3 class="head1">TESTS</h3>
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
  $sql="SELECT * FROM tests WHERE type='O' AND value='Pending'";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {  
    while($row=mysqli_fetch_assoc($res))
    {
        $u = $row['username'];
        $t = $row['testname'];
        if($t=='Blood Culture' || $t=='Gonorrhea' || $t=='Helicobacter pylori' || $t=='Syphilis')
          echo"<div class='wrapper'> <a class='seventh before after' href='update1.php?uname=$u&tname=$t'>$t - $u</a> </div>";
        elseif($t=='C-Reactive Protein (CRP)')
          echo"<div class='wrapper'> <a class='seventh before after' href='update2.php?uname=$u&tname=$t'>$t - $u</a> </div>";
        elseif($t=='Blood Type')
          echo"<div class='wrapper'> <a class='seventh before after' href='update3.php?uname=$u&tname=$t'>$t - $u</a> </div>";
        else
          echo"<div class='wrapper'> <a class='seventh before after' href='update.php?uname=$u&tname=$t'>$t - $u</a> </div>";
    }
  }  
  else
  {
    echo "<h3 class='h1'>NO PENDING TESTS</h3>";
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




