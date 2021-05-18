<?php
// registration table for customer 
	include"connection.php";
	
	$q="create table reg 
	(cid int(5) primary key auto_increment,
	name varchar(50) not null , 
	email varchar(50) not null unique ,
	password varchar(20) not null,
	address varchar(100) not null ,
	phone varchar(15) not null) ";
	
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