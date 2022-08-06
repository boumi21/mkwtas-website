<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

$trackName = htmlspecialchars(str_replace('_', ' ', $_GET['name']), ENT_COMPAT, 'UTF-8');

includeHeader(array(
    'description' => "Discover all Tool Assisted Speedruns on " . $trackName . " in Mario Kart Wii.",
    'title' => $trackName . " - mkwtas"
));
?>

<!-- JS -->
<script src="js/scriptTrack.js"></script>
<script src="js/manage/managerDelete.js"></script>

<body>

    <?php include 'php_includes/nav.php' ?>

    <div class="main-container padding-horizontal-container">
        <div class="track-buttons mx-auto padding-horizontal-container">
            <h1 class="section-name" id="track_name"><?php echo $trackName; ?></h1>
            <ul id="button-tabs" class="nav nav-tabs nav-fill">

                <li class="type-record-section"><img src="assets/img/svg/3laps.svg" class="img-button-group" alt=""></li>
                <li class="nav-item button-group-choice buttons-track"><a class="nav-link nav_link_tabs active link-group-choice" role="tab" data-toggle="tab" href="#classic">Unrestricted</a></li>
                <li class="nav-item button-group-choice buttons-track"><a class="nav-link nav_link_tabs link-group-choice" role="tab" data-toggle="tab" href="#no_glitch">No Glitch/No Cut</a></li>
                <li class="nav-item button-group-choice buttons-track"><a class="nav-link nav_link_tabs link-group-choice" role="tab" data-toggle="tab" href="#no_cut">No Ultra Cut</a></li>

                <div class="w-100"></div>

                <li class="type-record-section"><img src="assets/img/svg/flap.svg" class="img-button-group" alt="">
                <li class="nav-item button-group-choice buttons-track"><a class="nav-link nav_link_tabs link-group-choice" role="tab" data-toggle="tab" href="#flap">Unrestricted</a></li>
                <li class="nav-item button-group-choice buttons-track"><a class="nav-link nav_link_tabs link-group-choice" role="tab" data-toggle="tab" href="#flap_no_glitch">No Glitch/No Cut</a></li>
                <li class="nav-item button-group-choice buttons-track"><a class="nav-link nav_link_tabs link-group-choice" role="tab" data-toggle="tab" href="#flap_no_cut">No Ultra Cut</a></li>

            </ul>
        </div>

        <section class="mx-auto tab-container padding-horizontal-container">
            <div>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="classic">
                        <?php
                        $getAllByTrackAndCategory->execute(array($trackName, $arrayTextToCategory['classic']));

                        $count = $getAllByTrackAndCategory->rowCount();

                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                                <table class="table table-sm data-track detailRow">
                                    <caption class="text-center">All 3 Laps Unrestricted TASes on
                                        <?php echo $trackName; ?></caption>
                                    <?php include TEMP_THEAD . 'track.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllByTrackAndCategory->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::Track ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempCut.php' ?>
                                                <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                                <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                                <?php if (isUserAdmin()) {
                                                    include TEMP_CELLS . 'tempAdmin.php';
                                                } else {
                                                    echo '<td> <i class="fas fa-ban"></i> </td>';
                                                } ?>
                                            </tr>
                                        <?php
                                        }
                                        $getAllByTrackAndCategory->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                            displayNothing();
                        }
                        ?>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="no_glitch">
                        <?php $getAllByTrackAndCategory->execute(array($trackName, $arrayTextToCategory['classicNoGlitch']));

                        $count = $getAllByTrackAndCategory->rowCount();

                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                                <table class="table table-sm data-track detailRow">
                                    <caption class="text-center">All 3 Laps No Glitch No Cut TASes on
                                        <?php echo $trackName; ?></caption>
                                    <?php include TEMP_THEAD . 'track.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllByTrackAndCategory->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::Track ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempCut.php' ?>
                                                <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                                <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                                <?php if (isUserAdmin()) {
                                                    include TEMP_CELLS . 'tempAdmin.php';
                                                } else {
                                                    echo '<td> <i class="fas fa-ban"></i> </td>';
                                                } ?>
                                            </tr>
                                        <?php
                                        }
                                        $getAllByTrackAndCategory->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                            displayNothing();
                        }
                        ?>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="no_cut">
                        <?php $getAllByTrackAndCategory->execute(array($trackName, $arrayTextToCategory['classicNoUltra']));

                        $count = $getAllByTrackAndCategory->rowCount();

                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                                <table class="table table-sm data-track detailRow">
                                    <caption class="text-center">All 3 Laps No Ultra Cut TASes on
                                        <?php echo $trackName; ?></caption>
                                    <?php include TEMP_THEAD . 'track.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllByTrackAndCategory->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::Track ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempCut.php' ?>
                                                <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                                <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                                <?php if (isUserAdmin()) {
                                                    include TEMP_CELLS . 'tempAdmin.php';
                                                } else {
                                                    echo '<td> <i class="fas fa-ban"></i> </td>';
                                                } ?>
                                            </tr>
                                        <?php
                                        }
                                        $getAllByTrackAndCategory->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                            displayNothing();
                        }
                        ?>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="flap">
                        <?php $getAllByTrackAndCategory->execute(array($trackName, $arrayTextToCategory['flap']));

                        $count = $getAllByTrackAndCategory->rowCount();

                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                                <table class="table table-sm data-track detailRow">
                                    <caption class="text-center">All Flaps Unrestricted TASes on
                                        <?php echo $trackName; ?></caption>
                                    <?php include TEMP_THEAD . 'track.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllByTrackAndCategory->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::Track ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempCut.php' ?>
                                                <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                                <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                                <?php if (isUserAdmin()) {
                                                    include TEMP_CELLS . 'tempAdmin.php';
                                                } else {
                                                    echo '<td> <i class="fas fa-ban"></i> </td>';
                                                } ?>
                                            </tr>
                                        <?php
                                        }
                                        $getAllByTrackAndCategory->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                            displayNothing();
                        }
                        ?>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="flap_no_glitch">
                        <?php $getAllByTrackAndCategory->execute(array($trackName, $arrayTextToCategory['flapNoGlitch']));

                        $count = $getAllByTrackAndCategory->rowCount();

                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                                <table class="table table-sm data-track detailRow">
                                    <caption class="text-center">All Flaps No Glitch No Cut TASes on
                                        <?php echo $trackName; ?></caption>
                                    <?php include TEMP_THEAD . 'track.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllByTrackAndCategory->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::Track ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempCut.php' ?>
                                                <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                                <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                                <?php if (isUserAdmin()) {
                                                    include TEMP_CELLS . 'tempAdmin.php';
                                                } else {
                                                    echo '<td> <i class="fas fa-ban"></i> </td>';
                                                } ?>
                                            </tr>
                                        <?php
                                        }
                                        $getAllByTrackAndCategory->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                            displayNothing();
                        }
                        ?>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="flap_no_cut">
                        <?php $getAllByTrackAndCategory->execute(array($trackName, $arrayTextToCategory['flapNoUltra']));

                        $count = $getAllByTrackAndCategory->rowCount();

                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                                <table class="table table-sm data-track detailRow">
                                    <caption class="text-center">All Flaps No Ultra Cut TASes on
                                        <?php echo $trackName; ?></caption>
                                    <?php include TEMP_THEAD . 'track.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllByTrackAndCategory->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::Track ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempCut.php' ?>
                                                <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                                <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                                <?php if (isUserAdmin()) {
                                                    include TEMP_CELLS . 'tempAdmin.php';
                                                } else {
                                                    echo '<td> <i class="fas fa-ban"></i> </td>';
                                                } ?>
                                            </tr>
                                        <?php
                                        }
                                        $getAllByTrackAndCategory->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                            displayNothing();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include MODAL . 'modalDeleteTas.php'; ?>

</body>

</html>