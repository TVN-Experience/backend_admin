<?php
	require 'config.php';
	require 'functions/checkLoggedIn.php';
?>

<?php
	// Save startup message if user submitted the form (post request is sent)
	$saved = saveStartupMessage();

	//Retreive last item from database
	$sql = "SELECT * FROM `boot_notifications` ORDER BY `id` DESC LIMIT 1;";
	$result = $backendDB->query($sql);
	$notification = "";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$notification = $row["message"];
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
					if($saved) {
						displayMessage("Opstartbericht opgeslagen.");
					}
				?>
				<h1>Opstartbericht</h1>
				<form action="startupMessage" method="post" >
					<div class="mdl-textfield mdl-js-textfield">
						<textarea class="mdl-textfield__input" type="text" rows= "3" id="startupMessage" name="startupMessage"><?php echo $notification; ?></textarea>
						<label class="mdl-textfield__label" for="startupMessage">Opstartbericht</label>
					</div>
					<br/>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" type="submit" name="submit">
						<i class="material-icons">save</i> Opslaan
					</button>
				</form>
			</div>
		</main>
	</div>
</body>
</html>

<?php
	// Function that saves the user set boot notification
	function saveStartupMessage() {
		global $backendDB;
		if(isset($_POST["submit"]) && isset($_POST["startupMessage"])) {
			$postedStartupMessage = $_POST["startupMessage"];
			$postedStartupMessage = $backendDB->escapeString($postedStartupMessage);
			$startupMessageId = $backendDB->query("INSERT INTO `boot_notifications` (`id`, `message`) VALUES (NULL, '$postedStartupMessage');", true);
			if($startupMessageId > 0) {
				pushUpdate();
				return true;
			}
		}
		return false;
	}
?>