<?php
  session_start();
  $id = $_SESSION['id'];
  $date = date('Y-m-d');
  $db = 'medi';
  $user = 'arjun';
  $pass = '123';
  $conn = mysqli_connect('localhost',$user,$pass,$db);
  $sql = "SELECT * FROM lequip WHERE ord<>0 AND dates='$date'";
  $res = mysqli_query($conn,$sql); 
  if(isset($_POST['b1']))
  {
  	$_SESSION['cost'] = $tpr;
  	header('Location: billing.php');
  }	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ordered Equipments</title>
	<link rel="stylesheet" type="text/css" href="css/orderlist.css">
</head>
<body>
<form method="post" action="labhome.php">
<input type="submit" name="b2" class="btn" value="HOME">
</form>
<form method="post" action="">
<div class="container">
<h3 class="head">Ordered Inventory</h3>
<table border="1" class="table">
<th>Equipment Name</th>
<th>No: Of Equipments</th>
<th>Price</th>
<?php 
$tq = 0;
$tpr = 0;
 if(mysqli_num_rows($res)!=0)
 {
  while($row=mysqli_fetch_assoc($res))
  {
 	$eq = $row['eq_name'];
 	$q = $row['ord'];
 	$pr = $row['price'];
 	$pr = $q*$pr;
 	$tpr=$tpr+$pr;
 	$tq=$tq+$q;
 ?>
   <tr>
   <td><?php echo $eq ?></td>
   <td><?php echo $q ?></td>
   <td><?php echo "₹".$pr ?></td>
   </tr>
 <?php
  }
  ?>
  <tr class='tbl1'>
  <td><?php echo "Total" ?></td>
  <td><?php echo $tq ?></td>
  <td><?php echo "₹".$tpr ?></td>
  </tr>
  <?php
   echo "<input type='submit' name='b1' class='btn2' value='PROCEED TO PAYMENT'>";
 }
 else
  {
    echo "<h3 class='h1'>NO EQUIPMENTS TO SHOW</h3>";
  }
?>
</table>
</div>
</form>
</body>
</html>