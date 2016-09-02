<?php
	/*error_reporting(E_ALL);
	ini_set("display_errors", 1);

	include("../secret.php");
	$PDO = createConnection();

	if (isset($_POST['building']) && isset($_POST['numRooms'])  && isset($_POST['number']) && isset($_POST['bathrooms']) && isset($_POST['squareFeet']) && isset($_POST['numPeople']) && isset($_POST['floor']) && isset($_POST['gender']) && isset($_POST['subFree'])) {
		$stmt = $PDO->prepare("INSERT INTO rooms(building,floor,number,squareFeet,numRooms,numPeople,bathrooms,gender,subFree) VALUES(:building,:floor,:number,:squareFeet,:numRooms,:numPeople,:bathrooms,:gender,:subFree)");
		$stmt->bindValue(":building",$_POST['building'],PDO::PARAM_STR);
		$stmt->bindValue(":floor",$_POST['floor'],PDO::PARAM_STR);
		$stmt->bindValue(":number",$_POST['number'],PDO::PARAM_STR);
		$stmt->bindValue(":squareFeet",$_POST['squareFeet'],PDO::PARAM_STR);
		$stmt->bindValue(":numRooms",$_POST['numRooms'],PDO::PARAM_STR);
		$stmt->bindValue(":numPeople",$_POST['numPeople'],PDO::PARAM_STR);
		$stmt->bindValue(":bathrooms",$_POST['bathrooms'],PDO::PARAM_STR);
		$stmt->bindValue(":gender",$_POST['gender'],PDO::PARAM_STR);
		$stmt->bindValue(":subFree",$_POST['subFree'],PDO::PARAM_STR);
		$stmt->execute();
		echo '<span style="color: green;">Success!  Room added.</span>';
	} else {
		echo '<span style="color: red;">Error!  Not all of the fields were filled out.</span>';
	}*/
?>
<!--
<br><br>
<form name='addBuilding' method='post' action=''>
	Building Name: <input type='text' name='building' placeholder='Building Name' value="<?php if (isset($_POST['building'])) { echo $_POST['building']; } ?>"><br>
	Floor Type:
	<select name='floor'>
		<option value='0' <?php if(isset($_POST['floor']) && $_POST['floor'] == '0') { echo 'selected'; }?> >Ground</option>
		<option value='1' <?php if(isset($_POST['floor']) && $_POST['floor'] == '1') { echo 'selected'; }?> >1st Floor</option>
		<option value='2' <?php if(isset($_POST['floor']) && $_POST['floor'] == '2') { echo 'selected'; }?> >2nd Floor</option>
		<option value='3' <?php if(isset($_POST['floor']) && $_POST['floor'] == '3') { echo 'selected'; }?> >3rd Floor</option>
		<option value='4' <?php if(isset($_POST['floor']) && $_POST['floor'] == '4') { echo 'selected'; }?> >4th Floor</option>
	</select><br>
	Room Number: <input type='text' name='number' placeholder='Room Number' value="<?php if (isset($_POST['number'])) { echo intval($_POST['number'])+1; } ?>"><br><br>

	Square Feet: <input type='number' name='squareFeet' placeholder='Number of Square Feet'><br>
	Number of Rooms: <input type='number' name='numRooms' min='1' placeholder='Number of Rooms'><br>
	Number of People: <input type='number' name='numPeople' placeholder='Number of People'><br>
	Bathrooms: <input type='text' name='bathrooms' placeholder='Bathroom Info' value="<?php if (isset($_POST['bathrooms'])) { echo $_POST['bathrooms']; } ?>"><br>

	Gender: <input type='radio' name='gender' value='0' <?php if(isset($_POST['gender']) && $_POST['gender'] == '0') { echo 'checked'; } else if (!isset($_POST['gender'])) { echo 'checked'; } ?> >Whatever
	<input type='radio' name='gender' value='1' <?php if(isset($_POST['gender']) && $_POST['gender'] == '1') { echo 'checked'; }?> >Gender Neutral
	<input type='radio' name='gender' value='2' <?php if(isset($_POST['gender']) && $_POST['gender'] == '2') { echo 'checked'; }?> >Male
	<input type='radio' name='gender' value='3' <?php if(isset($_POST['gender']) && $_POST['gender'] == '3') { echo 'checked'; }?> >Female<br>
	Sub-Free: <input type='radio' name='subFree' value='0' <?php if(isset($_POST['subFree']) && $_POST['subFree'] == '0') { echo 'checked'; } else if (!isset($_POST['subFree'])) { echo 'checked'; } ?> >Whatever
	<input type='radio' name='subFree' value='1' <?php if(isset($_POST['subFree']) && $_POST['subFree'] == '1') { echo 'checked'; }?> >Sub-Free<br>
	<input type='submit' value='Add Room'>
</form>
-->
This is disabled for right now.