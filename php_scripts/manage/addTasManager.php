<!-- Form manager for addTas.php -->

<?php

require 'imports_manage.php';

include PHP_INCLUDES . 'utils.php';

// Prevent non-admin users to call the script
logoutUserIfNotAdmin();

$possedeArray = array();

try {
    $bdd->beginTransaction();

    $isFlap = isFlap($_POST['category']);

    # Add TAS in DB
    $addRecord->execute([
        formatTime($_POST['time']),
        $_POST['date'],
        $_POST['character'],
        $_POST['vehicle'],
        $_POST['category'],
        $_POST['url'],
        $_POST['track'],
        $_POST['tag'],
        (!isset($_POST['lap1']) || $_POST['lap1'] != "" && !$isFlap) ? $_POST['lap1'] : null,
        (!isset($_POST['lap2']) || $_POST['lap2'] != "" && !$isFlap) ? $_POST['lap2'] : null,
        (!isset($_POST['lap3']) || $_POST['lap3'] != "" && !$isFlap) ? $_POST['lap3'] : null,
        (!isset($_POST['approxDate']) || $_POST['approxDate'] != "") ? $_POST['approxDate'] : null,
        (isset($_POST['supergrind'])) ? true : false,
        (isset($_POST['flapNoBkt']) && $isFlap) ? true : false,
    ]);

    $id = $bdd->lastInsertId();

    # Add Historization
    $addRecordAction->execute([
        $_SESSION['user_id'],
        $_SESSION['username'],
        "create",
        $id,
    ]);

    # Create array with players associated with the record
    foreach ($_POST['players'] as $idPlayer) {
        $playerWithRecord = array($id, $idPlayer);
        array_push($possedeArray, $playerWithRecord);
    }

    # Add the relation between the record and the players in DB
    foreach ($possedeArray as $row) {
        $addPossede->execute($row);
    }

    # Upload the ghost file on the server if there is no error
    if ($_FILES['rkgfile']['error'] == UPLOAD_ERR_OK) {
        uploadRkg($id);
    }

    $bdd->commit();
    finish();
} catch (Exception $e) {
    $bdd->rollback();
    header('Location: ../../addTas.php?error=' . $e->getCode());
}



///////////////


function finish()
{
    $arrayTracks = getTracks();
    $trackName = $arrayTracks[$_POST['track']];
    header("Location: ../../track.php?name=" . str_replace(' ', '_', $trackName) . "#" . $_POST['category']);
}
