<?php

  session_start();
  $id = $_SESSION['id'];
if(isset($_POST['b1']))
{
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
   foreach($_POST['sel'] as $selected)
     {
       echo $selected;
       $name = substr($selected, 0, strpos($selected, '#'));
       $array = explode("#",$selected);
       $val = $array[1];
       $sql = "UPDATE lequip SET available='$val' WHERE eq_name='$name' AND dates='NULL'";
       mysqli_query($conn,$sql);
     }
   header('Location: labinvent.php');
}



?>
</!DOCTYPE html>
<html>
<head>
    <title>Lab Inventory</title>
    <link rel="stylesheet" type="text/css" href="css/upinvent.css">
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
  $sql="SELECT * FROM lequip WHERE dates='NULL' ";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {  
    $i=1;
    while($row=mysqli_fetch_assoc($res))
    {
        $array = array();
        $array[1] = 'a';
        $eq = $row['eq_name'];
        $av = $row['available'];
        echo"<h3 class='l$i'> $eq </h3>";
        echo "<select class='tb$i' name='sel[]' value='50'>";
        echo"<option selected='selected'>$av</option>";
        for($j=$av;$j>=1;--$j)
          echo "<option value='$eq#$j'>$j</option>";
         echo "</select>";  
        $i=$i+1;
    }
     
    echo "<input type='submit' name='b1' class='btn2' value='UPDATE'>";
  }  
  else
  {
    echo "<h3 class='h1'>NO EQUIPMENTS TO SHOW</h3>";
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




