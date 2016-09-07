<?php
	include_once("../../secret.php");

	$PDO = createConnection();

	if (isset($_POST["name"])) { // editing a house
		if (isset($_POST["delete"])) {
			$delete_stmt = $PDO->prepare("DELETE FROM houses WHERE id=:id");
			$delete_stmt->bindValue(":id", $_POST["id"], PDO::PARAM_STR);
			$delete_stmt->execute();
		} else {
			if ($_POST["id"] == "0") { // new house
				$insert_stmt = $PDO->prepare("INSERT INTO houses (`name`, `color`) VALUES (:name, :color)");
				$insert_stmt->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
				$insert_stmt->bindValue(":color", $_POST["color"], PDO::PARAM_STR);
				$insert_stmt->execute();
			} else { // update existing house
				$update_stmt = $PDO->prepare("UPDATE houses SET name=:name, color=:color WHERE id=:id");
				$update_stmt->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
				$update_stmt->bindValue(":color", $_POST["color"], PDO::PARAM_STR);
				$update_stmt->bindValue(":id", $_POST["id"], PDO::PARAM_STR);
				$update_stmt->execute();
			}
		}
	}

	$house_stmt = $PDO->prepare("SELECT * FROM houses ORDER BY name");
	$house_stmt->execute();

	$houses = $house_stmt->fetchAll(PDO::FETCH_ASSOC);

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

		.house {
			padding: 15px;
			margin: 10px;
			border-radius: 5px;

			display: inline-block;
			width: 15em;
			min-height: 5em;

			vertical-align: top;
			position: relative;
		}

		.house .new {
			font-size: 3em;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -0.7em;
			margin-left: -0.3em;
		}

		.house * {
			display: block;
		}
		</style>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script>
		$(document).ready(function() {
			$('.house button').on('click', function() {
				var house = $(this).parent();
				if (!house.hasClass('editing')) {
					house.addClass('editing');
					house.html('<form action="" method="POST"><label for="name">Name</label><input type="text" name="name" value="' + house.data('name') + '"><label for="color">Color</label><input type="text" name="color" value="' + house.data('color') + '"><input type="hidden" name="id" value="' + house.data('id') + '"><input type="submit" name="save" value="Save"><input type="submit" name="delete" value="Delete"></form>');
				} 
			});
		});
		</script>
		<title>DRS Backend | Houses</title>
	</head>
	<body>

<?php
	foreach ($houses as $house) {
		echo "
			<div class='house' style='background-color: {$house['color']};' data-name='{$house['name']}' data-color='{$house['color']}' data-id='{$house['id']}'>
				<span class='name'>{$house['name']}</span>
				<span class='color'>{$house['color']}</span>
				<button class='edit'>Edit</button>
			</div>
		";
	}
?>
	<div class="house" style="background-color: #BBBABA;" data-name="" data-color="" data-id="0">
		<span class="new">+</span>
	</div>
	</body>
</html>