<?php

// Called via ajax from manager.js

include '../../php_includes/connect.php';
include 'requests.php';

try{
    # Verify if player's name already exists
    $verifyPlayerAdd->execute([
        $_GET['playerName']
    ]);

    $data = $verifyPlayerAdd->fetch();
    $verifyPlayerAdd->closeCursor();
    echo json_encode($data);
} catch(Exception $e){
    throw $e;
}
