<?php 
ob_start();
session_start();
if(session_id()!=$_SESSION['uid'])
{
header("location:login.php");
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
						<?php 


include"connection.php";

$q="select * from bill where cid='".$_SESSION['cid']."'";

$sq=mysqli_query($cn,$q);

if($sq)
{
		if(mysqli_fetch_array($sq)>0)  // checks if any date fetcted or not
		{
				$sq=mysqli_query($cn,$q);
		echo '<table border="2px" >
		<tr bgcolor="cyan"><th> bid </th> <th>customer id </th>  <th>  produnt id</th>
		<th>quantity  </th> <th>amount </th> <th>bill date</th>
	
		<tr>';
				while($r=mysqli_fetch_array($sq))
				{
				$bid=$r['bid'];
						echo '<tr><th> '.$r['bid'].'</th>';
						echo '<th>  '.$r['cid'].'</th>';
						echo '<th> '.$r['pid'].'</th>';
						echo '<th> '.$r['quantity'].'</th>';
						echo '<th> '.$r['amt'].'</th>';
						echo '<th>  '.$r['bill_date'].'</th>
						
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