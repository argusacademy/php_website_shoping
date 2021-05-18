<?php 
if(isset($_GET['x']))
{
include"connection.php";
$id=$_GET['x'];
$q="delete from product where pid='".$id."'";

$sq=mysqli_query($cn,$q);
if($sq)
{
	header("location:aproduct.php");
}
else
{
echo '<br> '.mysqli_error($cn);
}
}
else
{
header("location:aproduct.php");
}

?>