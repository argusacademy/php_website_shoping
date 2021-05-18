<?php 
ob_start();
session_start();
if(session_id()!=$_SESSION['aid'])
{
header("location:login.php");
}

?>


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
     
       <li class="nav-item" > <a class="nav-link text-danger" href="admin.php">Admin </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="auser.php">User Detail </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="aproduct.php">Product Detail </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="abill.php">Bill Deatil </a> </li>
 <li class="nav-item"> <a class="nav-link text-danger" href="logout.php">Logout </a> </li>

     
    </ul>
  </div>
</nav>
<style>
.m{background-color:red;color:white;font-family:cooper black;margin:5px;padding:10px;}
.n{background-color:gray;color:white;font-family:cooper black;margin:5px;padding:10px;}


</style>

<div class="fluid-container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="m">
			<?php 
			$a=$_SESSION['a'];
				echo 'welcome '.$a;
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
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="n">
			<?php 
// mysqli_fetch_array()
//  gets value of each row one by one in from of array or assocative array 
// mysqli_fetch_assoc();

include"connection.php";

$q="select * from product";

$sq=mysqli_query($cn,$q);

if($sq)
{
		if(mysqli_fetch_array($sq)>0)  // checks if any date fetcted or not
		{
				$sq=mysqli_query($cn,$q);
		echo '<table border="2px" >
		<tr bgcolor="cyan"><th> pid </th> <th>name </th>  <th>  rate</th>
		<th>detail </th> <th>photo </th> 
		<th> delete</th>
		<tr>';
				while($r=mysqli_fetch_array($sq))
				{
				$pid=$r['pid'];
						echo '<tr><th> '.$r['pid'].'</th>';
						echo '<th>  '.$r['pname'].'</th>';
						echo '<th> '.$r['rate'].'</th>';
						echo '<th> '.$r['detail'].'</th>';
						echo '<th> <img src="'.$r['photo'].'" width="50" heigth="50"></th>';
						echo '<th><a href="adel_product.php?x='.$pid.'"> delete</a></th>
						</tr>';
				}
				echo'</table>';
		}
		else
		{
			echo 'no data found';
		}
}
else
{
	echo'<br>'.mysqli_error($cn);
}

?>
			
			</div>
		</div>
	</div>
	
</div>