<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update Private Owner</title>
<link rel="stylesheet" type="text/css" href="../../view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Update Private Owner</a></h1>
		<form id="employee" class="appnitro"  method="post" action="updatePrivateForm.php">
					<div class="form_description">
					<a href=../../template.html> <img src="../../home.png" alt="Home" id="home_img"> </a>  
			<h2>Update Private Owner</h2>
			<p>Please insert the Private Owner info</p>
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
		$_POST["element_9_1"]=!empty($_POST["element_9_1"])? "'".$_POST["element_9_1"]."'": "NULL";
		$_POST["element_9_2"]=!empty($_POST["element_9_2"])? "'".$_POST["element_9_2"]."'": "NULL";
		$_POST["element_3"]=!empty($_POST["element_3"])? "'".$_POST["element_3"]."'": "NULL";
		$_POST["element_4"]=!empty($_POST["element_4"])? "'".$_POST["element_4"]."'": "NULL";
		$_POST["element_5"]=!empty($_POST["element_5"])? "'".$_POST["element_5"]."'": "NULL";
		$_POST["element_6"]=!empty($_POST["element_6"])? "'".$_POST["element_6"]."'": "NULL";
		$_POST["element_7"]=!empty($_POST["element_7"])? "'".$_POST["element_7"]."'": "NULL";
		$_POST["element_8"]=!empty($_POST["element_8"])? "'".$_POST["element_8"]."'": "NULL";


		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$result1 = mysqli_query($con,"UPDATE `ideal home`.`owner` SET `Owner_ID`=".$_POST['ID_to_update']." ,
		`Street`=".$_POST["element_4"].", 
		`Street Num`=".$_POST["element_5"].", 
		`Postal Code`=".$_POST["element_6"].", 
		`Tax Registration Number`=".$_POST["element_3"].",
		`E-Mail` =".$_POST["element_7"].",
		`Telephone`=".$_POST["element_8"]." WHERE `owner`.`Owner_ID` =".$_POST['ID_to_update'].";");
		//FOR FIELDS THAT NEEDED NOT TO BE NULL '".$_POST["element_1_1"]."'  ----> ".$_POST["element_1_1"]."
		$x = mysqli_insert_id($con);
		$war =mysqli_get_Warnings($con) ;	
		if ( empty(mysqli_error($con)) && empty($war)  ){
			$result3 = mysqli_query($con,"UPDATE `ideal home`.`private` SET `Owner_ID`=".$_POST['ID_to_update']." ,
			`Name`=".$_POST["element_9_1"]." ,
			`Surname`=".$_POST["element_9_2"]." WHERE `private`.`Owner_ID` =".$_POST['ID_to_update'].";");
		}
		$war =mysqli_get_Warnings($con) ;	
		if ( !empty(mysqli_error($con)) ) { echo '<h3 class="wrong">'.mysqli_error($con).'</h3><p></p>'; }
		else if ( !empty($war) ) {echo '<h3 class="wrong"> $war->message </h3><p></p>';}
		else { echo '<h3 class="correct"> Private Owner '.$_POST['element_9_1'].' ' .$_POST['element_9_2']. ' succesfully updated. <p></p> </h3>'; }
		
	}
	//Owners data
	$result = mysqli_query($con,"SELECT * FROM `owner` WHERE `owner`.`Owner_ID` = ".$_POST["ID_to_update"].";"); // ID_to_update IS FROM THE PREVIOUS PAGE (updateEmployee)
	$rowO = mysqli_fetch_assoc($result); //We have one row from the SELECT, we get the data with $row["column_name"]
	//Private's Data
	$result = mysqli_query($con,"SELECT * FROM `private` WHERE `private`.`Owner_ID` = ".$_POST["ID_to_update"].";"); // ID_to_update IS FROM THE PREVIOUS PAGE (updateEmployee)
	$rowP = mysqli_fetch_assoc($result); //We have one row from the SELECT, we get the data with $row["column_name"]
	mysqli_close($con);
 ?>

		</li>		<li id="li_1" >
		<label class="description" for="element_9">Owner's Name </label>
		<span>
			<input id="element_9_1" name= "element_9_1" class="element text" maxlength="255" size="8" value="<?php echo $rowP['Name']; ?>"/>
			<label>First</label>
		</span>
		<span>
			<input id="element_9_2" name= "element_9_2" class="element text" maxlength="255" size="14" value="<?php echo $rowP['Surname']; ?>"/>
			<label>Last</label>
		</span> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Tax Registration Number </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="<?php echo $rowO['Tax Registration Number']; ?>"/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Street </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="<?php echo $rowO['Street']; ?>"/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Street Number </label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value="<?php echo $rowO['Street Num']; ?>"/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Postal Code </label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value="<?php echo $rowO['Postal Code']; ?>"/> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">E-Mail </label>
		<div>
			<input id="element_7" name="element_7" class="element text medium" type="text" maxlength="255" value="<?php echo $rowO['E-Mail']; ?>"/> 
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Telephone Number </label>
		<div>
			<input id="element_8" name="element_8" class="element text medium" type="text" maxlength="255" value="<?php echo $rowO['Telephone']; ?>"/> 
		</div> 
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
