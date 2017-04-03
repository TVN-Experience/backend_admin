<?php
require 'config.php';
require 'functions/checkLoggedIn.php';
?>

<?php
$beacons = $apiConnection->get("beacons");
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

            <h1>Beacons</h1>

            <a class="buttonlink" href="addBeacon">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">add</i>Beacon toevoegen</button>
            </a>
            <br />
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
                foreach ($beacons as $beacon) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--numeric"><?php echo $beacon->id; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $beacon->apartment_id; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $beacon->description; ?></td>
                    </tr>
                    <?php
                }
                if(empty($beacons)) {
                    ?>
                    <td class="mdl-data-table__cell--non-numeric" colspan="3">Geen gegevens.</td>
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