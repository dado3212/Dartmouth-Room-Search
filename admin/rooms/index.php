<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	include_once("../../secret.php");

	// Constants
	$floorOptions = [
		0 => "Ground Floor",
		1 => "1st Floor",
		2 => "2nd Floor",
		3 => "3rd Floor",
		4 => "4th Floor",
	];
	$roomOptions = [
		1 => "One",
		2 => "Two",
		3 => "Three",
		4 => "Four",
		5 => "Five",
		6 => "Six",
		7 => "Seven",
	];
	$typeOptions = [
		1 => "single",
		2 => "double",
		3 => "triple",
		4 => "quad",
		5 => "five person suite",
		6 => "six person suite",
		7 => "seven person suite",
		8 => "eight person suite",
	];
	$genderOptions = [
		0 => "either gender",
		1 => "both genders",
		2 => "guys",
		3 => "girls",
	];
	$bathroomOptions = [
		"none" => "no bathrooms",
		"one" => "one full bathroom",
		"two" => "two full bathrooms",
		"half" => "one half bathroom",
		"two half" => "two half bathrooms",
		"one, half" => "one full bathroom and one half bathroom",
		"one shared" => "one shared bathroom",
	];
	$substanceFreeOptions = [
		0 => "not substance free",
		1 => "substance free",
	];

	$PDO = createConnection();

	if (!isset($_GET["building"]) || !is_numeric($_GET["building"])) { // redirect if no specific building to modify rooms
		header("Location: https://dartmouthroomsearch.com/admin");
	}

	$building = $_GET["building"];

	if (isset($_POST["id"])) { // editing a room
		if (isset($_POST["delete"])) {
			$delete_stmt = $PDO->prepare("DELETE FROM rooms WHERE id=:id");
			$delete_stmt->bindValue(":id", $_POST["id"], PDO::PARAM_STR);
			$delete_stmt->execute();
		} else {
			if ($_POST["id"] == "0") { // new room
				$insert_stmt = $PDO->prepare("INSERT INTO rooms (`building`, `floor`, `number`, `squareFeet`, `numRooms`, `numPeople`, `bathrooms`, `gender`, `subFree`) VALUES (:building, :floor, :number, :squareFeet, :numRooms, :numPeople, :bathrooms, :gender, :subFree)");
				$insert_stmt->bindValue(":building", $_POST["building"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":floor", $_POST["floor"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":number", $_POST["number"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":squareFeet", $_POST["squareFeet"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":numRooms", $_POST["numRooms"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":numPeople", $_POST["numPeople"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":bathrooms", $_POST["bathrooms"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":gender", $_POST["gender"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":subFree", $_POST["subFree"], PDO::PARAM_STR);
				$insert_stmt->execute();
			} else { // update existing room
				$update_stmt = $PDO->prepare("UPDATE rooms SET number=:number, floor=:floor, numRooms=:numRooms, numPeople=:numPeople, squareFeet=:squareFeet, subFree=:subFree, gender=:gender, bathrooms=:bathrooms WHERE id=:id");
				$update_stmt->bindValue(":number", $_POST["number"], PDO::PARAM_STR);
				$update_stmt->bindValue(":floor", $_POST["floor"], PDO::PARAM_STR);
				$update_stmt->bindValue(":numRooms", $_POST["numRooms"], PDO::PARAM_STR);
				$update_stmt->bindValue(":numPeople", $_POST["numPeople"], PDO::PARAM_STR);
				$update_stmt->bindValue(":squareFeet", $_POST["squareFeet"], PDO::PARAM_STR);
				$update_stmt->bindValue(":subFree", $_POST["subFree"], PDO::PARAM_STR);
				$update_stmt->bindValue(":gender", $_POST["gender"], PDO::PARAM_STR);
				$update_stmt->bindValue(":bathrooms", $_POST["bathrooms"], PDO::PARAM_STR);
				$update_stmt->bindValue(":id", $_POST["id"], PDO::PARAM_STR);
				$update_stmt->execute();
			}
		}
	}

	$rooms_stmt = $PDO->prepare("
		SELECT
		rooms.*,
		buildings.name,
		houses.color
		FROM rooms LEFT JOIN buildings 
		ON rooms.building = buildings.id
		LEFT JOIN houses
		ON buildings.house = houses.id
		WHERE rooms.building = :building
	");
	$rooms_stmt->bindValue(":building", $building, PDO::PARAM_STR);
	$rooms_stmt->execute();

	$rooms = $rooms_stmt->fetchAll(PDO::FETCH_ASSOC);

	// $houses_stmt = $PDO->prepare("SELECT name,id FROM houses ORDER BY name");
	// $houses_stmt->execute();
	// $houses = $houses_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
		html, body {
			min-height: 100%;

			font-family: sans-serif;
			color: white;
		}

		.room {
			padding: 15px;
			margin: 10px;
			border-radius: 5px;

			display: inline-block;
			min-width: 30em;
			min-height: 6em;

			vertical-align: top;
			position: relative;
		}

		.room a {
			color: white;
		}

		.room .new {
			-webkit-appearance: none;
			border: none;
			color: white;
			background-color: transparent;
			font-size: 3em;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -0.7em;
			margin-left: -0.3em;
		}

		.room input {
			min-width: 100%;
		}

		.room * {
			display: block;
		}

		.hidden {
			display: none;
		}
		</style>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script>
		$(document).ready(function() {
			$('.room .display button').on('click', function() {
				var main = $(this).parent().parent();
				main.find('.display').addClass('hidden');
				main.find('.form').removeClass('hidden');
			});
		});
		</script>
		<title>DRS Backend | Rooms</title>
	</head>
	<body>

<?php
	foreach ($rooms as $room) {
		echo "
			<div class='room' style='background-color: {$room['color']};'>
				<div class='display'>
					<span class='info'>{$room['number']} - {$room['name']} ({$floorOptions[$room['floor']]})</span>
					<span class='details'>{$roomOptions[$room['numRooms']]} room, {$typeOptions[$room['numPeople']]} - {$room['squareFeet']} ft&sup2;</span>
					<span class='details2'>It is {$substanceFreeOptions[$room['subFree']]}, and is for {$genderOptions[$room['gender']]}.</span>
					<span class='details3'>It has {$bathroomOptions[$room['bathrooms']]}.</span>
					<button class='edit'>Edit</button>
				</div>
				<div class='form hidden'>
					<form action='' method='POST'>
						<label for='number'>Room Number</label>
						<input type='text' name='number' value='{$room['number']}'>
						<label for='floor'>Floor</label>
						<select name='floor'>";
					foreach ($floorOptions as $value => $string) {
						$status = ($room['floor'] == $value ? 'selected' : '');
						echo "<option value='{$value}' $status>{$string}</option>";
					}
		echo			"</select>
						<label for='numRooms'>Number of Rooms</label>
						<input type='number' min='1' name='numRooms' value='{$room['numRooms']}'>
						<label for='numPeople'>Number of People</label>
						<input type='number' min='1' name='numPeople' value='{$room['numPeople']}'>
						<label for='squareFeet'>Square Feet</label>
						<input type='number' min='1' name='squareFeet' value='{$room['squareFeet']}'>
						<label for='subFree'>Substance Free</label>
						<select name='subFree'>";
					foreach ($substanceFreeOptions as $value => $string) {
						$status = ($room['subFree'] == $value ? 'selected' : '');
						echo "<option value='{$value}' $status>{$string}</option>";
					}
		echo			"</select>
						<label for='gender'>Gender</label>
						<select name='gender'>";
					foreach ($genderOptions as $value => $string) {
						$status = ($room['gender'] == $value ? 'selected' : '');
						echo "<option value='{$value}' $status>{$string}</option>";
					}
		echo			"</select>
						<label for='bathrooms'>Bathrooms</label>
						<select name='bathrooms'>";
					foreach ($bathroomOptions as $value => $string) {
						$status = ($room['bathrooms'] == $value ? 'selected' : '');
						echo "<option value='{$value}' $status>{$string}</option>";
					}
		echo			"</select>
						<input type='hidden' name='id' value='{$room['id']}'>
						<input type='submit' name='save' value='Save'>
						<input type='submit' name='delete' value='Delete'>
					</form>
				</div>
			</div>
		";
	}
?>
	<div class="room" style="background-color: #BBBABA;">
		<div class="display">
			<button class="new">+</span>
		</div>
		<div class="form hidden">
			<form action="" method="POST">
				<label for="number">Room Number</label>
				<input type="text" name="number" value="">
				<label for="floor">Floor</label>
				<select name="floor">
			<?php foreach ($floorOptions as $value => $string) {
				echo "<option value='{$value}'>{$string}</option>";
			} ?>
				</select>
				<label for="numRooms">Number of Rooms</label>
				<input type="number" min="1" name="numRooms" value="1">
				<label for="numPeople">Number of People</label>
				<input type="number" min="1" name="numPeople" value="1">
				<label for="squareFeet">Square Feet</label>
				<input type="number" min="1" name="squareFeet" value="1">
				<label for="subFree">Substance Free</label>
				<select name="subFree">
			<?php foreach ($substanceFreeOptions as $value => $string) {
				echo "<option value='{$value}'>{$string}</option>";
			} ?>
				</select>
				<label for="gender">Gender</label>
				<select name="gender">
			<?php foreach ($genderOptions as $value => $string) {
				echo "<option value='{$value}'>{$string}</option>";
			} ?>
				</select>
				<label for="bathrooms">Bathrooms</label>
				<select name="bathrooms">
			<?php foreach ($bathroomOptions as $value => $string) {
				$status = ($room['bathrooms'] == $value ? 'selected' : '');
				echo "<option value='{$value}' $status>{$string}</option>";
			} ?>
				</select>
				<input type="hidden" name="id" value="0">
				<input type="hidden" name="building" value="<?php echo $building; ?>">
				<input type="submit" name="save" value="Save">
				<input type="submit" name="delete" value="Delete">
			</form>
		</div>
	</div>
	</body>
</html>