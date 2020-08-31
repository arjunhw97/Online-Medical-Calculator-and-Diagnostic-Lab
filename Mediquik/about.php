
<!DOCTYPE html>
<html>
<head>
   <title>Profile</title>
   <link rel="stylesheet" type="text/css" href="css/about.css">
</head>
<body>
<form method="post" action="">
<input type="submit" name="b1" class="btn" value="HOME">
</form>
<div class="container">
<?php
      if(isset($_POST['b1']))
        {
        	header('Location: index.php');
        }
       echo "<h4 class='l1'><u>ABOUT US</u></h4>";
       echo "<h3 class='l2'><p> 
             Mediquik is a website which provides every user the privilege of using it's accurate Medical Calculators 
             and to apply for the various Lab Tests that are evaluated and done by skilled Lab Technicians. We aim at helping users 
             by making them aware of their progress in health and allowing them to fully realize the threats that they may or may not face 
             in the future.</p></h3>";
     

?>




</body>
</html>
</html>