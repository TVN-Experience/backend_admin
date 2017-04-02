<?php
require 'config.php';
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
                    <th class="mdl-data-table__cell--numeric">Type_Id</th>
                    <th class="mdl-data-table__cell--non-numeric">Afmetingen</th>
                    <th class="mdl-data-table__cell--non-numeric">Omschrijving</th>
                    <th class="mdl-data-table__cell--numeric">verdiepingen</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($apartments as $apartment) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--numeric"><?php echo $apartment->id; ?></td>
                        <td class="mdl-data-table__cell--numeric"><?php echo $apartment->type_id; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $apartment->measurements; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $apartment->description; ?></td>
                        <td class="mdl-data-table__cell--numeric"><?php echo $apartment->floors; ?></td>
                    </tr>
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