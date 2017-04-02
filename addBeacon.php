<?php
require 'config.php';

savePostedBeacons();

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

                <h1>Beacon toevoegen</h1>

                <form action="addBeacon" method="post">

                    <div class="mdl-select mdl-js-select mdl-select--floating-label">
                        <select class="mdl-select__input" id="apartment_id" name="apartment_id">
                            <option value=""></option>
                            <?php
                            foreach ($apartments as $apartment) {
                                ?>
                                <option value='<?php echo $apartment->id ?>'><?php echo $apartment->id ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label class="mdl-select__label" for="apartment_id">Appartement id</label>
                    </div>

                    <br/>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea class="mdl-textfield__input" type="text" name="description" id="description" rows="3"><?php if(isset($_POST['description'])) { echo $_POST['description'];} ?></textarea>
                        <label class="mdl-textfield__label" for="description">Beschrijving</label>
                    </div>

                    <br/>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" type="submit" name="submit">
                        <i class="material-icons">save</i> Opslaan
                    </button>
                </form>
            </div>
        </main>
    </div>
    </body>
    </html>

<?php
function savePostedBeacons() {
    global $apiConnection;
    if(isset($_POST["apartment_id"]) && isset($_POST["description"]) && !empty($_POST["apartment_id"])) {
        $apartment_id = (int)$_POST["apartment_id"];
        $description = $_POST["description"];
        $addBeacons = $apiConnection->post("beacons", "", ["apartment_id" => $apartment_id, "description" => $description]);
        header("location: beacons");
        die();
    }
}
?>