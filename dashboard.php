<?php
	require 'config.php';
	require 'functions/checkLoggedIn.php';
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
			foreach ($menuItems as $menuItem) {
				?>
				<a class="buttonlink" href="<?php echo $menuItem['href']; ?>">
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
						<i class="material-icons"><?php echo $menuItem['icon']; ?></i> <?php echo $menuItem['text']; ?>
					</button>
				</a>
				<br />
				<?php
			}
			?>
				<?php
					//var_dump($apiConnection->get("types", "", []));
					// (required)endpoint, id, parameters
				?>
			</div>
		</main>
	</div>
</body>
</html>