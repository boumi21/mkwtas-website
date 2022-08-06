<!-- Form manager for modifyPlayer.php -->

<?php

require 'imports_manage.php';

try {
    $bdd->beginTransaction();

    # Modify player in DB
    $modifyPlayer->execute([
        $_POST['name'],
        $_POST['country'],
        $_POST['idPlayer']
    ]);

    # Add historization
    $addPlayerAction->execute([
        $_SESSION['user_id'],
        $_SESSION['username'],
        "update",
        $_POST['idPlayer'],
    ]);

    $bdd->commit();
    finish();
} catch (Exception $e) {
    // Todo : Handle error
    $bdd->rollback();
    throw $e;
}

///////////////////////////////////

function finish()
{
    header("Location: ../../player.php?name=" . str_replace(' ', '_', $_POST['name']));
}
