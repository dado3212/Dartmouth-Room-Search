<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	include_once("../../secret.php");

	$PDO = createConnection();

	if (isset($_POST["name"])) { // editing a building
		if (isset($_POST["delete"])) {
			$delete_stmt = $PDO->prepare("DELETE FROM buildings WHERE id=:id");
			$delete_stmt->bindValue(":id", $_POST["id"], PDO::PARAM_STR);
			$delete_stmt->execute();
		} else {
			if ($_POST["id"] == "0") { // new building
				$insert_stmt = $PDO->prepare("INSERT INTO buildings (`name`, `house`, `plan`, `location`) VALUES (:name, :house, :plan, :location)");
				$insert_stmt->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":house", $_POST["house"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":plan", $_POST["plan"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":location", $_POST["location"], PDO::PARAM_STR);
				$insert_stmt->execute();
			} else { // update existing building
				$update_stmt = $PDO->prepare("UPDATE buildings SET name=:name, house=:house, plan=:plan, location=:location WHERE id=:id");
				$update_stmt->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
				$update_stmt->bindValue(":house", $_POST["house"], PDO::PARAM_STR);
				$update_stmt->bindValue(":plan", $_POST["plan"], PDO::PARAM_STR);
				$update_stmt->bindValue(":location", $_POST["location"], PDO::PARAM_STR);
				$update_stmt->bindValue(":id", $_POST["id"], PDO::PARAM_STR);
				$update_stmt->execute();
			}
		}
	}

	$buildings_stmt = $PDO->prepare("
		SELECT buildings.id,
		buildings.name AS building_name,
		buildings.plan,
		buildings.location,
		houses.name AS house_name,
		houses.id AS house_id,
		houses.color 
		FROM buildings LEFT JOIN houses 
		ON buildings.house = houses.id 
		ORDER BY houses.name, buildings.name
	");
	$buildings_stmt->execute();

	$buildings = $buildings_stmt->fetchAll(PDO::FETCH_ASSOC);

	$houses_stmt = $PDO->prepare("SELECT name,id FROM houses ORDER BY name");
	$houses_stmt->execute();
	$houses = $houses_stmt->fetchAll(PDO::FETCH_ASSOC);
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

		.building {
			padding: 15px;
			margin: 10px;
			border-radius: 5px;

			display: inline-block;
			min-width: 30em;
			min-height: 6em;

			vertical-align: top;
			position: relative;
		}

		.building .house {
			text-align: center;
			font-size: 1.2em;
		}

		.building a {
			color: white;
		}

		.building .new {
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

		.building input {
			min-width: 100%;
		}

		.building * {
			display: block;
		}

		.hidden {
			display: none;
		}
		</style>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script>
		$(document).ready(function() {
			$('.building .display button').on('click', function() {
				var main = $(this).parent().parent();
				main.find('.display').addClass('hidden');
				main.find('.form').removeClass('hidden');
			});
		});
		</script>
		<title>DRS Backend | Buildings</title>
	</head>
	<body>

<?php
	foreach ($buildings as $building) {
		echo "
			<div class='building' style='background-color: {$building['color']};'>
				<div class='display'>
					<span class='house'>{$building['house_name']}</span>
					<span class='name'>{$building['building_name']}</span>
					<span class='plan'>{$building['plan']}</span>
					<a class='location' target='_blank' rel='noopener' href='{$building['location']}'>Building Location</a>
					<button class='edit'>Edit</button>
					<a href='../rooms?building={$building['id']}'>Edit Rooms for Building</a>
				</div>
				<div class='form hidden'>
					<form action='' method='POST'>
						<label for='house'>House</label>
						<select name='house'>";
					foreach ($houses as $house) {
						if ($building['house_id'] == $house['id']) {
							echo "<option value='{$house['id']}' selected>{$house['name']}</option>";
						} else {
							echo "<option value='{$house['id']}'>{$house['name']}</option>";
						}
					}
		echo "
						</select>
						<label for='name'>Name</label>
						<input type='text' name='name' value='{$building['building_name']}'>
						<label for='plan'>Plan</label>
						<input type='text' name='plan' value='{$building['plan']}'>
						<label for='location'>Location</label>
						<input type='text' name='location' value='{$building['location']}'>
						<input type='hidden' name='id' value='{$building['id']}'>
						<input type='submit' name='save' value='Save'>
						<input type='submit' name='delete' value='Delete'>
					</form>
				</div>
			</div>
		";
	}
?>
	<div class="building" style="background-color: #BBBABA;">
		<div class="display">
			<button class="new">+</span>
		</div>
		<div class="form hidden">
			<form action="" method="POST">
				<label for="house">House</label>
				<select name="house">
				<?php
					foreach ($houses as $house) {
						echo "<option value='{$house['id']}'>{$house['name']}</option>";
					}
				?>
				</select>
				<label for="name">Name</label>
				<input type="text" name="name" value="">
				<label for="plan">Plan</label>
				<input type="text" name="plan" value="">
				<label for="location">Location</label>
				<input type="text" name="location" value="http://maps.google.com/?q=">
				<input type="hidden" name="id" value="0">
				<input type="submit" name="save" value="Save">
				<input type="submit" name="delete" value="Delete">
			</form>
		</div>
	</div>
	</body>
</html>