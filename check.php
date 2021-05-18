<?php 
	if(isset($_POST['s']))
	{
			$id=$_POST['id'];
			$p=$_POST['p'];
			if($id=='argus' && $p=='academy')
			{
				session_start();
				$_SESSION['a']=$id;
				$_SESSION['aid']=session_id();
				header("location:admin.php");
			}
			else
			{
		include"connection.php";
$q="select * from reg where email='".$id."' and password='".$p."'";
$sq=mysqli_query($cn,$q);
if($sq)
{
	if(mysqli_fetch_array($sq)>0)
	{
				session_start();
				$_SESSION['u']=$id;
				$_SESSION['uid']=session_id();
				header("location:user.php");
	}
	else 
	{
	header("location:login.php");
	}
}
else
{
	echo'<br>'.mysqli_error($cn);
}		
			
			
			
			}
	}	
	else 
	{
		header("location:login.php");
	}
	

?>