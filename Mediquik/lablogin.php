<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Log In</title>
  
  
      <link rel="stylesheet" href="css/lablogin.css">


</head>
<form method="POST" action="">
<body>
<div class="form">
  <div class="thumbnail"><image src="css/images/medi.jpg"></div>
  <form method="POST" action="">
    <input type="text" placeholder="id" name = "id"/>
    <input type="password" placeholder="password" name = "password"/>
    <input type="submit" value="OK" name="create" id="create"> 

 
</div>



</body>
<?php
  
session_start();

if(isset($_POST['create']))
{
    $username = 'arjun';
    $password = '123';
    $db = 'medi';
    $id = $_POST['id'];
    $pass = $_POST['password'];
    $conn = mysqli_connect('localhost', $username, $password, $db);
    $result = "SELECT * FROM `labtech` WHERE id='$id' and password='$pass'";
    $sql=mysqli_query($conn,$result);
    if($id=='admin' && $pass=='9596')
    {
      $_SESSION['name']='admin';
      header('Location: admin.php');
    }  
    elseif (mysqli_num_rows($sql)==1)
     {
        session_start();  
        $_SESSION['id']=$id;
        $_SESSION['password']=$pass;
        $_SESSION['username']='';
         header('Location: labhome.php');
    }
   else
   {
     echo"<script> alert('id does not exist!'); </script>";
   }
}//post
?>



</html>




  
 </form>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  