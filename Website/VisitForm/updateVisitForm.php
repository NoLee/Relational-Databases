<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update A visit</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Update A visit</a></h1>
		<form id="form_981469" class="appnitro"  method="post" action="updateVisitForm.php">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>Update A visit</h2>
			<p>Update the details of the visit</p>
		</div>						
			<ul >
			
					<li id="li_1" >
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
		$day = $_POST['element_3_1'];
		$month = $_POST['element_3_2'];
		$year = $_POST['element_3_3'];
		
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$_POST["element_1"]=!empty($_POST["element_1"])? "'".$_POST["element_1"]."'": "NULL";
		$_POST["element_2"]=!empty($_POST["element_2"])? "'".$_POST["element_2"]."'": "NULL";
		$_POST["element_3"]=!empty($_POST["element_3"])? "'".$_POST["element_3"]."'": "NULL";
		$_POST["element_4"]=!empty($_POST["element_4"])? "'".$_POST["element_4"]."'": "NULL";
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$result1 = mysqli_query($con,"UPDATE`ideal home`.`visit` SET `Customer_ID`=".$_POST["element_1"].",
		 `Estate_ID`=".$_POST["element_2"].", 
		 `Visit Date`= '$year.$month.$day', 
		 `Comments`=".$_POST["element_4"]."
		 WHERE `visit`.`Customer_ID`=".$_POST["CID_to_update"]." AND `visit`.`Estate_ID`=".$_POST["EID_to_update"].";");
		//FOR FIELDS THAT NEEDED NOT TO BE NULL '".$_POST["element_1_1"]."'  ----> ".$_POST["element_1_1"]."
		$war =mysqli_get_Warnings($con) ;	
		if ( !empty(mysqli_error($con)) ) { echo '<h3 class="wrong">'.mysqli_error($con).' Go back home</h3><p></p>'; }
		else if ( !empty($war) ) {echo '<h3 class="wrong"> $war->message </h3><p></p>';}
		else { echo '<h3 class="correct"> Visit successfully updated. Go back home <p></p> </h3>'; }
		
	}
	$result = mysqli_query($con,"SELECT * FROM `visit` WHERE `visit`.`Estate_ID` = ".$_POST["EID_to_update"]." AND `visit`.`Customer_ID`=".$_POST["CID_to_update"].";"); // ID_to_update IS FROM THE PREVIOUS PAGE (updateEmployee)
	$row1 = mysqli_fetch_assoc($result); //We have one row from the SELECT, we get the data with $row["column_name"]
	
?>
		<label class="description" for="element_1">Customer ID </label>
		<div>
		<select class="element select medium" id="element_1" name="element_1"> 
			<option value="" selected="selected"></option>
		<?php
		//Select data from a SELECT statement to show at the dropdown list
			$select = "SELECT `Customer_ID`,`Name` ,`Surname` FROM `customer`";
			$result = mysqli_query($con, $select);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
				    if ($_POST["CID_to_update"] ==$row["Customer_ID"] ){echo '<option name ="element_1" value="'.$row["Customer_ID"].'" selected="selected">'.$row['Name'].' '.$row['Surname'].'</option>';}
				    else{
					echo '<option name ="element_1" value="'.$row["Customer_ID"].'">'.$row['Name'].' '.$row['Surname'].'</option>';
				    }
			    }
			} else {
			    echo "0 results";
			}
		 ?>

		</select>
		</div><p class="guidelines" id="guide_1"><small>Define Which Customer Visited Which Estate</small></p> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Estate ID </label>
		<div>
		<select class="element select medium" id="element_2" name="element_2"> 
			<option value="" selected="selected"></option>
		
		<?php
		//Select data from a SELECT statement to show at the dropdown list
			$select = "SELECT `Estate_ID`,`Street` ,`Street Num` FROM `estate`";
			$result = mysqli_query($con, $select);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
				    if ($_POST["EID_to_update"] ==$row["Estate_ID"] ){echo '<option name ="element_2" value="'.$row["Estate_ID"].'" selected="selected">'.$row['Street'].' '.$row['Street Num'].'</option>';}
				    else{
					echo '<option name ="element_2" value="'.$row["Estate_ID"].'">'.$row['Street'].' '.$row['Street Num'].'</option>';
				    }
			    }
			} else {
			    echo "0 results";
			}
				// close connection*/
			mysqli_close($con);
		 ?>
		
	

		</select>
		</div><p class="guidelines" id="guide_2"><small>Define Which Customer Visited Which Estate</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Date </label>
		<span>
			<input id="element_3_1" name="element_3_1" class="element text" size="2" maxlength="2" value="<?php echo $row1['Visit Date'][8].$row1['Visit Date'][9]; ?>" type="text"> /
			<label for="element_3_1">DD</label>
		</span>
		<span>
			<input id="element_3_2" name="element_3_2" class="element text" size="2" maxlength="2" value="<?php echo $row1['Visit Date'][5].$row1['Visit Date'][6]; ?>" type="text"> /
			<label for="element_3_2">MM</label>
		</span>
		<span>
	 		<input id="element_3_3" name="element_3_3" class="element text" size="4" maxlength="4" value="<?php echo $row1['Visit Date'][0].$row1['Visit Date'][1].$row1['Visit Date'][2].$row1['Visit Date'][3]; ?>" type="text">
			<label for="element_3_3">YYYY</label>
		</span>
	
		<span id="calendar_3">
			<img id="cal_img_3" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_3_3",
			baseField    : "element_3",
			displayArea  : "calendar_3",
			button		 : "cal_img_3",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectEuropeDate
			});
		</script>
		
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Comments </label>
		<div>
			<textarea id="element_4" name="element_4" class="element textarea medium"><?php echo $row1['Comments']; ?></textarea> 
		</div><p class="guidelines" id="guide_4"><small>Comments Of Customer</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="981469" />
			    
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
