
<?php 
// mysqli_fetch_row()  gets value of each row one by one in from of array 

include"connection.php";

$q="select * from product ";

$sq=mysqli_query($cn,$q);

if($sq)
{
		if(mysqli_fetch_row($sq)>0)  // checks if any date fetcted or not
		{
				$sq=mysqli_query($cn,$q);
				
				while($r=mysqli_fetch_row($sq))
				{
						echo '<hr color="red"> pid '.$r[0];
						echo '| pname '.$r[1];
						echo '| rate '.$r[2];
						echo '| detial'.$r[3];
						echo '<img src="'.$r[4].'" width="50" heigth="50">';
						
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

$q="select * from product";

$sq=mysqli_query($cn,$q);

if($sq)
{
		if(mysqli_fetch_array($sq)>0)  // checks if any date fetcted or not
		{
				$sq=mysqli_query($cn,$q);
		echo '<table border="2px" >
		<tr bgcolor="cyan"><th> pid </th> <th>name </th>  <th>  rate</th>
		<th>detail </th> <th>photo </th> 
		<th> delete</th>
		<tr>';
				while($r=mysqli_fetch_array($sq))
				{
				$pid=$r['pid'];
						echo '<tr><th> '.$r['pid'].'</th>';
						echo '<th>  '.$r['pname'].'</th>';
						echo '<th> '.$r['rate'].'</th>';
						echo '<th> '.$r['detail'].'</th>';
						echo '<th> <img src="'.$r['photo'].'" width="50" heigth="50"></th>';
						echo '<th><a href="del_product.php?x='.$pid.'"> delete</a></th>
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