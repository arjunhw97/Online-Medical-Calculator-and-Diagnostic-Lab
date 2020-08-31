</!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="css/userlist.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="HOME">
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



 
    
    echo"<div class='wrapper'> <a class='seventh before after' href='uprof.php'>SPIKEE JJJJ</a></div>";
 

?>

</div>
<div class="sidenav">
  <a href="labhome.php">Home</a>
  <a href="userlist.php">Users</a>
  <a href="labprof.php">Profile</a>
  <a href="ptests.php">Pending Tests</a>
  <a href="#">Inventory</a>
</div>
</form>
</body>
</html>









