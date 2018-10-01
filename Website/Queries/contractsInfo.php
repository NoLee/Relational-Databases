<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Contracts Info</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >

	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Contracts Info</a></h1>
		<form id="form_982670" class="appnitro"  method="post" action="">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>All the contracts information, including the customer and the estate that is being involved in the contract.</h2>
		</div>						
			<ul >
			


<?php
	// create a connection to the database with
	// mysql_connect(servername, username, password) function
	$con = mysqli_connect("localhost","root","");
	if (!$con){
	 	die('Could not connect: ' . mysqli_error($con));
	}
	$db="ideal home";
	// a database must be selected before a query is executed on it
	mysqli_select_db($con,$db) or die('DB connection error' . mysqli_error($con));
	// execute an SQL statement with mysql_query(statement) function
	// storing the data returned in the $result variable

		//Select data from a SELECT statement to show at the dropdown list
		$select = "select c.Name as `Customer Name`, c.Surname as `Customer Surname`, e.Street as `Estate Street`, e.`Street Num` as `Estate Street Number`, e.`Postal Code`, g.Starts, g.Duration, g.Rent, g.`Payment Method`
				from `contract` as g
				inner join `customer` as c
				on c.Customer_ID=g.Customer_ID
				inner join `estate` as e
				on g.Estate_ID=e.Estate_ID";
		$result = mysqli_query($con, $select);
		//echo mysqli_num_rows($result);
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    // mysqli_field_count($con) :: Returns the number of columns for the most recent query on the connection 
		    // mysqli_fetch_fields($result)  :: Returns an array of objects
		    echo '</br><li id="li_3" >';
		    echo '<table > <tr>';
		    /* Get field information for all columns */
		    $col = mysqli_fetch_fields($result);
		    foreach ($col as $var) {
			echo '<th align="center">'.$var->name.'</th>';
		    }
		
		    while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			foreach ($col as $var) {
				echo '<td align="center">'.$row[$var->name].'</td>';
			}
			echo "</tr>";
		    }
		    echo " </tr> </table> </li>";
		    
		} else {
		    echo "</br> <li> No Results </li>";
		}
	
	
?>	
	</ul>
		</form>	

	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
