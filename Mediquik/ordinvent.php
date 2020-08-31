<?php

  session_start();
  $id = $_SESSION['id'];
  if(isset($_POST['b1']))
  {                                     
   $db = 'medi';
   $user = 'arjun';
   $pass = '123';
   $conn = mysqli_connect('localhost',$user,$pass,$db);
   $dateString = date('Y-m-d');
   $myDate = new DateTime($dateString);
   $formattedDate = $myDate->format('Y-m-d');
   foreach($_POST['sel'] as $selected)
     {
        $name = substr($selected, 0, strpos($selected, '#'));
        $sql = "SELECT * FROM lequip WHERE eq_name='$name' AND dates='NULL'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $eq = $row['eq_name'];
        $avail = $row['available'];
        $max = $row['maximum'];
        $price = $row['price'];
        $x = $row['ord'];  
        $array = explode("#",$selected);
        $val = $array[1];
        if($val!=0)
        {  
          $val = $val + $x;
          $sql = "INSERT INTO lequip (eq_name,available,maximum,ord,dates,price,status) VALUES ('$eq','$avail','$max','$val','$formattedDate','$price','P')";
          mysqli_query($conn,$sql);
        }          
     }
   header('Location: orderlist.php');
  }  

?>
</!DOCTYPE html>
<html>
<head>
    <title>Lab Inventory</title>
    <link rel="stylesheet" type="text/css" href="css/ordinvent.css">
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
  $sql2 = "SELECT * FROM lequip WHERE dates<>'NULL' AND status='P'";
  $res=mysqli_query($conn,$sql);
  $n=mysqli_num_rows($res);
  if($n!=0)
  {  
    $i=1;
    while($row=mysqli_fetch_assoc($res))
    {
        $array = array();
        $eq = $row['eq_name'];
        $av = $row['available'];
        $max = $row['maximum'];
        $res2 = mysqli_query($conn,$sql2);
        while($row1=mysqli_fetch_assoc($res2))
        {
            $ord = $row1['ord'];
           if($row1['eq_name']==$eq)
           {
            $av = $av + $ord;
           } 
        }  
        $rem = $max - $av;
        echo"<h3 class='l$i'> $eq </h3>";
        echo "<select class='tb$i' name='sel[]'>";
        echo"<option selected='selected' value=0>0</option>";
        for($j=1;$j<=$rem;++$j)
          echo "<option value='$eq#$j'>$j</option>";
         echo "</select>";  
        $i=$i+1;
    }
     
    echo "<input type='submit' name='b1' class='btn2' value='PLACE ORDER'>";

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




