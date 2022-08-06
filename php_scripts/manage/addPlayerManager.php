<!-- Form manager for addPlayer.php -->

<?php

require 'imports_manage.php';


$trimName = trim($_POST['name']);

try {
    $bdd->beginTransaction();

    # Add player to DB
    $addPlayer->execute([
        $trimName,
        $_POST['country']
    ]);

    $id = $bdd->lastInsertId();

    # Add historization
    $addPlayerAction->execute([
        $_SESSION['user_id'],
        $_SESSION['username'],
        "create",
        $id,
    ]);

    $bdd->commit();

    # Redirect to player page
    header("Location: ../../player.php?name=" . str_replace(' ', '_', $trimName));
} catch (Exception $e) {
    // TODO : Handle exception
    $bdd->rollback();
    throw $e;
}
