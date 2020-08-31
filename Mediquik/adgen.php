
<?php

session_start();
$a = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
   <title>Generate Report</title>
   <link rel="stylesheet" type="text/css" href="css/adgen.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="HOME">
</form>
<form method="post" action="">
<button id="cmd" class="btn1">Generate PDF</button>
<div class="container" id="#content">
<h3 class="h7">MEDIQUIK</h3>
<?php
        $db = 'medi';
        $user = 'arjun';
        $pass = '123';
        $conn = mysqli_connect('localhost',$user,$pass,$db);
        $sql = "SELECT * FROM `userinfo`";
		    $res = mysqli_query($conn,$sql);
		    $num = mysqli_num_rows($res);
	      echo "<h3 class='l1'>No: Of Users: ".$num."</h3>"; 
       echo "<table border='1' class='table'>
       <th>Name</th>
        <th>Username</th>";
       $sql="SELECT * FROM userinfo";
       $res=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($res))
       {
         $f = $row['firstname'];
         $l = $row['lastname'];
         $u = $row['username'];
      echo "<tr>
      <td> $f $l </td>
      <td> $u </td>
      </tr>";
     } 
 echo "</table>";
?>
<?php
$sql="SELECT * FROM labtech";
$res=mysqli_query($conn,$sql);
echo "<h3 class='l2'>No: Of Lab Technicians: ".mysqli_num_rows($res)."</h3>";

echo "<table border='1' class='table'>
    <th>Id</th>
    <th>Name</th>";

       $sql="SELECT * FROM labtech";
       $res=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($res))
       {
         $id = $row['id'];
         $f = $row['firstname'];
         $l = $row['lastname'];

      echo "<tr>
      <td> $id </td>
      <td> $f $l </td>
      </tr>";
     }

echo "</table>";
?>


<?php
$sql="SELECT * FROM labtech";
$res=mysqli_query($conn,$sql);
echo "<h3 class='l3'>"."Top Five Frequently Used Calculators"."</h3>";
echo"<table border='1' class='table'>
    <th>Testname</th>";
 
       $sql="SELECT * FROM test_list ORDER BY visits DESC LIMIT 5";
       $res=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($res))
       {
         $t = $row['testname'];
   
      echo "<tr>
      <td> $t  </td>
      </tr>";

      }
echo "</table>";
?>
</div>
</form>
<?php
if(isset($_POST['b1']))
{
   header('Location: admin.php');
}
?>
</body>
</html>
