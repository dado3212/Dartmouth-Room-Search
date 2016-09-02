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

		<link rel="stylesheet" type="text/css" href="css/display.css">

		<!-- Hello a metric ton of favicon code! -->
		<link rel="apple-touch-icon" sizes="57x57" href="imgs/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="imgs/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="imgs/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="imgs/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="imgs/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="imgs/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="imgs/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="imgs/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="imgs/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="imgs/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="imgs/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="imgs/favicon/favicon-16x16.png">
		<link rel="manifest" href="imgs/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#006841">
		<meta name="msapplication-TileImage" content="imgs/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#006841">

		<!--
			Created as a fun side project by Alex Beals '18!
			If you have any problems, please feel free to email me at Alex.Beals.18@dartmouth.edu
		-->
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
			if (preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|Mobile)/i", $_SERVER['HTTP_USER_AGENT'])) {
				?><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"><?php
			}
		?>

	</head>
	<body>
		<div id='wrapper'>
			<div id='header'>
				<img itemprop="image" src='imgs/logo.png' alt='Dartmouth Room Search Logo white' title='DRC Logo'/>
				<a href="//dartmouthroomsearch.com">Dartmouth Room Search</a>
			</div>
			<form name='search' id='search' method='post' action=''>
				I'm looking for a room for between <input type='number' name='minPeople' min='1' value='<?php if (isset($_POST['minPeople'])) {echo $_POST['minPeople'];} else {echo '1';} ?>'> and <input type='number' name='maxPeople' value='<?php if (isset($_POST['maxPeople'])) {echo $_POST['maxPeople'];} else {echo '4';} ?>'> people 
				with <input type='number' name='minRooms' min='1' value='<?php if (isset($_POST['minRooms'])) {echo $_POST['minRooms'];} else {echo '1';} ?>'> to <input type='number' name='maxRooms' value='<?php if (isset($_POST['maxRooms'])) {echo $_POST['maxRooms'];} else {echo '3';} ?>'> rooms.&nbsp;&nbsp;The roommates will be  
				<select name='gender'><option value='a' <?php if (isset($_POST['gender']) && $_POST['gender'] == 'a') {echo 'selected';} ?>>guys</option><option value='b' <?php if (isset($_POST['gender']) && $_POST['gender'] == 'b') {echo 'selected';} ?>>girls</option><option value='c' <?php if (isset($_POST['gender']) && $_POST['gender'] == 'c') {echo 'selected';} ?>>both</option></select>, and it 
				<select name='subFree'><option <?php if (isset($_POST['subFree']) && $_POST['subFree'] == '0') { echo 'selected';} ?> value='0'>should not be</option><option <?php if (isset($_POST['subFree']) && $_POST['subFree'] == '1') { echo 'selected';} ?> value='1'>should be</option></select> substance free.&nbsp;&nbsp;
				I want the room to be 
				<select name='building'>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == '') { echo 'selected';} ?> value=''>anywhere</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Andres') { echo 'selected';} ?> value='Andres'>in Andres</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Bildner') { echo 'selected';} ?> value='Bildner'>in Bildner</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Channing Cox') { echo 'selected';} ?> value='Channing Cox'>in Channing Cox</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Mid Fayerweather') { echo 'selected';} ?> value='Mid Fayerweather'>in Mid Fayerweather</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'North Fayerweather') { echo 'selected';} ?> value='North Fayerweather'>in North Fayerweather</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'South Fayerweather') { echo 'selected';} ?> value='South Fayerweather'>in South Fayerweather</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Gile') { echo 'selected';} ?> value='Gile'>in Gile</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Hitchcock') { echo 'selected';} ?> value='Hitchcock'>in Hitchcock</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Lodge') { echo 'selected';} ?> value='Lodge'>in Lodge</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Lord') { echo 'selected';} ?> value='Lord'>in Lord</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Mid Mass') { echo 'selected';} ?> value='Mid Mass'>in Mid Mass</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'North Mass') { echo 'selected';} ?> value='North Mass'>in North Mass</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'South Mass') { echo 'selected';} ?> value='South Mass'>in South Mass</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Maxwell') { echo 'selected';} ?> value='Maxwell'>in Maxwell</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'McCulloch') { echo 'selected';} ?> value='McCulloch'>in McCulloch</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'McLane Hall') { echo 'selected';} ?> value='McLane Hall'>in McLane Hall</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Morton') { echo 'selected';} ?> value='Morton'>in Morton</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'New Hampshire Hall') { echo 'selected';} ?> value='New Hampshire Hall'>in New Hampshire Hall</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Rauner') { echo 'selected';} ?> value='Rauner'>in Rauner</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Richardson') { echo 'selected';} ?> value='Richardson'>in Richardson</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Ripley') { echo 'selected';} ?> value='Ripley'>in Ripley</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Smith') { echo 'selected';} ?> value='Smith'>in Smith</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Streeter') { echo 'selected';} ?> value='Streeter'>in Streeter</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Thomas') { echo 'selected';} ?> value='Thomas'>in Thomas</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Topliff') { echo 'selected';} ?> value='Topliff'>in Topliff</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Wheeler') { echo 'selected';} ?> value='Wheeler'>in Wheeler</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Woodward') { echo 'selected';} ?> value='Woodward'>in Woodward</option>
					<option <?php if (isset($_POST['building']) && $_POST['building'] == 'Zimmerman') { echo 'selected';} ?> value='Zimmerman'>in Zimmerman</option>
				</select>, and I want the results to be ordered by <select name='order'><option value='0' <?php if (isset($_POST['order']) && $_POST['order'] == '0') {echo 'selected';} ?>>square feet</option><option value='1' <?php if (isset($_POST['order']) && $_POST['order'] == '1') {echo 'selected';} ?>>square feet per person</option><option value='2' <?php if (isset($_POST['order']) && $_POST['order'] == '2') {echo 'selected';} ?>>number of people</option><option value='3' <?php if (isset($_POST['order']) && $_POST['order'] == '3') {echo 'selected';} ?>>number of rooms</option></select>.<br>
				<input type='submit' class='search' value='Search!'>
			</form>

			<div class='rooms' itemscope itemtype="https://schema.org/CreativeWork">
				<meta itemprop="author" content="Alex Beals">
				<meta itemprop="audience" content="students">
				<meta itemprop="isFamilyFriendly" content="true">
				<meta itemprop="keywords" content="dartmouth, room, search, find, rooms, buildings,
				locate, school, college, ivy, housing, priority">
			<?php
				error_reporting(E_ALL);
				ini_set("display_errors", 1);

				include("secret.php");

				$PDO = createConnection();

				$clause = "";
				if (isset($_POST['minPeople'])) {
					$clause = " WHERE numPeople >= {$_POST['minPeople']} AND numPeople <= {$_POST['maxPeople']} AND numRooms >= {$_POST['minRooms']} AND numRooms <= {$_POST['maxRooms']} AND {$_POST['gender']} AND subFree = {$_POST['subFree']}";
				}

				if (isset($_GET['id'])) {
					$stmt = $PDO->prepare("SELECT * FROM rooms WHERE id=:id");
					$stmt->bindValue(":id",$_GET['id'],PDO::PARAM_STR);
				} else if (isset($_POST['minPeople'])) {
					$genderAttach = '';
					if ($_POST['gender'] == 'a') {
						$genderAttach = ' AND (gender = 0 OR gender = 1 OR gender = 2)';
					} else if ($_POST['gender'] == 'b') {
						$genderAttach = ' AND (gender = 0 OR gender = 1 OR gender = 3)';
					} else if ($_POST['gender'] == 'c') {
						$genderAttach = ' AND (gender = 1)';
					}

					$order = '';
					if ($_POST['order'] == 0) {
						$order = " ORDER BY squareFeet desc";
					} else if ($_POST['order'] == 1) {
						$order = " ORDER BY squareFeet / numPeople desc";
					} else if ($_POST['order'] == 2) {
						$order = " ORDER BY numPeople desc";
					} else if ($_POST['order'] == 3) {
						$order = " ORDER BY numRooms desc";
					}

					if (isset($_POST['building']) && $_POST['building'] == '') {
						$stmt = $PDO->prepare("SELECT * FROM rooms WHERE numPeople >= :minPeople AND numPeople <= :maxPeople AND numRooms >= :minRooms AND numRooms <= :maxRooms AND subFree = :subFree" . $genderAttach . $order);
					} else {
						$stmt = $PDO->prepare("SELECT * FROM rooms WHERE numPeople >= :minPeople AND numPeople <= :maxPeople AND numRooms >= :minRooms AND numRooms <= :maxRooms AND building = :building AND subFree = :subFree" . $genderAttach . $order);
						$stmt->bindValue(":building",$_POST['building'],PDO::PARAM_STR);
					}
					$stmt->bindValue(":minPeople",$_POST['minPeople'],PDO::PARAM_STR);
					$stmt->bindValue(":maxPeople",$_POST['maxPeople'],PDO::PARAM_STR);
					$stmt->bindValue(":minRooms",$_POST['minRooms'],PDO::PARAM_STR);
					$stmt->bindValue(":maxRooms",$_POST['maxRooms'],PDO::PARAM_STR);
					$stmt->bindValue(":subFree",$_POST['subFree'],PDO::PARAM_STR);
				} else {
					$stmt = $PDO->prepare("SELECT * FROM rooms");
				}

				$stmt->execute();

				$floors = array('Ground Floor','1st Floor','2nd Floor','3rd Floor','4th Floor');
				$rooms = array('One','Two','Three','Four','Five','Six','Seven');
				$type = array('single','double','triple','quad','five person suite','six person suite','seven person suite','eight person suite');
				$gender = array('either gender','both genders','guys','girls');
				$genderText = array('The room is for either gender','The room is for both genders','The room is for guys','The room is for girls');
				$bathrooms = array('none'=>'no bathrooms','one'=>'one full bathroom','two'=>'two full bathrooms','half'=>'one half bathroom','two half'=>'two half bathrooms','one, half'=>'one full bathroom and one half bathroom','one shared'=>'one shared bathroom');

				$buildCodes = array();
				$buildLocs = array();
				$build = $PDO->prepare("SELECT name,code,location FROM buildings");
				$build->execute();
				while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
					$buildCodes[$row['name']] = $row['code'];
					$buildLocs[$row['name']] = $row['location'];
				}

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					echo '<div class="room">';
					echo '<div class="top">';
					if ($row['subFree'] == 1) { echo '<span title="This room is substance free" class="subFree"></span>'; }
					echo 	'<span title="' . $genderText[$row['gender']] . '" class="squareFeet ' . substr($gender[$row['gender']],0,4) . '" style="width: ' . floor($row['squareFeet']/100)*26 . 'px"></span>';
					echo 	'<span title="The number of rooms" class="numRooms">' . $row['numRooms'] . '</span>';
					echo '</div>';
					echo '<span class="info">' . $row['number'] . ' - ' . $row['building'] . ' (' . $floors[$row['floor']] . ')</span>';
					echo '<span class="details">' . $rooms[$row['numRooms']-1] . ' room, ' . $type[$row['numPeople']-1] . ' - ' . $row['squareFeet'] . ' ft&sup2;</span>';
					echo '<span class="details2">It is ' . ($row['subFree'] == 0 ? 'not substance free' : 'substance free' ) . ', and is for ' . $gender[$row['gender']] . '.</span>';
					echo '<span class="details3">It has ' . $bathrooms[$row['bathrooms']] . '.</span>';
					echo '<a class="floorPlan" target="_blank" href="http://www.dartmouth.edu/~orl/images/floor-plans-06/' . $buildCodes[$row['building']] . '-' . $row['floor'] . '.pdf">Floor Plan</a>';
					echo '<a class="location" target="_blank" href="' . $buildLocs[$row['building']] .'">Location</a>';
					echo '<a class="link" target="_blank" href="http://dartmouthroomsearch.com?id=' . $row['id'] . '">Link</a>';
					echo '</div>';
			    }

			    echo '</div>';
			?>
			<div class='footer'>
				Alex Beals &#169;2016 <a href="mailto:Alex.Beals.18@dartmouth.edu">Email me here with any issues or requests for features!</a>
			</div>
		</div>
	</body>
</html>