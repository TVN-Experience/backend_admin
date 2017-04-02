<?php
	require 'config.php';
	//require 'functions/checkLoggedIn.php';
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
				<a class="buttonlink" href="routes">
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
						<i class="material-icons">navigation</i> Routes bewerken
					</button>
				</a>
				<a class="buttonlink" href="startupMessage">
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
						<i class="material-icons">message</i> Opstartbericht bewerken
					</button>
				</a>

				<?php
					var_dump($apiConnection->get("types", "", []));
					// (required)endpoint, id, parameters
				?>
			</div>
		</main>
	</div>
</body>
</html>