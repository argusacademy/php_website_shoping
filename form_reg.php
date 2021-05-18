<!--
/^[A-Za-z ]*$/; -> name 
'/^[0-9]{10,10}$/';  -> phone 
/^[a-zA-Z0-9._-]*\@[a-zA-Z0-9]*\.[a-zA-Z]{2,6}$/;  -> email 
 !--->
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