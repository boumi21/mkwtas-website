<?php

// Usefull functions for the managers

/**
 * Return true if the category is a flap
 */
function isFlap($category)
{
    return ($category == "flap" || $category == "flap_no_glitch" || $category == "flap_no_cut");
}

/**
 * Format the code correctly for the DB
 */
function formatTime($time)
{
    return "00:0" . $time;
}

/**
 * Upload the ghost file on the server
 */
function uploadRkg($idRecord)
{
    $target_dir = "../../uploads/";
    $target_file = $target_dir . changeFileName($idRecord);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["rkgfile"]["size"] > 2000000) {
        throw new Exception("File too big (max 2Mo)", 1001);
    }

    // Allow certain file formats
    if ($fileType != "rkg") {
        throw new Exception("Invalid fyle type", 1002);
    }

    // Upload file on the server & display error if something went wrong
    if (!move_uploaded_file($_FILES["rkgfile"]["tmp_name"], $target_file)) {
        throw new Exception("Error while uploading file", 1999);
    }
}

/**
 * Create filename with :
 * <$idrecord>.rkg
 */
function changeFileName($idRecord)
{
    $temp = explode(".", $_FILES["rkgfile"]["name"]);
    $newfilename = $idRecord . '.' . end($temp);
    return $newfilename;
}
