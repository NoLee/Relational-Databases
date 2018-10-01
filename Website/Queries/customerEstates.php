<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Affordable Estates for Customer</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >

	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Affordable Estates for Customer</a></h1>
		<form id="form_982670" class="appnitro"  method="post" action="customerEstates.php">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>Affordable Estates for Customer</h2>
			<p>Please insert the name of the customer.</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Name </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="982670" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			


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
	if (isset($_POST['submit'])){	

		//Select data from a SELECT statement to show at the dropdown list
		$select = "SELECT c.Name,c.Surname,c.`Home Type` ,c.`Maximum Rent`,e.Street,e.`Street Num`, e.`Postal Code`,e.`Estate Type`,e.`Monthly Rent`
			   FROM `customer` as c
			   INNER JOIN `estate` as e
			   ON e.`Monthly rent`< c.`Maximum Rent`
			   WHERE c.`Name` LIKE '".$_POST["element_1_1"]."' AND c.`Surname` LIKE '".$_POST["element_1_2"]."' ";
		$result = mysqli_query($con, $select);
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    // mysqli_field_count($con) :: Returns the number of columns for the most recent query on the connection 
		    // mysqli_fetch_fields($result)  :: Returns an array of objects
		    $i=0;
		    echo '<li id="li_3" >';
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
			
			//echo '<td> <input class="button_text" type="submit" name="delete_button" value="Delete" /> </td>';
			//echo '<td> <button class="button_text" type="button" name="ID_'.$row["Employee_ID"].'" >Delete </button> </td>';
			echo "</tr>";
 			
		    }
		    echo " </tr> </table> </li>";
		} else {
		    echo "</br> <li> 0 results </li>";
		}
	
	}
?>	
	</ul>
		</form>	

	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
