<!-- Form manager for when deleting TAS -->

<?php

require 'imports_manage.php';

try {
    $bdd->beginTransaction();

    # Backup record before removing it
    $saveDeleteRecord->execute([
        $_POST['idRecord']
    ]);

    # Remove record in DB
    $deleteRecord->execute([
        $_POST['idRecord']
    ]);

    # Add historization
    $addRecordAction->execute([
        $_SESSION['user_id'],
        $_SESSION['username'],
        "delete",
        $_POST['idRecord'],
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
    header("Location: " . $_POST['url']);
}
