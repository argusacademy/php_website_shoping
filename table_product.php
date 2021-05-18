<?php
// registration table for product
	include"connection.php";
	
	$q="create table product 
	(pid int(5) primary key auto_increment,
	pname varchar(50) not null , 
	rate int(5) not null,
	detail varchar(200) not null ,
	photo varchar(500) not null ) ";
	
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		echo 'created';
	}
	else
	{
		echo '<br> '.mysqli_error($cn);
	}

?>