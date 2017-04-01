<?php
	require 'config.php';
	require 'functions/checkLoggedIn.php';
?>

<?php
	$route = [
		"id" => "",
		"name" => "",
		"description" => "",
		"color" => ""
	];

	// Save route if user submitted the form
	savePostedRoute();

	// Check if route get variable isset. If isset, then retreive that route.
	if(isset($_GET["nummer"]) && !empty($_GET["nummer"])) {
		$routeId = $_GET["nummer"];

		// If user clicked delete, delete the route
		deleteRouteIfConfirmed($routeId);
		
		// Retreive route from database
		$sql = "SELECT * FROM `routes` WHERE `id` = $routeId";
		$result = $backendDB->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$route = [];
				$route["id"] = (int) $row["id"];
				$route["name"] = $row["name"];
				$route["description"] = $row["description"];
				$route["color"] = $row["color"];
			}
		} else {
			// Route doesn't exist, wrong route id
			header("location: routes");
			die();
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<?php
		require './includes/head.php';
	?>
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<?php
			require 'includes/menu.php';
		?>
		<main class="mdl-layout__content">
			<div class="page-content">
				<?php
					if(isset($_GET["delete"])) {
						
							displayMessage('Weet u zeker dat u route ' . $route["name"] . ' wilt verwijderen? 
								<a class="buttonlink" href="route?nummer=' . $route["id"] . '">
									<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"><i class="material-icons">cancel</i> Behouden</button>
								</a>
								<a class="buttonlink" href="route?nummer=' . $route["id"] . '&delete=yes">
									<button class="mdl-button mdl-js-button mdl-button--primary mdl-js-ripple-effect redtext"><i class="material-icons">delete</i> Verwijderen</button>
								</a>');
						
					}
				?>
				<h1>Route <?php if(empty($route["id"])) {echo 'toevoegen';} else {echo 'bewerken';} ?></h1>
				<?php 
					if(!empty($route["id"])) {
						?>
							<h2><?php echo $route["name"]; ?></h2>
						<?php
					}
				?>
				<form action="route?nummer=<?php echo $route["id"];?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" id="id" value="<?php echo $route['id']; ?>">
					<label for="kmlToUpload">Kleur kiezen</label>
					<br/>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="color" name="color" id="color" value="<?php echo $route['color']; ?>">
						<label class="mdl-textfield__label" for="color">Kleur</label>
					</div>
					<script>
					   // init the plugin using the input id
					   window.nativeColorPicker.init('color');
					 </script>
					<br/>
					<label for="kmlToUpload">KML bestand kiezen</label>
					<br/>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="file" accept=".kml" name="kmlToUpload" id="kmlToUpload" value="">
						<label class="mdl-textfield__label" for="kmlToUpload"></label>
					</div>
					<br/>
					<br/>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" type="submit" name="submit">
						<i class="material-icons">save</i> Opslaan
					</button>
					<a class="buttonlink" href="route?nummer=<?php echo $route["id"];?>&delete">
						<button type="button" class="mdl-button mdl-js-button mdl-button--primary mdl-js-ripple-effect redtext redtext" ><i class="material-icons">delete</i> Verwijderen</button>
					</a>
				</form>
			</div>
		</main>
	</div>
</body>
</html>

<?php
	// Delete a route by id
	function deleteRouteIfConfirmed($routeId) {
		global $backendDB;
		if(isset($_GET["delete"]) && $_GET["delete"] == "yes") {
			$result = $backendDB->query("DELETE FROM `routes` WHERE `id` = $routeId;");
			$result2 = $backendDB->query("DELETE FROM `route_images` WHERE `id` = $routeId;");
			$result3 = $backendDB->query("DELETE FROM `route_waypoints` WHERE `id` = $routeId;");
			pushUpdate();
			header("location: routes");
			die();
		}
	}

	// Save route if post request has been sent
	function savePostedRoute() {
		global $backendDB;
		if(isset($_POST["submit"])) {
			if(isset($_POST["id"]) && isset($_POST["color"]) && !empty($_POST["color"]) && !(empty($_POST["id"]) && empty($_FILES["kmlToUpload"]))) {
				// All required fields are filled (if creating new route, KML file is also required)
				$route = [];
				$route["id"] = (int) $_POST["id"];
				$route["color"] = $_POST["color"];
				if(isset($_POST["submit"]) && ($_FILES["kmlToUpload"]['size'] > 0)) {
					//Save route with new KML
					$target_dir = "uploads/";

					//Create folder if not exists
					if (!file_exists($target_dir)) {
						mkdir($target_dir, 0755, true);
					}

					$target_file = $target_dir . basename($_FILES["kmlToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					
					$check = $imageFileType == "kml";
					if($check !== false) {
						// Is valid KML file
						if (move_uploaded_file($_FILES["kmlToUpload"]["tmp_name"],$target_file)) {
							kmlToJson($target_file, $_POST["id"], $_POST["color"]);
						} else {
							// Upload failed
							displayMessage("Uploaden van het bestand is mislukt.");
							$uploadOk = 0;
						}
					} else {
						// No valid KML
						displayMessage("Dit bestand is geen KML bestand.");
						$uploadOk = 0;
					}
				} else {
					// Save route without uploading new KML
					$saveroutecolorrouteid = $route["id"];
					$saveroutecolorroutecolor = $route["color"];
					$backendDB->query("UPDATE `routes` SET `color` = '$saveroutecolorroutecolor' WHERE `id` = $saveroutecolorrouteid;");
					pushUpdate();
					header("location: routes");
					die();
				}
			} else {
				// Required fields are not filled
				displayMessage("Niet alle benodigde gegevens zijn ingevuld.");
			}
		}
		
	}

	// Function that converts the KML file to JSON format
	function kmlToJson($filename, $routeId, $color) {
		$xml = simplexml_load_file($filename);
		$phpObj = $xml->Document->Folder->Placemark;
		//echo json_encode($xml);
		saveRoute($phpObj, $routeId, $color);
		
	}

	// Function that saves the route in the database
	function saveRoute($routeKML, $id, $color) {
		global $backendDB;

		if(empty($id)) {
			$id = "NULL";
		}
		$markers = [];
		foreach ($routeKML as $placemark) {
			if($placemark->LineString) {
				$route = $placemark;
			}
			if($placemark->Point) {
				array_push($markers, $placemark);
			}
		}
		
		$name = $route->name;
		$description = $route->description;
		$routeId = $backendDB->query("INSERT INTO `routes` (`id`, `name`, `description`, `color`) 
			VALUES ($id, '$name', '$description', '$color') 
			ON DUPLICATE KEY UPDATE 
			name = VALUES(name), description = VALUES(description), color = VALUES(color);", true);
		if ($routeId != 0) {
			$coords = $route->LineString->coordinates;
			$coordsArray = explode("\n ", $coords);
			$coordsArrayFinal = [];
			foreach ($coordsArray as $coordsArrayVal) {
				if (trim($coordsArrayVal) != "") {
					array_push($coordsArrayFinal, trim($coordsArrayVal));
				}
			}
			$backendDB->query("DELETE FROM `route_waypoints` WHERE `routeId` = $routeId;");
			$coordsQuery = "INSERT INTO `route_waypoints` (`id`, `routeId`, `lat`, `lon`) VALUES ";
			$queryCounter = 0;
			foreach ($coordsArrayFinal as $coordsCommaString) {
				$coordArray = explode(",", $coordsCommaString);
				$lat = $coordArray[1];
				$lon = $coordArray[0];
				if($queryCounter == count($coordsArrayFinal)-1) {
					$singleCoordsQuery = "(NULL, '$routeId', '$lat', '$lon');";
				} else {
					$singleCoordsQuery = "(NULL, '$routeId', '$lat', '$lon'),";
				}
				$coordsQuery .= $singleCoordsQuery;
				$queryCounter++;
			}
			$routeWaypointsAdded = $backendDB->query($coordsQuery);
			if ($routeWaypointsAdded) {
				saveMarkers($routeId, $markers);
			}
		}
	}

	// Function that saves the markers (POIs) in the database
	function saveMarkers($routeId, $markers) {
		global $backendDB;

		$backendDB->query("DELETE FROM `pois` WHERE `routeId` = $routeId;");
		$coordsQuery = "INSERT INTO `pois` (`id`, `name`, `routeId`, `poiTypeId`, `lat`, `lon`) VALUES ";
		$queryCounter = 0;
		foreach ($markers as $marker) {
			$name = $marker->name;
			$type = $marker->description;
			$coords = trim($marker->Point->coordinates);
			$coordArray = explode(",", $coords);
			$lat = $coordArray[1];
			$lon = $coordArray[0];

			$poiTypeResult = $backendDB->query("SELECT `id` FROM `poi_types` WHERE `name` LIKE '$type'");
			while($row = $poiTypeResult->fetch_assoc()) {
				$poiType = $row["id"];
			}
			if($queryCounter == count($markers)-1) {
				$singleCoordsQuery = "(NULL, '$name', '$routeId', $poiType, '$lat', '$lon');";
			} else {
				$singleCoordsQuery = "(NULL, '$name', '$routeId', $poiType, '$lat', '$lon'),";
			}
			$coordsQuery .= $singleCoordsQuery;
			$queryCounter++;
		}
		$markersAdded = $backendDB->query($coordsQuery);
		if ($markersAdded) {
			pushUpdate();
			header("location: routes");
			die();
		}
	}
?>