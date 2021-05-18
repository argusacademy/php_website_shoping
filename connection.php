<?php 
$server='localhost:3306'; // same 
$user='root'; //same 
$password='argus'; // mysql password 
$database="project_shop";  // created database name 

	$cn=mysqli_connect($server,$user,$password,$database);
	
	if(!$cn)
	{
		echo'<br>'.mysqli_connect_errno();
		echo'<br>'.mysqli_connect_error();
	}

?>