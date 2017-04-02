<?php
require 'config.php';
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
            displayMessage("");
            ?>
            <table style="width:100%">
                <tr>
                    <th>id</th>
                    <th>type</th>
                    <th>description</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>xs</td>
                    <td>erg klein</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>s</td>
                    <td>iets minder klein</td>
                </tr>
            </table>
        </div>
    </main>
</div>
</body>
</html>