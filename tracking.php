<?php
require 'config.php';
require 'functions/checkLoggedIn.php';
?>

<?php
$trackings = $apiConnection->get("tracking");
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

            <h1>Tracking</h1>

            <a class="buttonlink" href="addTracking">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">add</i>Tracking toevoegen</button>
            </a>
            <br />
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--numeric">Id</th>
                    <th class="mdl-data-table__cell--numeric">Beacon_Id</th>
                    <th class="mdl-data-table__cell--non-numeric">Start_Tijd</th>
                    <th class="mdl-data-table__cell--non-numeric">Eind_Tijd</th>
                    <th class="mdl-data-table__cell--non-numeric">Mac_Adres</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($trackings as $tracking) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--numeric"><?php echo $tracking->id; ?></td>
                        <td class="mdl-data-table__cell--numeric"><?php echo $tracking->beacon_id; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $tracking->start_time; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $tracking->end_time; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $tracking->mac_address; ?></td>
                    </tr>
                    <?php
                }
                if(empty($trackings)) {
                    ?>
                    <td class="mdl-data-table__cell--non-numeric" colspan="5">Geen gegevens.</td>
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