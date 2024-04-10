<!-- Form manager for when deleting player -->

<?php

require 'imports_manage.php';

// Prevent non-admin users to call the script
logoutUserIfNotAdmin();

try {
    $bdd->beginTransaction();

    # Backup player before removing it
    $saveDeletePlayer->execute([
        $_POST['idPlayer']
    ]);

    # Remove player in DB
    $deletePlayer->execute([
        $_POST['idPlayer']
    ]);

    # Add historization
    $addPlayerAction->execute([
        $_SESSION['user_id'],
        $_SESSION['username'],
        "delete",
        $_POST['idPlayer'],
    ]);

    $bdd->commit();
    finish();
} catch (Exception $e) {
    // TODO : Handle exception
    throw $e;
}


///////////////


function finish()
{
    header("Location: ../../listPlayers.php");
}
