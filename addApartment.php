<?php
require 'config.php';

savePostedApartment();

$types = $apiConnection->get("types");
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

                <h1>Woning toevoegen</h1>

                <form action="addApartment" method="post">

                    <div class="mdl-select mdl-js-select mdl-select--floating-label">
                        <select class="mdl-select__input" id="type_id" name="type_id">
                            <option value=""></option>
                            <?php
                                foreach ($types as $type) {
                                    ?>
                                    <option value='<?php echo $type->type ?>'><?php echo $type->type ?></option>
                                    <?php
                                }
                                    ?>
                        </select>
                        <label class="mdl-select__label" for="type_id">Type id</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield">

                        <input class="mdl-textfield__input" type="text" name="measurements" id="measurements"
                               value="<?php if(isset($_POST['measurements'])) { echo $_POST['measurements'];} ?>">

                        <label class="mdl-textfield__label" for="measurements">Afmetingen</label>
                    </div>
                    <br/>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea class="mdl-textfield__input" type="text" name="description" id="description" rows="3"
                        ><?php if(isset($_POST['description'])) { echo $_POST['description'];} ?></textarea>

                        <label class="mdl-textfield__label" for="description">Beschrijving</label>
                    </div>
                    <br/>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" name="floors" id="floors" pattern="-?[0-9]*(\.[0-9]+)?"
                               value="<?php if(isset($_POST['floors'])) { echo $_POST['floors'];} ?>">

                        <label class="mdl-textfield__label" for="floors">Aantal verdiepingen</label>
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
function savePostedApartment() {
    global $apiConnection;
    if(isset($_POST["type_id"]) && isset($_POST["measurements"]) && isset($_POST["description"])
        && isset($_POST["floors"]) && !empty($_POST["floors"])) {
        $type_id = $_POST["type_id"];
        $measurement = $_POST["measurement"];
        $description = $_POST["description"];
        $floors = $_POST["floors"];
        $addApartment = $apiConnection->post("apartments", "",
            [
                "type_id" => $type_id,
                "measurement" => $measurement,
                "description" => $description,
                "floors" => $floors
            ]);
        header("location: apartments");
        die();
    }
}
?>