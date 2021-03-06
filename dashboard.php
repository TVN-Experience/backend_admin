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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="js/pages/dashboard.js"></script>

</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<?php
			require 'includes/menu.php';
		?>
		<main class="mdl-layout__content">
			<div class="page-content">
			<?php
				/*foreach ($menuItems as $menuItem) {
					?>
					<a class="buttonlink" href="<?php echo $menuItem['href']; ?>">
						<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
							<i class="material-icons"><?php echo $menuItem['icon']; ?></i> <?php echo $menuItem['text']; ?>
						</button>
					</a>
					<?php
				}*/
			?>

				<h4>Tijd die mensen kijken bij appartementtypes</h4>
				<div class="dashboard-chart" id="timeAtApartmentTypeChart"></div>
				<h4>Tijd die mensen kijken bij appartementen</h4>
				<div class="dashboard-chart" id="timeAtApartmentChart"></div> 
				<h4>Mensen die keken bij appartementtype S+ in het afgelopen uur</h4>
				<div class="dashboard-chart" id="personsAtApartmentTimeLine"></div> 
			</div>
		</main>
	</div>
</body>
</html>