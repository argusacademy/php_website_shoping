<?php 
ob_start();
session_start();
if(session_id()!=$_SESSION['aid'])
{
header("location:login.php");
}

?>

<?php 
if(isset($_GET['x']))
{
include"connection.php";
$id=$_GET['x'];
$q="delete from reg where cid='".$id."'";

$sq=mysqli_query($cn,$q);
if($sq)
{
	header("location:auser.php");
}
else
{
echo '<br> '.mysqli_error($cn);
}
}
else
{
header("location:auser.php");
}

?>