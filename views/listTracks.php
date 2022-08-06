<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

includeHeader(array(
    'description' => "Browse all Tracks in Mario Kart Wii.",
    'title' => "Browse Tracks - mkwtas"
));
?>

<body>

    <?php include 'php_includes/nav.php' ?>

    <?php
    $allTracks = getTracks();
    $allTracksDivided = array_chunk($allTracks, 4, true);
    $allTracksDividedNewAndRetro = array_chunk($allTracksDivided, 4);
    ?>

    <h2 class="text-center title-open mt-3 mb-5">Official Tracks from Mario Kart Wii</h2>

    <div class="container-fluid mt-2">
        <?php
        foreach ($allTracksDividedNewAndRetro as $keyNewOrRetro => $NewOrRetro) {
        ?>
            <div class="row">
                <?php
                foreach ($NewOrRetro as $keyGrandPrix => $grandPrix) {
                ?>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card mb-4">
                            <img class="card-img-top" src="assets/img/grand-prix/<?php echo $keyNewOrRetro . $keyGrandPrix ?>.jpg" alt="Card image cap">
                            <ul class="list-group list-group-flush ul-listTracks">
                                <?php
                                foreach ($grandPrix as $keyTrack => $track) {
                                    echo "<a class='links-listTracks' href=track.php?name=" . str_replace(' ', '_', $track) . "><li class='list-group-item li-listTracks'>" . $track . "</li></a>";
                                } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</body>

</html>