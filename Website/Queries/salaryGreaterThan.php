<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Salary Greater than a Certain Amount</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >

	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Salary Greater than a Certain Amount</a></h1>
		<form id="form_982670" class="appnitro"  method="post" action="salaryGreaterThan.php">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>Salary Greater than a Certain Amount</h2>
			<p>Return the employees that have salary greater than <input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="10" value=""/> and show them in ascending order. (Blank equals 0)</p>
		</div>						
			<ul >
			
		
			
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
		$_POST["element_1_1"]=!empty($_POST["element_1_1"])? "'".$_POST["element_1_1"]."'": '0';
		//Select data from a SELECT statement to show at the dropdown list
		$select = "SELECT e.Name , e.Surname , .e.Salary
				FROM `employee` as e
				WHERE e.Salary > ".$_POST["element_1_1"]."
				ORDER BY Salary ASC";
		$result = mysqli_query($con, $select);
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    // mysqli_field_count($con) :: Returns the number of columns for the most recent query on the connection 
		    // mysqli_fetch_fields($result)  :: Returns an array of objects
		    $i=0;
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
			
			//echo '<td> <input class="button_text" type="submit" name="delete_button" value="Delete" /> </td>';
			//echo '<td> <button class="button_text" type="button" name="ID_'.$row["Employee_ID"].'" >Delete </button> </td>';
			echo "</tr>";
		    }
		    echo " </tr> </table> </li>";
		    
		} else {
		    echo "</br> <li> 0 results </li>";
		}
	
	}

	if (isset($_POST['delete_button'])){	
		$result = mysqli_query($con, "DELETE FROM `ideal home`.`employee` WHERE `employee`.`Employee_ID` = ".$_POST["element_2"]);
		if (mysqli_affected_rows($con)>0){
			echo '<h3 class="correct"> Successfully deleted </h3>';
		}
		else {
			echo '<h3 class="wrong"> No employee with such ID </h3>';
		}
	}
?>	
	</ul>
		</form>	

	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
