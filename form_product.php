<?php 
$n=$ns=$r=$rs=$d=$ds=$ms='';
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


function checkrate()
{
	$rc='/^[0-9]{1,5}$/';
	$r=trim($_POST['r']);
	if(preg_match($rc,$r) )
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}



function checkdetail()
{
	
	$d=trim($_POST['d']);
	if( strlen($d)>=10 && strlen($d)<=50 )
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function checkimage()
{
	if($_FILES['m']!='')
	{
		$fn=$_FILES['m']['name'];
		
		$l=strlen($fn);
		$dp=strrpos($fn,'.');
		$ext=substr($fn,$dp+1,$l);
		$c=array('jpg','png','gif','jfif','bmp');
		if(in_array($ext,$c))
		{
			return 'y';
		}
		else
		{
			return 'n';
		}
		
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
	
	if(checkrate()=='y')
	{
		$r=trim($_POST['r']);
	}
	else 
	{
		$rs='** check rate';
	}
	
	if(checkdetail()=='y')
	{
		$d=trim($_POST['d']);
	}
	else 
	{
		$ds='** check detail';
	}
	
	if(checkimage()=='y')
	{
		$fn=$_FILES['m']['name'];
		$ta=$_FILES['m']['tmp_name'];
		$fa='load/'.uniqid().$fn;
	}
	else
	{
		$ms='** check image file ';
	}
	
	if(checkname()=='y' && checkrate()=='y' && checkdetail()=='y'  && checkimage()=='y')
	{
	
	include"connection.php";
	
	$q="insert into product
	(pname,rate,detail,photo )
	value('".$n."','".$r."','".$d."','".$fa."')";
	
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
	move_uploaded_file($ta,$fa);
	echo'<script> alert("inserted sucessfully ")</script>';
	$n=$ns=$r=$rs=$d=$ds=$ms='';

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

<form action="" method="POST" enctype="multipart/form-data">
enter product name <input type="text" name="n" value="<?php echo $n; ?>">
<span  style="color:red;"><?php  echo $ns; ?></span>  
<br><br>

	rate :
	<input type="text" name="r" maxlength="5" value="<?php echo $r; ?>">
<span  style="color:red;"><?php  echo $rs; ?></span>  
<br><br>

	
	detail <textarea maxlength="50" name="d"><?php echo $d; ?></textarea>
<span  style="color:red;"><?php  echo $ds; ?></span>  
<br><br>

	load image <input type="file" name="m">
<span  style="color:red;"><?php  echo $ms; ?></span>  
<br><br>

<input type="submit" name="s">
<input type="submit" name="s1" value="clear">
</form>