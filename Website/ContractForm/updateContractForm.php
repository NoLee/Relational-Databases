<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update Contract</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Update Contract</a></h1>
		<form id="form_981137" class="appnitro"  method="post" action="updateContractForm.php">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>Contract</h2>
			<p>Update The Necessary Information Below</p>
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

	//This happens when we press the "submit button" to update
	if (isset($_POST['submit'])){
	
		$day = $_POST['element_1_1'];
		$month = $_POST['element_1_2'];
		$year = $_POST['element_1_3'];
		
		$_POST["element_2"]=!empty($_POST["element_2"])? "'".$_POST["element_2"]."'": "NULL";
		$_POST["element_3"]=!empty($_POST["element_3"])? "'".$_POST["element_3"]."'": "NULL";
		$_POST["element_4"]=!empty($_POST["element_4"])? "'".$_POST["element_4"]."'": "NULL";
		$_POST["element_5"]=!empty($_POST["element_5"])? "'".$_POST["element_5"]."'": "NULL";
		$_POST["element_6"]=!empty($_POST["element_6"])? "'".$_POST["element_6"]."'": "NULL";


		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$result1 = mysqli_query($con,"UPDATE `ideal home`.`contract` SET `Contract_ID`=".$_POST['ID_to_update'].",
		`Starts`='$year.$month.$day',
		 `Duration`=".$_POST["element_2"].", 
		 `Rent`=".$_POST["element_3"].", 
		 `Payment Method`=".$_POST["element_6"].",
		 `Customer_ID`=".$_POST["element_4"].",
		 `Estate_ID`=".$_POST["element_5"]."
		 WHERE `Contract_ID`=".$_POST['ID_to_update'].";");
		//FOR FIELDS THAT NEEDED NOT TO BE NULL '".$_POST["element_1_1"]."'  ----> ".$_POST["element_1_1"]."
		$war =mysqli_get_Warnings($con) ;	
		if ( !empty(mysqli_error($con)) ) { echo "<h3 class='wrong'>".mysqli_error($con)."</h3><p></p>"; }
		else if ( !empty($war) ) {echo "<h3 class='wrong'> $war->message </h3><p></p>";}
		else { echo '<h3 class="correct"> Contract succesfully updated. <p></p> </h3>'; }
		// close connection
		
	}
	//Moved this to bottom (so it updates first, and then selects everyone)
	$result = mysqli_query($con,"SELECT * FROM `contract` WHERE `contract`.`Contract_ID` = ".$_POST["ID_to_update"].";"); // ID_to_update IS FROM THE PREVIOUS PAGE (updateEmployee)
	$row = mysqli_fetch_assoc($result); //We have one row from the SELECT, we get the data with $row["column_name"]
	$cust_id=$row['Customer_ID'];
	$est_id=$row['Estate_ID'];
 ?>
		<label class="description" for="element_1">Starting Date </label>
		<span>
			<input id="element_1_1" name="element_1_1" class="element text" size="2" maxlength="2" value="<?php echo $row['Starts'][8].$row['Starts'][9]; ?>" type="text"> /
			<label for="element_1_1">DD</label>
		</span>
		<span>
			<input id="element_1_2" name="element_1_2" class="element text" size="2" maxlength="2" value="<?php echo $row['Starts'][5].$row['Starts'][6]; ?>" type="text"> /
			<label for="element_1_2">MM</label>
		</span>
		<span>
	 		<input id="element_1_3" name="element_1_3" class="element text" size="4" maxlength="4" value="<?php echo $row['Starts'][0].$row['Starts'][1].$row['Starts'][2].$row['Starts'][3]; ?>" type="text">
			<label for="element_1_3">YYYY</label>
		</span>
	
		<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_1_3",
			baseField    : "element_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectEuropeDate
			});
		</script>
		 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Contract Duration(In Months) </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Duration']; ?>"/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Renting Price </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Rent']; ?>"/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Payment Method </label>
		<span>
			<input id="element_6_1" name="element_6" class="element radio" type="radio" value="Cash" <?php if ($row['Payment Method']=='Cash'){ echo 'checked'; }?>/>
<label class="choice" for="element_6_1">Cash</label>
<input id="element_6_2" name="element_6" class="element radio" type="radio" value="Check" <?php if ($row['Payment Method']=='Check'){ echo 'checked'; }?> />
<label class="choice" for="element_6_2">Check</label>
<input id="element_6_3" name="element_6" class="element radio" type="radio" value="Bank Deposit" <?php if ($row['Payment Method']=='Bank Deposit'){ echo 'checked'; }?> />
<label class="choice" for="element_6_3">Bank Deposit</label>

		</span> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Customer ID </label>
		<div>
			<select class="element select medium" id="element_4" name="element_4"> 
			<option value="" selected="selected"></option>
		<?php
		//$_POST["ID_to_update"]
			//$select = "SELECT `Name` ,`Surname` FROM `customer` WHERE `Customer_ID`=".$row['Customer_ID'].";";
			//$result = mysqli_query($con, $select);
			//$CustName = mysqli_fetch_assoc($result); 
			//echo $CustName['Name'];
			//default option
			//echo '<option name ="element_4" value="default" selected="selected>'.$CustName['Name'].' '.$CustName['Surname'].'</option>';
			
			//Select data from a SELECT statement to show at the dropdown list
			$select = "SELECT `Customer_ID`,`Name` ,`Surname` FROM `customer`";
			$result = mysqli_query($con, $select);
			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
				if ( $cust_id == $row["Customer_ID"]) { echo '<option name ="element_4" value="'.$row["Customer_ID"].'" selected="selected">'.$row['Name'].' '.$row['Surname'].'</option>';}
				else {
					echo '<option name ="element_4" value="'.$row["Customer_ID"].'">'.$row['Name'].' '.$row['Surname'].'</option>';
				}
			    }
			} else {
			    echo "0 results";
			}
		 ?>

		</select>
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Estate ID </label>
		<div>
			<select class="element select medium" id="element_5" name="element_5"> 
			<option value="" selected="selected"></option>
		
		<?php
		//Select data from a SELECT statement to show at the dropdown list
			$select = "SELECT E.Estate_ID, E.Street, E.`Street Num` 
				   FROM   `estate` as E 
				   WHERE E.Estate_ID=".$est_id."";
			$result = mysqli_query($con, $select);
			$row = mysqli_fetch_assoc($result);
			echo '<option name ="element_5" value="'.$row["Estate_ID"].'" selected="selected">'.$row['Street'].' '.$row['Street Num'].'</option>';			
		
			$select = "SELECT E.Estate_ID, E.Street, E.`Street Num` 
				   FROM   `estate` as E 
				   WHERE E.Estate_ID NOT IN ( SELECT `Estate_ID` FROM `contract` )";
			$result = mysqli_query($con, $select);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
				echo '<option name ="element_5" value="'.$row["Estate_ID"].'">'.$row['Street'].' '.$row['Street Num'].'</option>';
			    }
			} else {
			    echo "0 results";
			}
				// close connection*/
			mysqli_close($con);
		 ?>
		</select>
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
