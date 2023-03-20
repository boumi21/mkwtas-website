<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

includeHeader(array(
    'description' => "Browse all TAS in Mario Kart Wii History, watch the videos and download the ghosts.",
    'title' => "All TAS - mkwtas"
));

include PHP_INCLUDES . 'imports_js.php';
?>

<!-- JS -->
<script type="text/javascript" src="libs/yadcf/js/jquery.dataTables.yadcf.js" defer></script>

<body>

    <?php include 'php_includes/nav.php' ?>
    <?php include MODAL . 'modalFilters.php' ?>

    <div class="main-container">
        <section class="mx-auto tab-container padding-horizontal-container">
            <div>
                <?php $getAllTASBKT->execute();
                $count = $getAllTASBKT->rowCount();
                if ($count !== 0) {
                ?>
                    <div class="epic-center" id="loader">
                        <img src="assets/img/loader.gif" alt="loading">
                        <p>Loading <?php echo $count; ?> TASes</p>
                    </div>
                    <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                        <table class="detailRow table table-sm" id="empTable" hidden>
                            <caption class="text-center"> <?php echo $count; ?> TAS BKTs in total
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#filterModal">
                                    Filters <i class="fas fa-filter"></i>
                                </button>
                            </caption>
                            <thead>
                                <tr class="border-primary">
                                    <th></th>
                                    <th>Track</th>
                                    <th>Category</th>
                                    <th>Time</th>
                                    <th>Player</th>
                                    <th>Date</th>
                                    <th>Character</th>
                                    <th>Vehicle</th>
                                    <th>Time cut</th>
                                    <th>Splits</th>
                                    <th>Ghost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = $getAllTASBKT->fetch()) { ?>
                                    <tr>
                                        <td data-table-type="<?php echo TableType::All ?>"></td>
                                        <?php include TEMP_CELLS . 'tempTrack.php' ?>
                                        <td><?php echo $arrayCategorieToText[$data['type_record']] ?></td>
                                        <?php include TEMP_CELLS . 'tempTime.php' ?>
                                        <td><?php
                                            $getPlayersFromTAS->execute(array($data['id_record']));
                                            while ($data2 = $getPlayersFromTAS->fetch()) {
                                                echo "<a href=player.php?name=" . str_replace(' ', '_', $data2['name_player']) . ">" . $data2['name_player'] . "</a></br>";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-nowrap">
                                            <?php
                                            if (!isset($data['date_record'])) {
                                                echo "N/A";
                                            } elseif (isset($data['date_option'])) {
                                                echo $data['date_option'];
                                            } else {
                                                echo $data['date_record'];
                                            }
                                            ?>
                                        </td>
                                        <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                        <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                        <?php include TEMP_CELLS . 'tempCut.php' ?>
                                        <?php include TEMP_CELLS . 'tempSplits.php' ?>
                                        <?php include TEMP_CELLS . 'tempGhost.php' ?>
                                    </tr>
                                <?php
                                }
                                $getAllTASBKT->closeCursor();
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
        </section>
    </div>
</body>

</html>