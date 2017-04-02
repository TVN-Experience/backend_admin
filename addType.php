<?php
	require 'config.php';
?>

<?php
	savePostedType();
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

				<h1>Woningtype toevoegen</h1>

				<form action="addType" method="post">
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" name="type" id="type"
							   value="<?php if(isset($_POST['type'])) { echo $_POST['type'];} ?>">
						<label class="mdl-textfield__label" for="type">Naam</label>
					</div>
					<br/>
					<div class="mdl-textfield mdl-js-textfield">
						<textarea class="mdl-textfield__input" type="text" name="description" id="description" rows="3"
						><?php if(isset($_POST['description'])) { echo $_POST['description'];} ?></textarea>

						<label class="mdl-textfield__label" for="description">Beschrijving</label>
					</div>
					<br/>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"
							type="submit" name="submit">
						<i class="material-icons">save</i> Opslaan
					</button>
				</form>
			</div>
		</main>
	</div>
</body>
</html>

<?php
	function savePostedType() {
		global $apiConnection;
		if(isset($_POST["type"]) && isset($_POST["description"]) && !empty($_POST["type"])) {
			$type = $_POST["type"];
			$description = $_POST["description"];
			$addType = $apiConnection->post("types", "", ["type" => $type, "description" => $description]);
			header("location: types");
			die();
		}
	}
?>