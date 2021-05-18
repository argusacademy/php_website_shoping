<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#">ABC GOOD FOOD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
     
       <li class="nav-item" > <a class="nav-link text-danger" href="index.php">Home </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="sign_up.php">Sign Up </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="login.php">Login </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="contact.php">Contact </a> </li>

     
    </ul>
  </div>
</nav>


<?php 
$n=$ns=$e=$es=$p=$ps=$ph=$phs=$a=$as='';
function checkname()
{
	$nc='/^[A-Za-z ]*$/';
	$n=trim($_POST['n']);
	if(preg_match($nc,$n) && strlen($n)>0)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function checkphone()
{
	$phc='/^[0-9]{10,10}$/';
	$ph=trim($_POST['ph']);
	if(preg_match($phc,$ph) )
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function checkemail()
{
	$ec='/^[a-zA-Z0-9._-]*\@[a-zA-Z0-9]*\.[a-zA-Z]{2,6}$/';
	$e=trim($_POST['e']);
	if(preg_match($ec,$e) )
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function checkpassword()
{
	
	$p=trim($_POST['p']);
	if( strlen($p)>=4 && strlen($p)<=10 )
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function checkaddress()
{
	
	$a=trim($_POST['a']);
	if( strlen($a)>=10 && strlen($a)<=50 )
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

if(isset($_POST['s']))
{
	if(checkname()=='y')
	{
		$n=trim($_POST['n']);
	}
	else 
	{
		$ns='** check name';
	}
	
	if(checkemail()=='y')
	{
		$e=trim($_POST['e']);
	}
	else 
	{
		$es='** check email';
	}
	
	if(checkphone()=='y')
	{
		$ph=trim($_POST['ph']);
	}
	else 
	{
		$phs='** check phone';
	}
	
	if(checkpassword()=='y')
	{
		$p=trim($_POST['p']);
	}
	else 
	{
		$ps='** check password';
	}
	
	if(checkaddress()=='y')
	{
		$a=trim($_POST['a']);
	}
	else 
	{
		$as='** check address';
	}
	
	if(checkname()=='y' && checkemail()=='y' && checkphone()=='y' && checkaddress()=='y' && checkpassword()=='y')
	{
	
	include"connection.php";
	
	$q="insert into reg 
	(name,email,password,phone,address )
	value('".$n."','".$e."','".$p."','".$ph."','".$a."')";
	
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
	echo'<script> alert("sucessfully registred")</script>';
	$n=$ns=$e=$es=$p=$ps=$ph=$phs=$a=$as='';

	}
	else
	{
		echo '<br>'.mysqli_error($cn);
	}
	
	
	}
	else
	{
	echo '<script> alert("check entered detial ")</script>';
	}
	
}
?>
<style>
.m{background-color:red;color:white;font-family:cooper black;margin:5px;padding:20px;}


</style>

<div class="fluid-container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="m">
			<form action="" method="POST">
enter name <input type="text" name="n" value="<?php echo $n; ?>">
<span  style="color:red;"><?php  echo $ns; ?></span>  
<br><br>
	email <input type="text" name="e" value="<?php echo $e; ?>">
<span  style="color:red;"><?php  echo $es; ?></span>  
<br><br>
	password [b/w 4 to 10] 
	<input type="password" name="p" maxlength="10" value="<?php echo $p; ?>">
<span  style="color:red;"><?php  echo $ps; ?></span>  
<br><br>

	phone <input type="text" name="ph" maxlength="10" value="<?php echo $ph; ?>">
<span  style="color:red;"><?php  echo $phs; ?></span>  
<br><br>
	address <textarea maxlength="50" name="a"><?php echo $a; ?></textarea>
<span  style="color:red;"><?php  echo $as; ?></span>  
<br><br>

<input type="submit" name="s">
<input type="submit" name="s1" value="clear">
</form>
			</div>
		</div>
	</div>
	
	
	
</div>