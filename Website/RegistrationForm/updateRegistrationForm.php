<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update Registration</title>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Update Registration</a></h1>
		<form id="form_982714" class="appnitro"  method="post" action="updateRegistrationForm.php">
					<div class="form_description">
					<a href=../template.html> <img src="../home.png" alt="Home" id="home_img"> </a>  
			<h2>Update Registration</h2>
			<p>Update when was a Customer registered in the company for the first time and by which Employee</p>
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
		$day = $_POST['element_1_1'];
		$month = $_POST['element_1_2'];
		$year = $_POST['element_1_3'];
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$_POST["element_2"]=!empty($_POST["element_2"])? "'".$_POST["element_2"]."'": "NULL";
		$_POST["element_3"]=!empty($_POST["element_3"])? "'".$_POST["element_3"]."'": "NULL";
		//FOR FIELDS THAT NEEDED NOT TO BE NULL
		$result1 = mysqli_query($con,"UPDATE `ideal home`.`registration` SET `Employee_ID`=".$_POST["element_2"].",
		 `Customer_ID`=".$_POST["element_3"].", 
		 `Registration Date` = '$year.$month.$day' 
		WHERE `Employee_ID`=".$_POST["EID_to_update"]." AND `Customer_ID`=".$_POST['CID_to_update'].";");
		
		//FOR FIELDS THAT NEEDED NOT TO BE NULL '".$_POST["element_1_1"]."'  ----> ".$_POST["element_1_1"]."
		$war =mysqli_get_Warnings($con) ;	
		if ( !empty(mysqli_error($con)) ) { echo '<h3 class="wrong">'.mysqli_error($con).' Go back home</h3><p></p>'; }
		else if ( !empty($war) ) {echo '<h3 class="wrong"> $war->message </h3><p></p>';}
		else { echo '<h3 class="correct"> Customer Registration successfully updated. Go back home<p></p> </h3>'; }
	}
	$result = mysqli_query($con,"SELECT * FROM `registration` WHERE `registration`.`Employee_ID` = ".$_POST["EID_to_update"]." AND `registration`.`Customer_ID`=".$_POST["CID_to_update"].";"); // ID_to_update IS FROM THE PREVIOUS PAGE (updateEmployee)
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
			$select = "SELECT c.Customer_ID, c.Name, c.Surname 
				   FROM   `customer` as c 
				   WHERE c.Customer_ID=".$c_id;
			
			$result = mysqli_query($con, $select);
			$row=mysqli_fetch_assoc($result);
			echo '<option name ="element_3" value="'.$row["Customer_ID"].'" selected="selected">'.$row['Name'].' '.$row['Surname'].'</option>';
			//Select data from a SELECT statement to show at the dropdown list		
			$select = "SELECT c.Customer_ID, c.Name, c.Surname 
				   FROM   `customer` as c 
				   WHERE c.Customer_ID NOT IN ( SELECT `Customer_ID` FROM `registration` )";
			$result = mysqli_query($con, $select);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
					echo '<option name ="element_3" value="'.$row["Customer_ID"].'">'.$row['Name'].' '.$row['Surname'].'</option>';

			   }
			} else {
			    echo "0 results";
			}
		 ?>
			
			
		</select>
		</div> 
		</li>		<li id="li_1" >
		
		
		<label class="description" for="element_1">Registration Date </label>
		<span>
			<input id="element_1_1" name="element_1_1" class="element text" size="2" maxlength="2" value="<?php echo $row1['Registration Date'][8].$row1['Registration Date'][9]; ?>" type="text"> /
			<label for="element_1_1">DD</label>
		</span>
		<span>
			<input id="element_1_2" name="element_1_2" class="element text" size="2" maxlength="2" value="<?php echo $row1['Registration Date'][5].$row1['Registration Date'][6]; ?>" type="text"> /
			<label for="element_1_2">MM</label>
		</span>
		<span>
	 		<input id="element_1_3" name="element_1_3" class="element text" size="4" maxlength="4" value="<?php echo $row1['Registration Date'][0].$row1['Registration Date'][1].$row1['Registration Date'][2].$row1['Registration Date'][3]; ?>" type="text">
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
		<p class="guidelines" id="guide_1"><small>Registration Date Of Customer In Ideal Home</small></p> 
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
