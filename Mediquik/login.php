<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Log In</title>
  
  
      <link rel="stylesheet" href="css/login.css">


</head>
<form method="POST" action="">
<body>
<div class="form">
  <div class="thumbnail"><image src="css/images/medi.jpg"></image></div>
  <input type="radio" name="r1" value="User">User <input type="radio" name="r1" value="Ltech"> Lab Technician
  <form method="POST" action="">
    <input type="text" placeholder="username/id" name = "name"/>
    <input type="password" placeholder="password" name = "password"/>
    <input type="submit" value="OK" name="create" id="create"> 
    <p class="message">Already registered? <a href="signup.php">Sign Up</a></p>
 
</div>



</body>
<?php
  
session_start();

if(isset($_POST['create']))
{
  $name = $_POST['name'];
  $pass = $_POST['password'];
  if(isset($_POST['r1']))
  {
    if($_POST['r1']=='User')
    {  
      $username = 'arjun';
      $password = '123';
      $db = 'medi';
      $name = $_POST['name'];
      $pass = $_POST['password'];
      $conn = mysqli_connect('localhost', $username, $password, $db);
      $result = "SELECT * FROM `userinfo` WHERE username='$name' and password='$pass'";
      $sql=mysqli_query($conn,$result);
      if($name=='admin' && $pass=='9596')
      {
        $_SESSION['name']='admin';
        header('Location: admin.php');
      }   
      elseif (mysqli_num_rows($sql)==1)
      {
        session_start();  
        $_SESSION['username']=$name;
        $_SESSION['password']=$pass;
        header('Location: home.php');
      }
      else
      {
        echo"<script> alert('Username or Password is incorrect'); </script>";
      }
    }//post
    else
    {
       $username = 'arjun';
       $password = '123';
       $db = 'medi';
       $id = $_POST['name'];
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
        echo"<script> alert('Id or Password is incorrect'); </script>";
      }
       
    }  
  }
  elseif($name=='admin' && $pass=='9596')
  {
    $_SESSION['name']='admin';
    header('Location: admin.php');
  } 
  else 
  {
    echo"<script> alert('Choose An Option'); </script>";
  }  
}   
?>


  
 </form>
  
  
 </html> 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  