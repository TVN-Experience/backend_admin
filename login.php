<?php
	require 'config.php';
?>

<?php
	// Check if user is redirected from another page
	if (isset($_GET["redirectedFrom"])) {
		$redirectedFrom = $_GET["redirectedFrom"];
	}

	// If already logged in, go to the index page
	if (isset($_SESSION["userID"]) && $_SESSION["userID"] >= 1) {
		header("location: index");
		die();
	}

	// Try to login
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$postedUsername = $_POST["username"];
		$postedPassword = @crypt($_POST["password"], sha1('TVN-Experience')); // Encrypt the password
		var_dump($postedPassword);
		if (!empty($postedUsername) && !empty($postedPassword)) {
			$sql = "SELECT `id` FROM  `" . TABLE_PREFIX . "users` WHERE  `username` =  '$postedUsername' AND `password` = '$postedPassword'";
			$result = $backendDB->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc ()) {
					// User login us success
					$_SESSION["userID"] = $row["id"];
					if (isset($_GET["redirectedFrom"])) {
						$page_headers = @get_headers($redirectedFrom);
						if($page_headers[0] != 'HTTP/1.1 404 Not Found') {
							header("location: " . $redirectedFrom);
							die();
						} else {
							header("location: index");
							die();
						}
					} else {
						header("location: index");
						die();
					}
				}
			} else {
				// Login cridentials failed
				$message = "Uw inloggegevens zijn niet correct.";
			}
		} else {
			// Required fields are not filled in
			$message = "Vul alle gegevens in.";
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
					if(isset($message)) {
						displayMessage($message);
					}
				?>
				<h1>Inloggen</h1>
				<form action="login<?php if (isset($_GET["redirectedFrom"])){ echo "?redirectedFrom=" . $redirectedFrom; } ?>" method="post">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" name="username" id="username" value="<?php if(isset($_POST["username"])){echo $_POST["username"];} ?>">
						<label class="mdl-textfield__label" for="username">Gebruikersnaam</label>
					</div>
					<br/>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="password" name="password" id="password">
						<label class="mdl-textfield__label" for="password">Wachtwoord</label>
					</div>
					<br/>
					<input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" type="submit" name="submit" value="Inloggen">
				</form>
			</div>
		</main>
	</div>
</body>
</html>

