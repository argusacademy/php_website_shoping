<?php 
if(isset($_GET['x']))
{
include"connection.php";
$id=$_GET['x'];
$q="delete from bill where bid='".$id."'";

$sq=mysqli_query($cn,$q);
if($sq)
{
	header("location:abill.php");
}
else
{
echo '<br> '.mysqli_error($cn);
}
}
else
{
header("location:abill.php");
}

?>