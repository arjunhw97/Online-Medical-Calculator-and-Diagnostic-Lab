
<?php
   session_start();
   $a = $_SESSION['id'];    
   $date = date('Y-m-d', strtotime('+5 days'));
   $myDate = new DateTime($date);
   $formattedDate = $myDate->format('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <link rel="stylesheet" type="text/css" href="css/success.css">
</head>
<body>
   <form method="post" action="labhome.php">
   <input type="submit" value="HOME" class="btn">
   </form>	
   <div class="container">
    <h1 class="head">YOUR ORDER HAS BEEN PLACED</h1>
    <h1 class="head1">THE EQUIPMENTS WILL ARRIVE BY <?php echo $formattedDate ?> </h1>
   </div>

</body>
</html>