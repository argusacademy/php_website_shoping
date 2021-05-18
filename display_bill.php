
<?php 
// mysqli_fetch_row()  gets value of each row one by one in from of array 

include"connection.php";

$q="select * from bill ";

$sq=mysqli_query($cn,$q);

if($sq)
{
		if(mysqli_fetch_row($sq)>0)  // checks if any date fetcted or not
		{
				$sq=mysqli_query($cn,$q);
				
				while($r=mysqli_fetch_row($sq))
				{
						echo '<hr color="red"> bid '.$r[0];
						echo '| cid '.$r[1];
						echo '| pid'.$r[2];
						echo '| quantity '.$r[3];
						echo '|amount '.$r[4];
						echo '| bill date '.$r[5];
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

$q="select * from bill";

$sq=mysqli_query($cn,$q);

if($sq)
{
		if(mysqli_fetch_array($sq)>0)  // checks if any date fetcted or not
		{
				$sq=mysqli_query($cn,$q);
		echo '<table border="2px" >
		<tr bgcolor="cyan"><th> bid </th> <th>customer id </th>  <th>  produnt id</th>
		<th>quantity  </th> <th>amount </th> <th>bill date</th>
		<th> delete</th>
		<tr>';
				while($r=mysqli_fetch_array($sq))
				{
				$bid=$r['bid'];
						echo '<tr><th> '.$r['bid'].'</th>';
						echo '<th>  '.$r['cid'].'</th>';
						echo '<th> '.$r['pid'].'</th>';
						echo '<th> '.$r['quantity'].'</th>';
						echo '<th> '.$r['amt'].'</th>';
						echo '<th>  '.$r['bill_date'].'</th>
						<th><a href="del_bill.php?x='.$bid.'"> delete</a></th>
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