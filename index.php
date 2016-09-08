<!DOCTYPE html>
<html>
	<head>
		<!-- SEO Markup -->
		<title>Dartmouth Room Search</title>
		<meta name="robots" content="index, follow, archive">
		<meta name="description" content="Easily search through upperclass rooming options,
		filtering by location, number of roommates, size, and more.  The easiest way to 
		find the perfect room.">
		<meta charset="utf-8" />
		<meta http-equiv="Cache-control" content="public">
		<!-- old -->
		<meta name="google-site-verification" content="9U8kYC24rUGX98pnl1EDy0A4tY4EE8DxFAvpPwNNAEs" />
		<!-- new -->
		<meta name="google-site-verification" content="SmeVIjL9gg0LUuOrJ-ozBhozzBg0ZpmSZ_u86do4Y7U" />

		<!-- Semantic Markup -->
		<meta property="og:title" content="Dartmouth Room Search">
		<meta property="og:type" content="website">
		<meta property="og:image" content="http://dartmouthroomsearch.com/imgs/cover.jpg">
		<meta property="og:url" content="http://dartmouthroomsearch.com">
		<meta property="og:description" content="Easily search through upperclass rooming options,
		filtering by location, number of roommates, size, and more.  The easiest way to 
		find the perfect room.">

		<meta name="twitter:card" content="summary">
		<meta name="twitter:creator" content="@alex_beals">

		<link rel="stylesheet" type="text/css" href="/css/display.css">

		<!-- Hello a metric ton of favicon code! -->
		<link rel="apple-touch-icon" sizes="57x57" href="/imgs/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/imgs/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/imgs/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/imgs/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/imgs/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/imgs/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/imgs/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/imgs/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/imgs/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192" href="/imgs/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/imgs/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/imgs/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/imgs/favicon/favicon-16x16.png">
		<link rel="manifest" href="/imgs/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#006841">
		<meta name="msapplication-TileImage" content="/imgs/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#006841">

		<!--
			Created as a fun side project by Alex Beals '18!
			If you have any problems, please feel free to email me at Alex.Beals.18@dartmouth.edu
		-->

		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-61493621-1', 'auto');
		  ga('send', 'pageview');

		</script>

		<!-- Respects 'Request Desktop Site' -->
		<?php
			if (preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|Mobile)/i", $_SERVER["HTTP_USER_AGENT"])) {
				?><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"><?php
			}
		?>

	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<img itemprop="image" src="/imgs/logo.png" alt="Dartmouth Room Search Logo white" title="DRC Logo"/>
				<a href="//dartmouthroomsearch.com">Dartmouth Room Search</a>
			</div>
			<?php
				$minPeople = $_POST["minPeople"];
				$maxPeople = $_POST["maxPeople"];
				$minRooms = $_POST["minRooms"];
				$maxRooms = $_POST["maxRooms"];
				$gender = $_POST["gender"];
				$subFree = $_POST["subFree"];
				$building = $_POST["building"];

				$page = (isset($_GET["page"]) && is_numeric($_GET["page"])) ? intval($_GET["page"]) : 0;

				$minPeopleSearch = (isset($minPeople) ? $minPeople : "1");
				$maxPeopleSearch = (isset($maxPeople) ? $maxPeople : "4");
				$minRoomsSearch = (isset($minRooms) ? $minRooms : "1");
				$maxRoomsSearch = (isset($maxRooms) ? $maxRooms : "3");
			?>
			<form name="search" id="search" method="post" action="">
				I'm looking for a room for between
				<input type="number" name="minPeople" min="1" value="<?php echo $minPeopleSearch; ?>">
				and
				<input type="number" name="maxPeople" value="<?php echo $maxPeopleSearch; ?>">
				people with 
				<input type="number" name="minRooms" min="1" value="<?php echo $minRoomsSearch; ?>">
				to
				<input type="number" name="maxRooms" value="<?php echo $maxRoomsSearch; ?>">
				rooms.&nbsp;&nbsp;The roommates will be  
				<select name="gender">
					<option value="a" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "a") {echo "selected";} ?>>
						guys
					</option>
					<option value="b" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "b") {echo "selected";} ?>>
						girls
					</option>
					<option value="c" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "c") {echo "selected";} ?>>
						both
					</option>
				</select>
				, and it 
				<select name="subFree">
					<option <?php if (isset($_POST["subFree"]) && $_POST["subFree"] == "0") { echo "selected";} ?> value="0">
						should not be
					</option>
					<option <?php if (isset($_POST["subFree"]) && $_POST["subFree"] == "1") { echo "selected";} ?> value="1">
						should be
					</option>
				</select>
				substance free.&nbsp;&nbsp;
				I want the room to be 
				<select name="building">
					<?php
						error_reporting(E_ALL);
						ini_set("display_errors", 1);

						include("secret.php");

						$PDO = createConnection();

						$buildings = $PDO->prepare("SELECT id,name FROM buildings ORDER BY name");
						$buildings->execute();
						$buildingOptions = $buildings->fetchAll(PDO::FETCH_ASSOC);
						array_unshift($buildingOptions, ["id" => 0, "name" => ""]);

						foreach ($buildingOptions as $buildingOption) {
							$status = ((isset($building) && $building == $buildingOption["id"]) ? "selected" : "");
							if ($buildingOption["name"] == "") {
								echo "<option $status value='{$buildingOption['id']}'>anywhere</option>";
							} else {
								echo "<option $status value='{$buildingOption['id']}'>in {$buildingOption['name']}</option>";
							}
						}
					?>
				</select>
				, and I want the results to be ordered by
				<select name="order">
					<option value="0" <?php if (isset($_POST["order"]) && $_POST["order"] == "0") {echo "selected";} ?>>
						square feet
					</option>
					<option value="1" <?php if (isset($_POST["order"]) && $_POST["order"] == "1") {echo "selected";} ?>>
						square feet per person
					</option>
					<option value="2" <?php if (isset($_POST["order"]) && $_POST["order"] == "2") {echo "selected";} ?>>
						number of people
					</option>
					<option value="3" <?php if (isset($_POST["order"]) && $_POST["order"] == "3") {echo "selected";} ?>>
						number of rooms
					</option>
				</select>
				.
				<input type="submit" class="search" value="Search!">
			</form>

			<div class="rooms" itemscope itemtype="https://schema.org/CreativeWork">
				<meta itemprop="author" content="Alex Beals">
				<meta itemprop="audience" content="students">
				<meta itemprop="isFamilyFriendly" content="true">
				<meta itemprop="keywords" content="dartmouth, room, search, find, rooms, buildings,
				locate, school, college, ivy, housing, priority">
			<?php
				if (isset($_GET["id"])) {
					$stmt = $PDO->prepare("
						SELECT
						rooms.*,
						buildings.name,
						buildings.location,
						buildings.plan,
						houses.name AS house_name
						FROM rooms
						LEFT JOIN buildings
						ON rooms.building = buildings.id
						LEFT JOIN houses
						ON buildings.house = houses.id
						WHERE rooms.id=:id
						LIMIT 1
					");
					$stmt->bindValue(":id", $_GET["id"], PDO::PARAM_STR);
				} else if (isset($minPeople)) {
					$genderAttach = "";
					if ($_POST["gender"] == "a") {
						$genderAttach = " AND (gender = 0 OR gender = 1 OR gender = 2)";
					} else if ($_POST["gender"] == "b") {
						$genderAttach = " AND (gender = 0 OR gender = 1 OR gender = 3)";
					} else if ($_POST["gender"] == "c") {
						$genderAttach = " AND (gender = 1)";
					}

					$order = "";
					if ($_POST["order"] == 0) {
						$order = " ORDER BY squareFeet desc";
					} else if ($_POST["order"] == 1) {
						$order = " ORDER BY squareFeet / numPeople desc";
					} else if ($_POST["order"] == 2) {
						$order = " ORDER BY numPeople desc";
					} else if ($_POST["order"] == 3) {
						$order = " ORDER BY numRooms desc";
					}

					if (isset($building) && $building == 0) {
						$stmt = $PDO->prepare("
							SELECT
							rooms.*,
							buildings.name,
							buildings.location,
							buildings.plan,
							houses.name AS house_name
							FROM rooms
							LEFT JOIN buildings
							ON rooms.building = buildings.id
							LEFT JOIN houses
							ON buildings.house = houses.id
							WHERE
							numPeople >= :minPeople AND
							numPeople <= :maxPeople AND
							numRooms >= :minRooms AND
							numRooms <= :maxRooms AND
							subFree = :subFree" . $genderAttach . $order . " LIMIT 20 OFFSET :offset
						");
					} else {
						$stmt = $PDO->prepare("
							SELECT
							rooms.*,
							buildings.name,
							buildings.location,
							buildings.plan,
							houses.name AS house_name
							FROM rooms
							LEFT JOIN buildings
							ON rooms.building = buildings.id
							LEFT JOIN houses
							ON buildings.house = houses.id
							WHERE
							numPeople >= :minPeople AND
							numPeople <= :maxPeople AND
							numRooms >= :minRooms AND
							numRooms <= :maxRooms AND
							building = :building AND
							subFree = :subFree" . 
							$genderAttach . $order . " LIMIT 20 OFFSET :offset
						");
						$stmt->bindValue(":building", $building, PDO::PARAM_STR);
					}
					$stmt->bindValue(":minPeople", $minPeople, PDO::PARAM_STR);
					$stmt->bindValue(":maxPeople", $maxPeople, PDO::PARAM_STR);
					$stmt->bindValue(":minRooms", $minRooms, PDO::PARAM_STR);
					$stmt->bindValue(":maxRooms", $maxRooms, PDO::PARAM_STR);
					$stmt->bindValue(":subFree", $subFree, PDO::PARAM_STR);
					$stmt->bindValue(":offset", $page * 20, PDO::PARAM_STR);
				} else {
					$stmt = $PDO->prepare("
						SELECT
						rooms.*,
						buildings.name,
						buildings.location,
						buildings.plan,
						houses.name AS house_name
						FROM rooms
						LEFT JOIN buildings
						ON rooms.building = buildings.id
						LEFT JOIN houses
						ON buildings.house = houses.id
						LIMIT 20 OFFSET :offset
					");
					$stmt->bindValue(":offset", $page * 20, PDO::PARAM_STR);
				}

				$stmt->execute();
				$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$floors = ["Ground Floor","1st Floor","2nd Floor","3rd Floor","4th Floor"];
				$roomsText = ["One","Two","Three","Four","Five","Six","Seven"];
				$type = ["single","double","triple","quad","five person suite","six person suite","seven person suite","eight person suite"];
				$gender = ["either gender","both genders","guys","girls"];
				$genderText = ["The room is for either gender","The room is for both genders","The room is for guys","The room is for girls"];
				$bathrooms = ["none"=>"no bathrooms","one"=>"one full bathroom","two"=>"two full bathrooms","half"=>"one half bathroom","two half"=>"two half bathrooms","one, half"=>"one full bathroom and one half bathroom","one shared"=>"one shared bathroom"];

				foreach ($rooms as $room) {
					echo '<div class="room">';
					echo '<div class="top">';
					if ($room['subFree'] == 1) { echo '<span title="This room is substance free" class="subFree"></span>'; }
					echo '<span title="' . $genderText[$room['gender']] . '" class="squareFeet ' . substr($gender[$room['gender']],0,4) . '" style="width: ' . floor($room['squareFeet']/100)*26 . 'px"></span>';
					echo '<span title="The number of rooms" class="numRooms">' . $room['numRooms'] . '</span>';
					echo '</div>';
					echo '<span class="info">' . $room['number'] . ' - ' . $room['name'] . ' (' . $floors[$room['floor']] . ')</span>';
					echo '<span class="details">' . $roomsText[$room['numRooms']-1] . ' room, ' . $type[$room['numPeople']-1] . ' - ' . $room['squareFeet'] . ' ft&sup2;</span>';
					echo '<span class="details2">It is ' . ($room['subFree'] == 0 ? 'not substance free' : 'substance free' ) . ', and is for ' . $gender[$room['gender']] . '.</span>';
					echo '<span class="details3">It has ' . $bathrooms[$room['bathrooms']] . '.</span>';
					echo '<a class="floorPlan" href="' . $room['plan'] . '-' . $room['floor'] . '.pdf">Floor Plan</a>';
					echo '<a class="location" href="' . $room['location'] .'">Location</a>';
					echo '<a class="link" href="http://dartmouthroomsearch.com/' . $room['id'] . '">Link</a>';
					echo '</div>';
				}

			    if (!isset($_GET["id"])) {
					echo "<div class='navigation'>";
				    if ($page != 0) {
				    	echo "<a class='prev' href='/page/" . ($page - 1) . "'>← Previous</a>";
				    }
				    echo "<a class='next' href='/page/" . ($page + 1) . "'>Next →</a></div>";
				}
			?>
			</div>
			<div class="footer">
				Alex Beals &#169;2016 <a href="mailto:Alex.Beals.18@dartmouth.edu">Email me here with any issues or requests for features!</a>
			</div>
		</div>
	</body>
</html>