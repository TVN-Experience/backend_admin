<header class="mdl-layout__header">
	<div class="mdl-layout__header-row">
		<span class="mdl-layout-title">Beheerderpaneel</span>
		<div class="mdl-layout-spacer"></div>
		<nav class="mdl-navigation mdl-layout--large-screen-only">
			<?php
				if (isset($_SESSION["userID"]) && $_SESSION["userID"] >= 1) {
					?>
					<a class="mdl-navigation__link" href="logout">Uitloggen</a>
					<?php
				} else {
					?>
					<a class="mdl-navigation__link" href="login">Inloggen</a>
					<?php
				}
			?>
		</nav>
	</div>
</header>
<div class="mdl-layout__drawer">
	<span class="mdl-layout-title">TNV-Experience</span>
	<nav class="mdl-navigation">
		<?php
			foreach ($menuItems as $menuItem) {
				?>
					<a class="mdl-navigation__link" href="<?php echo $menuItem['href']; ?>"><?php echo $menuItem['text']; ?></a>
				<?php
			}
		?>

		<?php
			if (isset($_SESSION["userID"]) && $_SESSION["userID"] >= 1) {
				?>
				<a class="mdl-navigation__link" href="logout">Uitloggen</a>
				<?php
			} else {
				?>
				<a class="mdl-navigation__link" href="login">Inloggen</a>
				<?php
			}
		?>
	</nav>
</div>