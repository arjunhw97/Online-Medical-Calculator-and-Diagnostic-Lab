<!DOCTYPE html>
<html>
<head>
  <title>Database</title>
  
</head>
<body>

<form method="POST" action="">
<input type="submit" name="t4" class="tb11">
</form>


</body>
<?php
$a = "Hello";
$b = "hi";
if(isset($_POST['t4']))
	{
        $tab = $a.$b;
        $db = 'medi';
        $user = 'arjun';
        $pass = '123';
        $conn = mysqli_connect('localhost',$user,$pass,$db);
        $a = mysqli_real_escape_string($conn,$a);
        $sql="CREATE TABLE ".$a." (
      calcname VARCHAR(40),
      result VARCHAR(6),
      report VARCHAR(2))";
   if($res=mysqli_query($conn,$sql))
   {
      echo "Yes";      
   }
   else
   {
   	  echo "No ".mysqli_error($conn);
   }
  }
?>

</html>





