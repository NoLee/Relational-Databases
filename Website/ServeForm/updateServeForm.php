<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Employee/Customer Relation</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Serves</a></h1>
		<form id="form_982714" class="appnitro"  method="post" action="updateServeForm.php">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>Employee/Customer Relation</h2>
			<p>Define Which Employee Is Responsible For Which Customer</p>
		</div>						
			<ul >

				<li id="li_2" >		
				
<!-- this hidden input holds the id to update -->
<input type="hidden" name="CID_to_update" value="<?php echo $_POST['CID_to_update']; ?>">
<input type="hidden" name="EID_to_update" value="<?php echo $_POST['EID_to_update']; ?>">					
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
		
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$_POST["element_2"]=!empty($_POST["element_2"])? "'".$_POST["element_2"]."'": "NULL";
		$_POST["element_3"]=!empty($_POST["element_3"])? "'".$_POST["element_3"]."'": "NULL";
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$result1 = mysqli_query($con,"UPDATE `ideal home`.`serves` SET 
		`Customer_ID` =".$_POST["element_3"].",
		`Employee_ID`=".$_POST["element_2"]."
		WHERE `Customer_ID`=". $_POST['CID_to_update']." AND `Employee_ID`=". $_POST['EID_to_update'].";");
		
		//FOR FIELDS THAT NEEDED NOT TO BE NULL '".$_POST["element_1_1"]."'  ----> ".$_POST["element_1_1"]."
		$war =mysqli_get_Warnings($con) ;	
		if ( !empty(mysqli_error($con)) ) { echo '<h3 class="wrong">'.mysqli_error($con).' Go back home</h3><p></p>'; }
		else if ( !empty($war) ) {echo '<h3 class="wrong"> $war->message </h3><p></p>';}
		else { echo '<h3 class="correct"> Employee/Customer Relation successfully updated. Go back home <p></p> </h3>'; }
	}
	$result = mysqli_query($con,"SELECT * FROM `serves` WHERE `serves`.`Employee_ID` = ".$_POST["EID_to_update"]." AND `serves`.`Customer_ID`=".$_POST["CID_to_update"].";"); // ID_to_update IS FROM THE PREVIOUS PAGE (updateEmployee)
	$row1 = mysqli_fetch_assoc($result); //We have one row from the SELECT, we get the data with $row["column_name"]
	$c_id=$row1['Customer_ID'];	
 ?>					
		<label class="description" for="element_2">Employee ID </label>
		<div>
		<select class="element select medium" id="element_2" name="element_2"> 
			<option value="" selected="selected"></option>
			<?php
			//Select data from a SELECT statement to show at the dropdown list
			$select = "SELECT `Employee_ID`,`Name` ,`Surname` FROM `employee`";
			$result = mysqli_query($con, $select);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
				    if ($_POST["EID_to_update"] ==$row["Employee_ID"] ){echo '<option name ="element_2" value="'.$row["Employee_ID"].'" selected="selected">'.$row['Name'].' '.$row['Surname'].'</option>';}
				    else{
					echo '<option name ="element_2" value="'.$row["Employee_ID"].'">'.$row['Name'].' '.$row['Surname'].'</option>';
				    }
			    }
			} else {
			    echo "0 results";
			}
		 ?>
		</select>
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Customer ID </label>
		<div>
		<select class="element select medium" id="element_3" name="element_3"> 
			<option value="" selected="selected"></option>

		<?php
		//Select data from a SELECT statement to show at the dropdown list
			$select = "SELECT `Customer_ID`,`Name` ,`Surname` FROM `customer`";
			$result = mysqli_query($con, $select);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
				     if ($_POST["CID_to_update"] ==$row["Customer_ID"] ){echo '<option name ="element_3" value="'.$row["Customer_ID"].'" selected="selected">'.$row['Name'].' '.$row['Surname'].'</option>';}
				     else{
					echo '<option name ="element_3" value="'.$row["Customer_ID"].'">'.$row['Name'].' '.$row['Surname'].'</option>';
				    }
			    }
			} else {
			    echo "0 results";
			}
		 ?>
			
			
		</select>
		</div> 
		</li>	
		<li class="buttons">
			    <input type="hidden" name="form_id" value="982714" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		
		</form>	
		<div id="footer">
			Generated by <a href="http://www.phpform.org">pForm</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
