<?php
$server='localhost:3306'; // same 
$user='root'; //same 
$password='argus'; // mysql password 

	$cn=mysqli_connect($server,$user,$password);
	
	if($cn)
	{
			$q="create database project_shop";
			$sq=mysqli_query($cn,$q);
			if($sq)
			{
				echo 'created';
			}
			else
			{
					echo '<br>'.mysqli_error($cn);
			}
	}
	else
	{
		echo '<br>'.mysqli_connect_errno();
		echo '<br>'.mysqli_connect_error();
	}

?>