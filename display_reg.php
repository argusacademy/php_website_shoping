
<?php 
// mysqli_fetch_row()  gets value of each row one by one in from of array 

include"connection.php";

$q="select * from reg ";

$sq=mysqli_query($cn,$q);

if($sq)
{
		if(mysqli_fetch_row($sq)>0)  // checks if any date fetcted or not
		{
				$sq=mysqli_query($cn,$q);
				
				while($r=mysqli_fetch_row($sq))
				{
						echo '<hr color="red"> cid '.$r[0];
						echo '| name '.$r[1];
						echo '| email '.$r[2];
						echo '| password '.$r[3];
						echo '|address '.$r[4];
						echo '| phone '.$r[5];
				}
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

<hr color="green">

<?php 
// mysqli_fetch_array()
//  gets value of each row one by one in from of array or assocative array 
// mysqli_fetch_assoc();

include"connection.php";

$q="select * from reg";

$sq=mysqli_query($cn,$q);

if($sq)
{
		if(mysqli_fetch_array($sq)>0)  // checks if any date fetcted or not
		{
				$sq=mysqli_query($cn,$q);
		echo '<table border="2px" >
		<tr bgcolor="cyan"><th> cid </th> <th>name </th>  <th>  email</th>
		<th>password  </th> <th>address </th> <th>phone </th>
		<th> delete</th>
		<tr>';
				while($r=mysqli_fetch_array($sq))
				{
				$cid=$r['cid'];
						echo '<tr><th> '.$r['cid'].'</th>';
						echo '<th>  '.$r['name'].'</th>';
						echo '<th> '.$r['email'].'</th>';
						echo '<th> '.$r['password'].'</th>';
						echo '<th> '.$r['address'].'</th>';
						echo '<th>  '.$r['phone'].'</th>
						<th><a href="del_reg.php?x='.$cid.'"> delete</a></th>
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