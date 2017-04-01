<?php
	require 'config.php';
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
				displayMessage("");
			?>
				<!-- Your content goes here -->
			</div>
		</main>
	</div>
</body>
</html>