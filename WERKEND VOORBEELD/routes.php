<?php
	require 'config.php';
	require 'functions/checkLoggedIn.php';
?>

<?php
	// Retreive list of routes from the database
	$sql = "SELECT * FROM `routes`";
	$result = $backendDB->query($sql);
	$routes = [];
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tempRoute = [];
			$tempRoute["id"] = (int) $row["id"];
			$tempRoute["name"] = $row["name"];
			$tempRoute["description"] = $row["description"];
			$tempRoute["color"] = $row["color"];
			array_push($routes, $tempRoute);
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
				<h1>Routes</h1>
				<a class="buttonlink" href="route">
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">add</i>Route toevoegen</button>
				</a>
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--numeric">Nummer</th>
							<th class="mdl-data-table__cell--non-numeric">Kleur</th>
							<th class="mdl-data-table__cell--non-numeric">Naam</th>
							<th class="mdl-data-table__cell--non-numeric"></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($routes as $route) {
								?>
									<tr>
										<td class="mdl-data-table__cell--numeric">
											<?php echo $route["id"];?>
										</td>
										<td class="mdl-data-table__cell--non-numeric" style="background-color: <?php echo $route['color'];?>; color: white;">
											<?php echo $route["color"];?>
										</td>
										<td class="mdl-data-table__cell--non-numeric">
											<?php echo $route["name"];?>
										</td>
										<td class="mdl-data-table__cell--non-numeric">
											<a class="buttonlink" href="route?nummer=<?php echo $route["id"];?>">
												<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">edit</i></button>
											</a>
											<a class="buttonlink" href="route?nummer=<?php echo $route["id"];?>&delete">
												<button class="mdl-button mdl-js-button mdl-button--primary mdl-js-ripple-effect redtext redtext" ><i class="material-icons">delete</i></button>
											</a>
										</td>
									</tr>
								<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</main>
	</div>
</body>
</html>