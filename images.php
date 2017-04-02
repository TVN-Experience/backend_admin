<?php
require 'config.php';
require 'functions/checkLoggedIn.php';
?>

<?php
$images = $apiConnection->get("images");
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

            <h1>Afbeeldingen</h1>

            <a class="buttonlink" href="addImage">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">add</i>Afbeelding toevoegen</button>
            </a>
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--numeric">Id</th>
                    <th class="mdl-data-table__cell--non-numeric">Uri</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($images as $image) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--numeric"><?php echo $image->id; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $image->uri; ?></td>
                    </tr>
                    <?php
                }
                if(empty($images)) {
                    ?>
                    <td class="mdl-data-table__cell--non-numeric" colspan="2">Geen gegevens.</td>
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