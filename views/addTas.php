<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';
include TEMP . 'snackbar.php';

if (!isUserAdmin()) {
    redirect("menu.php");
} else {
    displayMessageIfError();

    includeHeader(array(
        'description' => "Add a new TAS in Mario Kart Wii TAS.",
        'title' => "Add New TAS - mkwtas"
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

        <h2 class="text-center title-open mt-5 mb-5">Add a new TAS</h2>

        <div class="container container-form-admin mb-3">
            <form id="form_addTas" class="form-manage-tas" action="php_scripts/manage/addTasManager.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>
                            <details>
                                <summary>
                                    Time *
                                </summary>
                                <p class="font-italic text-info">Format : M:SS.mmm <br> e.g. : 1min 53secs 838ms ->
                                    1:53.838
                                </p>
                            </details>
                        </label>
                        <input type="text" name="time" class="form-control" id="inputTime" placeholder="M:SS.mmm" aria-describedby="validationTime" maxlength="8">
                        <div id="validationTime" class="invalid-feedback">
                            Invalid time. Use M:SS.mmm
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDate">
                            <details>
                                <summary>
                                    Date *
                                </summary>
                                <p class="font-italic text-info">Format : YYYY:MM:DD <br> e.g. : 23rd July 2021 ->
                                    2021-07-23 <br> This field is mandatory even if the exact date is unknown. Needed to
                                    put the record at the right place in the tables.
                                </p>
                            </details>
                        </label>
                        <input type="text" name="date" class="form-control" id="inputDate" placeholder="YYYY-MM-DD" maxlength="10">
                        <div id="validationDate" class="invalid-feedback">
                            Invalid date. Use YYYY-MM-DD
                        </div>
                        <button type="button" class="btn btn-info btn-sm button-date">Today</button>
                        <button type="button" class="btn btn-info btn-sm button-date">Yesterday</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCharacter">Character *</label>
                        <select id="inputCharacter" name="character" class="form-control">
                            <?php foreach (getCharacters() as $value) { ?>
                                <option><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputVehicle">Vehicle *</label>
                        <select id="inputVehicle" name="vehicle" class="form-control">
                            <?php foreach (getVehicles() as $value) { ?>
                                <option><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTrack">Track *</label>
                        <select id="inputTrack" name="track" class="form-control">
                            <?php foreach (getTracks() as $key => $value) { ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCategory">Category *</label>
                        <select id="inputCategory" name="category" class="form-control">
                            <?php foreach ($arrayCategorieToText as $key => $value) { ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputLink">Video</label>
                    <input type="text" name="url" class="form-control" id="inputLink" placeholder="www.youtube.com/watch?v=bOyU_OzRXnM">
                    <div id="validationUrl" class="invalid-feedback">
                        Invalid URL format
                    </div>
                </div>

                <div class="form-row only-3laps">
                    <div class="form-group col-md-4">
                        <label for="inputLap1">
                            <details>
                                <summary>
                                    Lap 1
                                </summary>
                                <p class="font-italic text-info">Format : SS.mmm <br> e.g. : 03secs 838ms ->
                                    03.838
                                </p>
                            </details>
                        </label>
                        <input type="text" name="lap1" class="form-control" id="inputLap1" placeholder="SS.mmm" maxlength="6">
                        <div id="validationLap1" class="invalid-feedback">
                            Invalid time. Use SS.mmm
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputLap2">
                            <details>
                                <summary>
                                    Lap 2
                                </summary>
                                <p class="font-italic text-info">Format : SS.mmm <br> e.g. : 03secs 838ms ->
                                    03.838
                                </p>
                            </details>
                        </label>
                        <input type="text" name="lap2" class="form-control" id="inputLap2" placeholder="SS.mmm" maxlength="6">
                        <div id="validationLap2" class="invalid-feedback">
                            Invalid time. Use SS.mmm
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputLap3">
                            <details>
                                <summary>
                                    Lap 3
                                </summary>
                                <p class="font-italic text-info">Format : SS.mmm <br> e.g. : 03secs 838ms ->
                                    03.838
                                </p>
                            </details>
                        </label>
                        <input type="text" name="lap3" class="form-control" id="inputLap3" placeholder="SS.mmm" maxlength="6">
                        <div id="validationLap3" class="invalid-feedback">
                            Invalid time. Use SS.mmm
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputApproximateDate">
                            <details>
                                <summary>
                                    Approximate Date
                                </summary>
                                <p class="font-italic text-info">
                                    Fill that only if the exact date of the TAS is unknwon. e.g. : June 2013
                                </p>
                            </details>
                        </label>
                        <input type="text" name="approxDate" class="form-control" id="inputApproximateDate" placeholder="June 2013" maxlength="24">
                    </div>
                    <div class="custom-control custom-checkbox col-md-3 epic-center">
                        <input type="checkbox" name="supergrind" class="custom-control-input form-control" id="inputSupergrind">
                        <label class="custom-control-label" for="inputSupergrind">Supergrind?</label>
                    </div>
                    <div class="custom-control custom-checkbox col-md-3 epic-center only-flap">
                        <input type="checkbox" name="flapNoBkt" class="custom-control-input form-control" id="inputFlapNoBkt">
                        <label class="custom-control-label" for="inputFlapNoBkt">Flap No Bkt?</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputTag">Tag *</label>
                        <select id="inputTag" name="tag" class="form-control">
                            <?php foreach (getTags() as $key => $value) { ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <div id="validationTag" class="invalid-feedback">
                            Unverified and invalid runs must not have a ghost file.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>RKG to Upload</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control-file" accept=".rkg" name="rkgfile" id="fileUpload">
                                <label id="label-file-upload" class="custom-file-label" for="fileUpload">Choose file</label>
                            </div>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-warning" type="button" id="delete-file">Remove</button>
                        </div>
                        <input type="hidden" id="hiden-file-exist" name="file-exist" value="0">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="select-players">TASer(s) *</label><br>
                        <select name="players[]" id="select-players" class="form-control" multiple>
                            <?php
                            $getAllPlayers->execute();
                            while ($data = $getAllPlayers->fetch()) { ?>
                                <option value="<?php echo $data['id_player'] ?>"><?php echo $data['name_player'] ?>
                                </option>
                            <?php }
                            $getAllPlayers->closeCursor(); ?>
                        </select>
                        <div id="validationPlayers" class="invalid-feedback">
                            Please select at least 1 player
                        </div>
                    </div>
                    <div class="col-md-8">
                        <span class="bottom-right">
                            <button type="button" class="btn btn-secondary" onclick="goBack()">Cancel</button>
                            <button id="btn-submit-add-tas" class="btn btn-success" type="submit">Add TAS <i class="far fa-check-circle"></i></button>
                        </span>
                    </div>
                </div>

                <p class="warningMessage text-danger">Sum of flaps do not match total time.</p>

            </form>
        </div>
    </body>

</html>

<?php }

/** FUNCTIONS **/

/**
 * Verify if there is a GET parameter for the error and displays a snackbar if so.
 */
function displayMessageIfError()
{
    if (isset($_GET['error'])) {
        $errorCode = $_GET['error'];
        switch ($errorCode) {
            case 1001:
                echo "
      <script type=\"text/javascript\">
      showSnackbar(1, 'File too big (max 2Mo)');   
      </script>
      ";
                break;
            case 1002:
                echo "
      <script type=\"text/javascript\">
      showSnackbar(1, 'Invalid fyle type');   
      </script>
      ";
                break;
            case 1999:
                echo "
      <script type=\"text/javascript\">
      showSnackbar(1, 'Error while uploading file');   
      </script>
      ";
                break;
        }
    }
}
?>