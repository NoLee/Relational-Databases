<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Employee</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Customer</a></h1>
		<form id="customer" class="appnitro"  method="post" action="updateCustomerForm.php">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>Customer</h2>
			<p>Please insert the customer info</p>
		</div>						
			<ul >
			
					<li id="li_7" >
<!-- this hidden input holds the id to update -->
<input type="hidden" name="ID_to_update" value="<?php echo $_POST['ID_to_update']; ?>">

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

	//This happens when we press the "submit button" to update
	if (isset($_POST['submit'])){
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$_POST["element_1_1"]=!empty($_POST["element_1_1"])? "'".$_POST["element_1_1"]."'": "NULL";
		$_POST["element_1_2"]=!empty($_POST["element_1_2"])? "'".$_POST["element_1_2"]."'": "NULL";
		$_POST["element_2"]=!empty($_POST["element_2"])? "'".$_POST["element_2"]."'": "NULL";
		$_POST["element_3"]=!empty($_POST["element_3"])? "'".$_POST["element_3"]."'": "NULL";
		$_POST["element_4"]=!empty($_POST["element_4"])? "'".$_POST["element_4"]."'": "NULL";
		$_POST["element_5"]=!empty($_POST["element_5"])? "'".$_POST["element_5"]."'": "NULL";
		$_POST["element_6"]=!empty($_POST["element_6"])? "'".$_POST["element_6"]."'": "NULL";
		$_POST["element_7"]=!empty($_POST["element_7"])? "'".$_POST["element_7"]."'": "NULL";
		$_POST["element_8"]=!empty($_POST["element_8"])? "'".$_POST["element_8"]."'": "NULL";


		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$result1 = mysqli_query($con,"UPDATE `ideal home`.`customer` SET `Customer_ID` = '".$_POST['ID_to_update']."', 
		`Street` = ".$_POST['element_2'].", 
		`Street Num` = ".$_POST['element_3'].", 
		`Postal Code` = ".$_POST['element_4'].", 
		`Name` = ".$_POST['element_1_1'].", 
		`Surname` = ".$_POST['element_1_2'].", 
		`Maximum Rent` = ".$_POST['element_5'].",
		`Home Type` = ".$_POST['element_6'].", 
		`E-Mail` = ".$_POST['element_8'].", 
		`Telephone` = ".$_POST['element_7']." 
		WHERE `customer`.`Customer_ID` = ".$_POST['ID_to_update'].";");
		//FOR FIELDS THAT NEEDED NOT TO BE NULL '".$_POST["element_1_1"]."'  ----> ".$_POST["element_1_1"]."
		$war =mysqli_get_Warnings($con) ;	
		if ( !empty(mysqli_error($con)) ) { echo "<h3 class='wrong'>".mysqli_error($con)." </h3><p></p>"; }
		else if ( !empty($war) ) {echo "<h3 class='wrong'> $war->message </h3><p></p>";}
		else { echo '<h3 class="correct"> Customer '.$_POST['element_1_1'].' ' .$_POST['element_1_2']. ' succesfully updated. <p></p> </h3>'; }
		// close connection
		
	}
	//Moved this to bottom (so it updates first, and then selects everyone)
	$result = mysqli_query($con,"SELECT * FROM `customer` WHERE `customer`.`Customer_ID` = ".$_POST["ID_to_update"].";"); // ID_to_update IS FROM THE PREVIOUS PAGE (updateEmployee)
	$row = mysqli_fetch_assoc($result); //We have one row from the SELECT, we get the data with $row["column_name"]
	mysqli_close($con);
 ?>


		</li>		<li id="li_1" >
		<label class="description" for="element_1">Customer's Name </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value="<?php echo $row['Name']; ?>"/>
			<label>First</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value="<?php echo $row['Surname']; ?>"/>
			<label>Last</label>
		</span> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Phone </label>
		<div>
			<input id="element_7" name="element_7" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Telephone']; ?>"/> 
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">E-Mail </label>
		<div>
			<input id="element_8" name="element_8" class="element text medium" type="text" maxlength="255" value="<?php echo $row['E-Mail']; ?>"/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Street </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Street']; ?>"/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Street Number </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Street Num']; ?>"/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Postal Code </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Postal Code']; ?>"/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Maximum Rent </label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Maximum Rent']; ?>"/> 
		</div><p class="guidelines" id="guide_5"><small>Estimation Of Maximum Rent Customer Is Willing To Pay For An Estate</small></p> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Preffered House Type </label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Home Type']; ?>"/> 
		</div><p class="guidelines" id="guide_6"><small>e.g. Appartment, Cottage, Chalet, Manor</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="981137" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>

	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
	
</html>
