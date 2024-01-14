<!DOCTYPE html>
<html lang="en">


<?php
include 'php_includes/imports.php';

includeHeader(array(
    'description' => "Discover current best know times in Mario Kart Wii TAS (3 Laps).",
    'title' => "3 Laps TAS - mkwtas"
));

include PHP_INCLUDES . 'imports_js.php';
?>


<body>

    <main>

        <?php include 'php_includes/nav.php' ?>

        <div class="main-container">
            <section class="mx-auto tab-container padding-horizontal-container">
                <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                    <table class="detailRow table table-sm data-table">
                        <caption class="text-center">Unrestricted 3laps <button type="button" class="btn btn-outline-secondary btn-sm collapsible" onclick="collapseTable(this, 1)">Hide</button></caption>
                        <?php include TEMP_THEAD . 'classic.php' ?>
                        <tbody class="tab1">
                            <?php
                            $getBktFromCategory->execute(array($arrayTextToCategory['classic'], $arrayTextToCategory['classic']));
                            while ($data = $getBktFromCategory->fetch()) {
                            ?>

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
                            $getBktFromCategory->closeCursor();
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>


            <section class="mx-auto tab-container padding-horizontal-container">
                <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                    <table class=" detailRow table table-sm data-table">
                        <caption class="text-center">No Glitch/SC 3laps <button type="button" class="btn btn-outline-secondary btn-sm collapsible" onclick="collapseTable(this, 2)">Hide</button></caption>
                        <?php include TEMP_THEAD . 'classic.php' ?>
                        <tbody class="tab2">

                            <?php
                            $getBktFromCategory->execute(array($arrayTextToCategory['classicNoGlitch'], $arrayTextToCategory['classicNoGlitch']));
                            while ($data = $getBktFromCategory->fetch()) {
                            ?>

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
                            $getBktFromCategory->closeCursor();
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>


            <section class="mx-auto tab-container padding-horizontal-container">
                <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                    <table class=" detailRow table table-sm data-table">
                        <caption class="text-center">No Ultra 3laps <button type="button" class="btn btn-outline-secondary btn-sm collapsible" onclick="collapseTable(this, 3)">Hide</button></caption>
                        <?php include TEMP_THEAD . 'classic.php' ?>
                        <tbody class="tab3">

                            <?php
                            $getBktFromCategory->execute(array($arrayTextToCategory['classicNoUltra'], $arrayTextToCategory['classicNoUltra']));
                            while ($data = $getBktFromCategory->fetch()) {
                            ?>

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
                            $getBktFromCategory->closeCursor();
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>


            <section class="mx-auto tab-container padding-horizontal-container">
                <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table-count">
                    <table class="table table-sm">
                        <caption class="text-center">BKT Holders <button type="button" class="btn btn-outline-secondary btn-sm collapsible" onclick="collapseTable(this, 4)">Hide</button></caption>
                        <thead>
                            <tr class="border-primary">
                                <th>Player</th>
                                <th>Number of BKTs</th>
                            </tr>
                        </thead>
                        <tbody class="tab4">

                            <?php
                            $getCountRecords3Laps->execute();
                            while ($data = $getCountRecords3Laps->fetch()) {
                            ?>

                                <tr>
                                    <td><?php echo "<a href=player.php?name=" . str_replace(' ', '_', $data['name_player']) . ">" . $data['name_player'] ?></td>
                                    <td><?php echo $data['totalRecord'] ?></td>
                                </tr>

                            <?php
                            }
                            $getCountRecords3Laps->closeCursor();
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
</body>

</html>