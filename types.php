<?php
require 'config.php';
?>

<?php
$types = $apiConnection->get("types");
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
			//displayMessage("");
			?>

			<h1>Woningtypes</h1>

			<a class="buttonlink" href="addType">
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">add</i>Woningtype toevoegen</button>
			</a>
			<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
				<thead>
					<tr>
						<th class="mdl-data-table__cell--numeric">Id</th>
						<th class="mdl-data-table__cell--non-numeric">Naam</th>
						<th class="mdl-data-table__cell--non-numeric">Beschrijving</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($types as $type) {
						?>
						<tr>
							<td class="mdl-data-table__cell--numeric"><?php echo $type->id; ?></td>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $type->type; ?></td>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $type->description; ?></td>
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