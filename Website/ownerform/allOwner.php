<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>All Employees</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >

	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>All Employees</a></h1>
		<form id="form_982670" class="appnitro"  method="post" action="">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
	<h2>All Employees</h2>
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
		echo "<h3>Private Owners</h3>";
		//Select data from a SELECT statement to show at the dropdown list
		$select = $select = "SELECT  p.Name, p.Surname, o.Street, o.`Street Num`, o.`Postal Code`, o.`E-Mail`, o.Telephone, o.`Tax Registration Number`
			FROM `private` as p
			INNER JOIN `owner` as o
			ON p.Owner_ID=o.Owner_ID ";
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
		    echo "</br> <li> No results for Private Owners</li>";
		}
		echo "<h3>Company Owners</h3>";
		//Select data from a SELECT statement to show at the dropdown list
		$select = "SELECT c.`Company Name`, c.`Company Type`, o.Street, o.`Street Num`, o.`Postal Code`, o.`E-Mail`, o.Telephone, o.`Tax Registration Number`
			FROM `company` as c
			INNER JOIN `owner` as o
			ON c.Owner_ID=o.Owner_ID";
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
		    echo "</br> <li> No results for Company Owners</li>";
		}
?>	
	</ul>
		</form>	

	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
