<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';
if (!isUserAdmin()) {
    redirect("menu.php");
} else {
?>

    <?php
    includeHeader(array(
        'description' => "Add a new player in Mario Kart Wii TAS.",
        'title' => "Add New Player - mkwtas"
    ));
    ?>

    <!-- CSS -->
    <link rel="stylesheet" href="css/manager.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

    <!-- JS -->
    <script src="js/manage/manager.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

    <body>

        <?php include 'php_includes/nav.php' ?>

        <h2 class="text-center title-open mt-5 mb-5">Add a player (TASer)</h2>

        <div class="container container-form-admin mb-3">
            <form id="form_addPlayer" class="form-manage-player" action="php_scripts/manage/addPlayerManager.php" method="POST">
                <div class="form-group">
                    <label for="inputName">Name *</label>
                    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="validationName" maxlength="16">
                    <div id="validationName" class="invalid-feedback">
                        Name cannot be empty or contain the symbol "_"
                    </div>
                    <div id="validation-player-already-exists" class="text-danger hide-element">
                        This player already exists
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="select-countries">Country</label><br>
                        <select id="select-countries" name="country">
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <span class="bottom-right">
                            <button type="button" class="btn btn-secondary" onclick="goBack()">Cancel</button>
                            <button class="btn btn-success" type="submit">Add <i class="far fa-check-circle"></i></button>
                        </span>
                    </div>
                </div>
            </form>

        </div>
    </body>

</html>

<?php } ?>