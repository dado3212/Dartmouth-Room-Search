<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	include("../secret.php");
	$PDO = createConnection();

	if (!isset($_GET['building'])) {

		$buildings = $PDO->prepare("SELECT * FROM buildings ORDER BY house");
		$buildings->execute();
	?>
<html>
	<head>
		<style>
			* {
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;    
				-moz-user-select: none;      
				-ms-user-select: none;       
				user-select: none;           
			}

			body {
				color: white;
				font-family: sans-serif;
			}

			.building {
				width: 150px;
				height: 150px;
				display: inline-block;
				border-radius: 10px;
				margin: 5px;
				padding: 5px;
				vertical-align: top;

				position: relative;
			}

			.house {
				position: absolute;
				bottom: 5px;
				width: 100%;
				left: 0px;
				text-align: center;
			}

			.name {
				font-size: 1.2em;
				position: absolute;
				top: 50%;
				left: 50%;

				text-align: center;
				transform: translate(-50%, -50%);
			}

			.building.Allen {
				background-color: #ab1a33;
			}

			.building.Apartments {
				background-color: #016a3f;
			}

			.building.EastWheelock {
				background-color: #ff7802;
			}

			.building.Freshman {
				background-color: #623C20;
			}

			.building.LLC {
				background-color: #EBC621;
			}

			.building.NorthPark {
				background-color: #014f95;
			}

			.building.School {
				background-color: #66aae9;
			}

			.building.South {
				background-color: #42473f;
			}

			.building.West {
				background-color: #834974;
			}
		</style>
	</head>
	<body>
	<?php
		while ($row = $buildings->fetch(PDO::FETCH_ASSOC)) {
			//print_r($row);
			echo "
				<div class='building " . str_replace(' ', '', $row['house']) . "'>
					<span class='name'>" . $row['name'] . "</span>
					<span class='house'>" . $row['house'] . "</span>
				</div>
			";
		}
	} else {
		$building = $_GET['building'];

		echo $building;
	}

?>
	</body>
</html>
