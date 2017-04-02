<?php
require 'config.php';

savePostedImage();

$message = "";

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
                    if(!empty($message)) {
                        displayMessage($message);
                    }
                ?>

                <h1>Afbeelding toevoegen</h1>

                <form action="addImage" method="post" enctype="multipart/form-data">
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="file" accept=".png, .jpg, .jpeg, .gif" name="imgToUpload" id="imgToUpload" value="">
                    <label class="mdl-textfield__label" for="imgToUpload"></label>
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
function savePostedImage() {
    global $apiConnection;
    global $backendDB;

    if(isset($_POST["submit"]) && ($_FILES["imgToUpload"]['size'] > 0)) {
        //Save route with new KML
        $target_dir = "uploads/";

        //Create folder if not exists
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $target_file = $target_dir . basename($_FILES["imgToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        $check = $imageFileType == "png" || $imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "gif";
        if($check !== false) {
            // Is valid KML file
            if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"],$target_file)) {

                $addImage = $apiConnection->post("images", "",
                [
                    "uri" => $backendDB->escapeString($target_file)
                ]);

                header("location: images");
                die();
            } else {
                // Upload failed
                $message = "Uploaden van het bestand is mislukt.";
                $uploadOk = 0;
            }
        } else {
            // No valid KML
            $message = "Dit bestand is geen geldig afbeeldings bestand.";
            $uploadOk = 0;
        }
    }
}
?>