<?php
// registration table for bill
	include"connection.php";
	
	$q="create table bill
	(bid int(5) primary key auto_increment,
	cid int(5) not null,
	pid int(5) not null,
	quantity int(4) not null,
	amt int(7) not null,
	bill_date date not null) ";
	
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