<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

//Verify if the date was already given
if (isset($_GET['trip-start'])) {
    $wanted_date = htmlspecialchars($_GET['trip-start'], ENT_COMPAT, 'UTF-8');
} else {
    $wanted_date = date("Y-m-d");
}
$today_date = date("Y-m-d");

includeHeader(array(
    'description' => "Discover the state of Mario Kart Wii Tool Assisted Speedrunning on " . $wanted_date,
    'title' => "TAS Snapshot " . $wanted_date . " - mkwtas"
));

include PHP_INCLUDES . 'imports_js.php';
?>

<!-- JS -->
<script src="js/scriptSnapshot.js"></script>
<script src="libs/datepicker/js/datepicker.min.js" defer></script>

<body>

    <?php include 'php_includes/nav.php' ?>

    <div class="main-container padding-horizontal-container">
        <section class="mx-auto tab-container padding-horizontal-container">
            <div class="form-container-date text-center mb-4">
                <h2 class="title-open">The time machine <span id="icon_time-machine" class="big-icon"></span></h2>
                <hr>
                <div class="row mx-auto">
                    <form id="form-date" class="m-auto" method="get">
                        <label for="date-value">
                            <h5>Select a date to go back in time!</h5>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker calendar-icon" name="trip-start" id="date-value">
                            <button type="submit" class="btn btn-primary bottom">Go <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item button-group-choice"><a class="nav-link nav_link_tabs active link-group-choice link-snapshot" role="tab" data-toggle="tab" href="#tab-1">3 Laps</a></li>
                    <li class="nav-item button-group-choice"><a class="nav-link nav_link_tabs link-group-choice link-snapshot" role="tab" data-toggle="tab" href="#tab-2">Flaps</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">

                        <?php
                        $getTimeSnapshot->execute(array($arrayTextToCategory['classic'], $arrayTextToCategory['classicNoGlitch'], $arrayTextToCategory['classicNoUltra'], $wanted_date));
                        $data = $getTimeSnapshot->fetch();
                        $getTimeSnapshot->closeCursor();
                        $totalTime = substr($data['totalTime'], -12, 9); ?>
                        <div class="text-center">
                            <div class="total-time">
                                <?php if ($wanted_date < '2011-03-24') { ?>
                                    <h5>Total time 3 Laps disabled for dates prior to 2011-03-24. <a href="faq.php#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">FAQ</a></h5>
                                <?php } else { ?>
                                    <h5>Total time 32 tracks 3 Laps : <b><?php echo $totalTime ?></b></h5> <?php } ?>
                            </div>
                        </div>

                        <?php
                        $getAllSnapshot->execute(array($wanted_date, $arrayTextToCategory['classic'], $arrayTextToCategory['classicNoGlitch'], $arrayTextToCategory['classicNoUltra'], $wanted_date));
                        $count = $getAllSnapshot->rowCount();
                        if ($count !== 0) {  ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table pt-4">
                                <table class="detailRow table table-sm data-table">
                                    <caption class="text-center">3 Laps <i>(Fastest)</i> <span class="echo-date"><?php echo $wanted_date; ?></span></caption>
                                    <?php include TEMP_THEAD . 'classic.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllSnapshot->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::Classic ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTrack.php' ?>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempDuration.php' ?>
                                                <?php include TEMP_CELLS . 'tempCut.php' ?>
                                                <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                                <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                            </tr>
                                        <?php
                                        }
                                        $getAllSnapshot->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        }
                        $getCountRecords3LapsSnapshot->execute(array($wanted_date, $wanted_date, $wanted_date));
                        $count = $getCountRecords3LapsSnapshot->rowCount();
                        if ($count !== 0) { ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table-count pt-4">
                                <table class="table table-sm">
                                    <caption class="text-center">BKT Holders <i data-toggle='tooltip' title='(Unrestricted, No Glitch, No Ultra Cut)'>(All Categories)</i></br><span class="echo-date"><?php echo $wanted_date; ?></span></caption>
                                    <thead>
                                        <tr class="border-primary">
                                            <th>Player</th>
                                            <th>Number of BKTs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($data = $getCountRecords3LapsSnapshot->fetch()) { ?>
                                            <tr>
                                                <td><?php echo "<a href=player.php?name=" . str_replace(' ', '_', $data['name_player']) . ">" . $data['name_player'] ?>
                                                </td>
                                                <td><?php echo $data['totalRecord'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        $getCountRecords3LapsSnapshot->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>



                    <div class="tab-pane" role="tabpanel" id="tab-2">

                        <?php
                        $getTimeSnapshot->execute(array($arrayTextToCategory['flap'], $arrayTextToCategory['flapNoGlitch'], $arrayTextToCategory['flapNoUltra'], $wanted_date));
                        $data = $getTimeSnapshot->fetch();
                        $getTimeSnapshot->closeCursor();
                        $totalTime = substr($data['totalTime'], -12, 9); ?>
                        <div class="text-center">
                            <div class="total-time">
                                <?php if ($wanted_date < '2016-04-02') { ?>
                                    <h5>Total time Flaps disabled for dates prior to 2016-04-02. <a href="faq.php">FAQ</a>
                                    </h5>
                                <?php } else { ?>
                                    <h5>Total time 32 tracks Flaps : <b><?php echo $totalTime ?></b></h5> <?php } ?>
                            </div>
                        </div>

                        <?php
                        $getAllSnapshot->execute(array($wanted_date, $arrayTextToCategory['flap'], $arrayTextToCategory['flapNoGlitch'], $arrayTextToCategory['flapNoUltra'], $wanted_date));
                        $count = $getAllSnapshot->rowCount();
                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table pt-4">
                                <table class="detailRow table table-sm data-table">
                                    <caption class="text-center">Flaps <i>(Fastest)</i> <span class="echo-date"><?php echo $wanted_date; ?></span></caption>
                                    </caption>
                                    <?php include TEMP_THEAD . 'classic.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllSnapshot->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::Classic ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTrack.php' ?>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempDuration.php' ?>
                                                <?php include TEMP_CELLS . 'tempCut.php' ?>
                                                <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                                <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                            </tr>
                                        <?php
                                        }
                                        $getAllSnapshot->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        <?php
                        }
                        $getCountRecordsFlapsSnapshot->execute(array($wanted_date, $wanted_date, $wanted_date));
                        $count = $getAllSnapshot->rowCount();
                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table-count pt-4">
                                <table class="table table-sm">
                                    <caption class="text-center">BKT Holders <i data-toggle='tooltip' title='(Unrestricted, No Glitch, No Ultra Cut)'>(All Categories)</i></br><span class="echo-date"><?php echo $wanted_date; ?></span></caption>
                                    </caption>
                                    <thead>
                                        <tr class="border-primary">
                                            <th>Player</th>
                                            <th>Number of BKTs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($data = $getCountRecordsFlapsSnapshot->fetch()) { ?>
                                            <tr>
                                                <td><?php echo "<a href=player.php?name=" . str_replace(' ', '_', $data['name_player']) . ">" . $data['name_player'] ?>
                                                </td>
                                                <td><?php echo $data['totalRecord'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        $getCountRecordsFlapsSnapshot->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>