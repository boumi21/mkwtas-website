<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

$playerName = htmlspecialchars(str_replace('_', ' ', $_GET['name']), ENT_COMPAT, 'UTF-8');

includeHeader(array(
    'description' => $playerName . "Player Page. Discover every TAS by this player.",
    'title' => $playerName . " Player Page - mkwtas"
));
?>

<!-- JS -->
<script src="js/manage/managerDelete.js"></script>

<body>
    
    <?php include 'php_includes/nav.php' ?>

    <div class="main-container padding-horizontal-container">
        <section class="mx-auto tab-container padding-horizontal-container">
            <h1 class="section-name"><?php echo $playerName; ?>
                <?php 
                $getInfoPlayer->execute(array($playerName));
                $data = $getInfoPlayer->fetch();
                $getInfoPlayer->closeCursor();
                echo '<img
                    class="player-flag" 
                    data-toggle="tooltip"
                    src="assets/country-flags/png100px/' . strtolower($data['country']) . '.png">';
                echo '<script type="text/javascript">
                    getCountryName("' . $data["country"] . '");
                    </script>';
                ?>

                <?php
                if (isUserAdmin()) {
                ?>
                    <span class="container-form-admin-player ml-5">
                        <a href="modifyPlayer.php?name=<?php echo $playerName ?>" data-toggle="tooltip" title="Modify"><span class="text-info"><i class="fas fa-edit fa-xs mr-3"></i></span></a>
                        <span data-toggle="tooltip" title="Delete">
                            <a href="#modal-delete-player" data-toggle="modal" data-target="#modal-delete-player"><span class="text-danger"><i class="fas fa-trash-alt fa-xs"></i></span></a>
                        </span>
                    </span>
                <?php } ?>
            </h1>

            <?php include MODAL . 'modalDeletePlayer.php'; ?>

            <div>
                <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item button-group-choice"><a class="nav-link nav_link_tabs active link-group-choice" role="tab" data-toggle="tab" href="#tab-1">All TASes</a></li>
                    <li class="nav-item button-group-choice"><a class="nav-link nav_link_tabs link-group-choice" role="tab" data-toggle="tab" href="#tab-2">BKT Only</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <?php $getAllByPlayer->execute(array($playerName));

                        $count = $getAllByPlayer->rowCount();

                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                                <table class="table table-sm data-player-full detailRow mb-5">
                                    <caption class="text-center">
                                        All TASes by <?php echo $playerName; ?>
                                    </caption>
                                    <?php include TEMP_THEAD . 'playerAll.php' ?>
                                    <tbody>
                                        <?php while ($data = $getAllByPlayer->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::PlayerAll ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTrack.php' ?>
                                                <td><?php echo $arrayCategorieToText[$data['type_record']] ?></td>
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
                                        $getAllByPlayer->closeCursor(); 
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

                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <?php $getBKTByPlayer->execute(array($playerName));

                        $count = $getBKTByPlayer->rowCount();

                        if ($count !== 0) {
                        ?>
                            <div class="d-lg-flex justify-content-lg-start align-items-lg-start justify-content-xl-start record-table">
                                <table class="table table-sm data-table-player detailRow mb-5">
                                    <caption class="text-center">
                                        All current BKT by <?php echo $playerName; ?>
                                    </caption>
                                    <?php include TEMP_THEAD . 'playerBKT.php' ?>
                                    <tbody>
                                        <?php while ($data = $getBKTByPlayer->fetch()) { ?>
                                            <tr>
                                                <td data-table-type="<?php echo TableType::PlayerBKT ?>"></td>
                                                <?php include TEMP_CELLS . 'tempTrack.php' ?>
                                                <td><?php echo $arrayCategorieToText[$data['type_record']] ?></td>
                                                <?php include TEMP_CELLS . 'tempTime.php' ?>
                                                <?php include TEMP_CELLS . 'tempPlayers.php' ?>
                                                <?php include TEMP_CELLS . 'tempDate.php' ?>
                                                <?php include TEMP_CELLS . 'tempCharacter.php' ?>
                                                <?php include TEMP_CELLS . 'tempVehicle.php' ?>
                                                <?php include TEMP_CELLS . 'tempDuration.php' ?>
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
                                        $getBKTByPlayer->closeCursor(); 
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