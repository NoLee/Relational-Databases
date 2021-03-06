<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update Estate</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Update Estate</a></h1>
		<form id="form_981137" class="appnitro"  method="post" action="updateLuxuryEstateForm.php">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>Update Estate</h2>
			<p>Please Insert Estate Information</p>
		</div>						
			<ul >
			
					<li id="li_1" >
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
		// execute an SQL statement with mysql_query(statement) function
		// storing the data returned in the $result variable
	if (isset($_POST['submit'])){	
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$_POST["element_1"]=!empty($_POST["element_1"])? "'".$_POST["element_1"]."'": "NULL";
		$_POST["element_2"]=!empty($_POST["element_2"])? "'".$_POST["element_2"]."'": "NULL";
		$_POST["element_3"]=!empty($_POST["element_3"])? "'".$_POST["element_3"]."'": "NULL";
		$_POST["element_4"]=!empty($_POST["element_4"])? "'".$_POST["element_4"]."'": "NULL";
		$_POST["element_5"]=!empty($_POST["element_5"])? "'".$_POST["element_5"]."'": "NULL";
		$_POST["element_6"]=!empty($_POST["element_6"])? "'".$_POST["element_6"]."'": "NULL";
		$_POST["element_7"]=!empty($_POST["element_7"])? "'".$_POST["element_7"]."'": "NULL";
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$result1 = mysqli_query($con,"UPDATE `ideal home`.`luxuryestates` SET `Estate_ID`=".$_POST['ID_to_update'].",
		`Street`=".$_POST["element_1"].", 
		`Street Num`=".$_POST["element_2"].", 
		`Postal Code`=".$_POST["element_3"].", 
		`Monthly Rent`=".$_POST["element_4"].", 
		`Estate Type`=".$_POST["element_5"].", 
		`Room Num`=".$_POST["element_6"].", 
		`Square Meters`=".$_POST["element_7"]."  
		WHERE `Estate_ID`=".$_POST['ID_to_update'].";");
		//FOR FIELDS THAT NEEDED NOT TO BE NULL '".$_POST["element_1_1"]."'  ----> ".$_POST["element_1_1"]."
		$war =mysqli_get_Warnings($con) ;	
		if ( !empty(mysqli_error($con)) ) { echo '<h3 class="wrong">'.mysqli_error($con).'</h3><p></p>'; }
		else if ( !empty($war) ) {echo '<h3 class="wrong"> $war->message </h3><p></p>';}
		else { echo '<h3 class="correct">Luxury Estate successfully updated. <p></p> </h3>'; }
		
	}
	$result = mysqli_query($con,"SELECT * FROM `luxuryestates` WHERE `luxuryestates`.`Estate_ID` = ".$_POST["ID_to_update"].";"); // ID_to_update IS FROM THE PREVIOUS PAGE (updateLuxuryEstate)
	$row = mysqli_fetch_assoc($result); //We have one row from the SELECT, we get the data with $row["column_name"]
 ?>
		<label class="description" for="element_1">Street </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Street']; ?>"/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Street Number </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Street Num']; ?>"/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Postal Code </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Postal Code']; ?>"/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Monthly Rent </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Monthly Rent']; ?>"/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Estate Type </label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Estate Type']; ?>"/> 
		</div><p class="guidelines" id="guide_5"><small>e.g. Appartment, Manor, Cottage..</small></p> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Number Of Rooms </label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Room Num']; ?>"/> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Square Meters </label>
		<div>
			<input id="element_7" name="element_7" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Square Meters']; ?>"/> 
		</div> 
		</li>		
					<li class="buttons">
			    <input type="hidden" name="form_id" value="981137" />
			    
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
