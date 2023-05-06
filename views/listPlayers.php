<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

includeHeader(array(
    'description' => "Browse all players and contributors that created Mario Kart Wii TAS.",
    'title' => "Browse Players - mkwtas"
));

include PHP_INCLUDES . 'imports_js.php';
?>

<!-- JS -->
<script src="js/scriptListPLayers.js"></script>

<body>

    <?php include 'php_includes/nav.php' ?>

    <div class="main-container mt-2 mb-4">
        <h4 class="text-center mb-4 pt-2">
            <?php
            $countAllPlayers->execute();
            $data = $countAllPlayers->fetch();
            echo "There are currently <b>" . $data['nbrJoueurs'] . "</b> TASers on the site.";
            $countAllPlayers->closeCursor();
            ?>
        </h4>

        <div class="container mb-3">
            <input class="form-control mx-auto w-75" id="input_searchPlayer" type="text" placeholder="Search.." autofocus>
        </div>

        <section class="mx-auto list-container">
            <ul id="listPlayers" class="list-group list-players">
                <?php
                $getAllPlayers->execute();
                while ($data = $getAllPlayers->fetch()) {
                ?>
                    <li class="list-players-li">
                        <?php echo "<img class='mr-1' src='assets/country-flags/svg/" . strtolower($data['country']) . ".svg' width='28px' >"; ?>
                        <?php echo "<a href=player.php?name=" . str_replace(' ', '_', $data['name_player']) . ">" . $data['name_player'] . "</a>" ?>
                    </li>
                <?php
                }
                $getAllPlayers->closeCursor();
                ?>
            </ul>
        </section>
    </div>
</body>

</html>