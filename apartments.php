<?php
require 'config.php';
require 'functions/checkLoggedIn.php';
?>

<?php
$apartments = $apiConnection->get("apartments");
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

            <h1>Appartementen</h1>

            <a class="buttonlink" href="addApartment">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">add</i>Appartement toevoegen</button>
            </a>
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--numeric">Id</th>
                    <th class="mdl-data-table__cell--numeric">Type</th>
                    <th class="mdl-data-table__cell--non-numeric">Afmetingen</th>
                    <th class="mdl-data-table__cell--non-numeric">Omschrijving</th>
                    <th class="mdl-data-table__cell--numeric">Verdiepingen</th>
                    <th class="mdl-data-table__cell--numeric">Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($apartments as $apartment) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--numeric"><?php echo $apartment->id; ?></td>
                        <td class="mdl-data-table__cell--numeric"><?php echo $apiConnection->get("types", $apartment->type_id)->type; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $apartment->measurements; ?></td>
                        <td class="mdl-data-table__cell--non-numeric apartment-description"><?php echo $apartment->description; ?></td>
                        <td class="mdl-data-table__cell--numeric"><?php echo $apartment->floors; ?></td>
                        <td class="mdl-data-table__cell--numeric">€<?php echo number_format($apartment->price, 0, ",", "."); ?></td>
                    </tr>
                    <?php
                }
                if(empty($apartments)) {
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