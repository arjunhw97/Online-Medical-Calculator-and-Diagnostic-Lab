<?php
  session_start();
  $id = $_SESSION['id'];
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM lequip WHERE status<>'A'";
  $res=mysqli_query($conn,$sql);
  $n = mysqli_num_rows($res);
  $date = date('Y-m-d');
  if($n!=0)
  {
    while($row=mysqli_fetch_assoc($res))
    {
       $d = $row['dates'];
       $time = strtotime("$d");
       $myDate = date( 'Y-m-d', $time );
       $dateString = new DateTime($myDate);
       $dateString->modify('+5 day');
       $dat = $dateString->format('Y-m-d');
       if($dat<=$date)
       {
        $eq = $row['eq_name'];
        $x = $row['ord'];
        $sql = "UPDATE lequip SET available=available+ord WHERE eq_name='$eq' AND dates='$d'";
        mysqli_query($conn,$sql);
        $sql2 = "UPDATE lequip SET status='A' WHERE dates='$d'";
        mysqli_query($conn,$sql2);
        $sql3 = "UPDATE lequip SET available=available+'$x' WHERE eq_name='$eq' AND status<>'A'";
        mysqli_query($conn,$sql3);
        $sql4 = "UPDATE lequip SET available=available+'$x' WHERE eq_name='$eq' AND dates='NULL'";
        mysqli_query($conn,$sql4);
      }
    }  
  }  
  $sql = "SELECT * FROM lequip WHERE dates='$date'";
  $res = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($res);
  if($num==0)
  {
    $k=0;
  }
  else
  {
    $k=1;
  }

?>
</!DOCTYPE html>
<html>
<head>
    <title>Lab Inventory</title>
    <link rel="stylesheet" type="text/css" href="css/labinvent.css">
</head>
<body>
<form method="post" action="labhome.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<h3 class="head">LAB</h3><h3 class="head1">INVENTORY</h3>
<div class="container">
<?php
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql="SELECT * FROM lequip WHERE dates='NULL'";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {  
    $i=1;
    while($row=mysqli_fetch_assoc($res))
    {
        $eq = $row['eq_name'];
        $av = $row['available'];
        echo"<h3 class='l$i'> $eq </h3><input type='text' value='$av' readonly class='tb$i'>";
        $i=$i+1;
    }
     
    echo "<input type='submit' name='b1' class='btn2' value='UPDATE INVENTORY'>";
    echo "<input type='submit' name='b3' class='btn3' value='SHOW PREVIOUS ORDERS'>";
    if($k==0)
    {
      echo "<input type='submit' name='b4' class='btn4' value='CANCEL ORDER' disabled>";
      echo "<input type='submit' name='b5' class='btn5' value='ORDER INVENTORY'>";
    }
    else
    {
      echo "<input type='submit' name='b4' class='btn4' value='CANCEL ORDER'>";
      echo "<input type='submit' name='b5' class='btn5' value='ORDER INVENTORY' disabled>";
    }  
  }  
  else
  {
    echo "<h3 class='h1'>NO EQUIPMENTS TO SHOW</h3>";
  }
?>
<?php
if(isset($_POST['b1']))
{
   header('Location: upinvent.php');
}

if(isset($_POST['b5']))
{
   header('Location: ordinvent.php');
}

if(isset($_POST['b4']))
{
  $d = date('Y-m-d');
  $myDate = new DateTime($d);
  $formattedDate = $myDate->format('Y-m-d');
  $sql1 = "DELETE FROM lequip WHERE dates='$formattedDate'";
  mysqli_query($conn,$sql1);
  header('Location: labinvent.php');

}

if(isset($_POST['b3']))
{
  header('Location: prevord.php');
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




