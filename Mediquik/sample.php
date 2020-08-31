<!DOCTYPE html>
<html>
<head>
	<title>Asymptomatic Myeloma Prognosis</title>
   <link rel="stylesheet" type="text/css" href="css/source.css">


</head>
<body>
<div class="container">
<form method="post" action="">	
<h1 class = "head4">Bone marrow plasmacytosis</h1>
<h4><input type="radio" name="c1" >greater than 10%
</label><label><input type="radio" name="c1" >less than 10%
</label>
<input type="text" name="t1" class ="in1">
<input type="text" name="t2" class ="in2">
<input type="text" name="t3" class ="in3">
   
<h3 class ="head1">Arjun</h3>
<h3 class ="head2">Spikee</h3>
<h3 class ="head3">Noel</h3>



<h3 class = "head5">Serum monoclonal protein, g/dL</h3>



<h4><input type="radio" name="c1" >greater than 3
</label><label><input type="radio" name="c1" >less than 3
<input type="reset" name="r" class="r">
<input type="submit" name="b1" class="btn1">
<input type="submit" name="b2" class="btn2">

</div>

<?php


header("Refresh:1");
if(isset($_POST['b1']))
{

   $x=$_POST['c1'];
   $y=$_POST['c2'];




 if($x=='greater than 10%' && $y=='greater than 3')
   {
   	 $z=69;
   }
   else if($x=='greater than 10%' && $y=='less than 3')
   {
   	 $z=43;
   }
   else if($x=='less than 10%' && $y=='greater than 3')
   {
   	 $z=15;
   }
   else
   {
   	$z='not defined';
   }	
   echo "<label>Risk:</label><input type='text' value='$z %'>";
}
?>



</form>
</div>
</body>
</html>