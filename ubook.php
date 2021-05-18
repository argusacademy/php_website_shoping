<?php 
ob_start();
session_start();
if(session_id()!=$_SESSION['uid'])
{
header("location:login.php");
}

?>
<?php 
if(!isset($_GET['pid']))
{
	header("location:uproduct.php");
}

?>
<?php 
$a=$as='';
if(isset($_POST['s']))
{
	if($_POST['a']!='' && $_POST['a']!='0')
	{
	include"connection.php";
	$cid=$_SESSION['cid'];
	$pid=$_GET['pid'];
	$q=$_POST['q'];
	$amt=$_POST['a'];
	$d=date('Y-m-d');
	$qr="insert into bill (cid ,	pid ,quantity,	amt ,bill_date)
	values('".$cid."','".$pid."','".$q."','".$amt."','".$d."')";
	
	$sq=mysqli_query($cn,$qr);
	if($sq)
	{
		header("location:ubill.php");
	}
	else
	{
		echo'<br>'.mysqli_error($cn);
	}
	
	}
	else
	{
		$as="select proper quantity";
	}
}
?>

<?php 
$r=$_GET['ra'];
?>

<script>
function amt(q)
{
	var r=document.getElementById("r").value;
	var a=r*q;
	document.getElementById("a").value=a;
}
</script>

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
     
       <li class="nav-item" > <a class="nav-link text-danger" href="user.php">Profile </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="uproduct.php">Product Booking </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="ubill.php">Past Bill  </a> </li>
      <li class="nav-item"> <a class="nav-link text-danger" href="logout.php">Logout </a> </li>

     
    </ul>
  </div>
</nav>
<style>
.m{background-color:red;color:white;font-family:cooper black;margin:5px;padding:10px;}


</style>

<div class="fluid-container">
	<div class="row">
		<div class="col-md-6 offset-md-2">
			<div class="m">
			<?php 
			$u=$_SESSION['u'];
				echo 'welcome '.$u;
			?>
<form action="" method="POST" >
select quantity 
<select name="q" onchange="amt(this.value)">
	<option value="0">select</option> 
	<option value="1">1</option> 
	<option value="2">2</option> 
	<option value="3">3</option> 
	<option value="4">4</option>
	<option value="5">5</option>
</select>	
<br><br>

	rate :
	<input type="text" readonly name="r" id="r" maxlength="5" value="<?php echo $r; ?>"> 
<br><br>

amount :
	<input type="text" name="a" id="a"readonly maxlength="5" value="<?php echo $a; ?>">
<span style="color:red"><?php echo $as; ?></span>	
<br><br>	


<input type="submit" name="s">
<input type="submit" name="s1" value="clear">
</form>

	</div>
		</div>
	</div>
	
	
</div>