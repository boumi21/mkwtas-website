<?php

// Called from managerDelete.js

include '../../php_includes/connect.php';
include 'requests.php';

try{
    # Verify if player is linked to al least one record (TAS)
    $verifyPlayerDelete->execute([
        $_GET['idPlayer']
    ]);

    $data = $verifyPlayerDelete->fetch();
    $verifyPlayerDelete->closeCursor();
    echo json_encode($data);
} catch(Exception $e){
    throw $e;
}

?>