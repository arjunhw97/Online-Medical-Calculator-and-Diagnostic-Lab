
<?php

session_start();
$a = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
   <title>Generate Report</title>
   <link rel="stylesheet" type="text/css" href="css/gen.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="MYTESTS">
</form>
<form method="post" action="">
<div class="container" id="#content">
<h3 class="h7">MEDIQUIK</h3>
<?php
        $db = 'medi';
        $user = 'arjun';
        $pass = '123';
        $conn = mysqli_connect('localhost',$user,$pass,$db);
        $sql = "SELECT * FROM `userinfo` WHERE username='$a';";
        $res = mysqli_query($conn, $sql);
        $r = mysqli_fetch_assoc($res);
        echo "<div class='l1'> Name : ".$r['firstname']." ".$r['lastname']."</div>";
        echo "<div class='l2'> Username : ".$r['username']." "."</div>";
        echo "<div class='l3'> Gender : ".$r['gender']." "."</div>";
        echo "<div class='l4'> Date Of Birth : ".$r['dateofbirth']." "."</div>";
        echo "<div class='l5'> Address : ".$r['address']." "."</div>";
        echo "<div class='l6'> Height : ".$r['height']." "."</div>";
        echo "<div class='l7'> Weight : ".$r['weight']." "."</div>";

?>
<table border="1" class="table">
    <th>Testname</th>
    <th>Result</th>
    <?php 
       $sql="SELECT * FROM tests WHERE username='$a' AND report='G'";
       $res=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($res))
       {
         $t = $row['testname'];
         $r = $row['value'];
         $u = $row['unit'];
    ?>
      <tr>
      <td><?php echo $t ?> </td>
      <td><?php echo $r." ". $u ?></td>
      </tr>
    <?php
     }
    ?> 
</table>
</div>
<button id="cmd" class="btn1">Generate PDF</button>
</form>
<?php

if(isset($_POST['b1']))
{
   header('Location: Inventory.php');
}
?>
</body>
</html>