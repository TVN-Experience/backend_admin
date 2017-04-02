<?php
require 'config.php';
require 'functions/checkLoggedIn.php';

savePostedTracking();

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

                <h1>Tracking toevoegen</h1>

                <form action="addTracking" method="post">

                    <div class="mdl-select mdl-js-select mdl-select--floating-label">
                        <select class="mdl-select__input" id="beacon_id" name="beacon_id">
                            <option value=""></option>
                            <?php
                            foreach ($beacons as $beacon) {
                                ?>
                                <option value='<?php echo $beacon->id ?>'><?php echo $beacon->id ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label class="mdl-select__label" for="beacon_id">Beacon id</label>
                    </div>

                    <label class="" for="start_time">Begin tijd</label>
                    <div class="mdl-textfield mdl-js-textfield">

                        <input class="mdl-textfield__input" type="datetime-local" name="start_time" id="start_time"
                               value="<?php if(isset($_POST['start_time'])) { echo $_POST['start_time'];} ?>">

                        <!-- <label class="mdl-textfield__label" for="start_time">Begin tijd</label> -->
                    </div>

                    <br/>
                    <label class="" for="end_time">Eind tijd</label>
                    <div class="mdl-textfield mdl-js-textfield">

                        <input class="mdl-textfield__input" type="datetime-local" name="end_time" id="end_time"
                               value="<?php if(isset($_POST['end_time'])) { echo $_POST['end_time'];} ?>">

                        <!-- <label class="mdl-textfield__label" for="end_time">Eind tijd</label> -->
                    </div>

                    <br/>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" name="mac_address" id="mac_address"
                        value="<?php if(isset($_POST['mac_address'])) { echo $_POST['mac_address'];} ?>">

                        <label class="mdl-textfield__label" for="description">mac adres</label>
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
function savePostedTracking() {
    global $apiConnection;
    global $backendDB;
    if(isset($_POST["beacon_id"]) && isset($_POST["start_time"]) && isset($_POST["end_time"])
        && isset($_POST["mac_address"]) && !empty($_POST["beacon_id"])) {
        $beacon_id = $_POST["beacon_id"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $mac_address = $_POST["mac_address"];
        $addApartment = $apiConnection->post("tracking", "",
            [
                "beacon_id" => (int)$beacon_id,
                "start_time" => $start_time,
                "end_time" => $end_time,
                "mac_address" => $mac_address
            ]);
        var_dump($_POST);
        var_dump($addApartment);
        echo "moet t gedaan hebben";
        header("location: tracking");
        die();
    }
}
?>