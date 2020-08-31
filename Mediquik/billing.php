<?php
  session_start();
  $id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Billing</title>
	<link rel="stylesheet" type="text/css" href="css/billing.css">
</head>
<body>
<form method="post" action="success.php">
<div class="container">
<h3 class="l1">CARD NUMBER</h3>
<input type="text" name="t1" class="tb1" required placeholder="CARD NUMBER">
<h3 class="l2">EXPIRATION DATE</h3>
<input type="text" class="tb2" name="t2" id="frmCCExp" required placeholder="MM-YYYY" autocomplete="cc-exp">
<h3 class="l3">CV CODE</h3>
<input type="text" name="t3" class="tb3" class="tb3" required placeholder="ÇVC">
<input type="submit" value="PAY" class="btn1"> 
</div>
</form>
</body>
</html>