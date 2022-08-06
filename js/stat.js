/**
 * Used in stats.php
 */


$(function () {
    listenToggleNav();
})

/**
 * Hide or show side navigation menu
 */
function listenToggleNav() {
    $("#sidebarCollapse").on('click', function () {
        $("#sidebar_stat").toggleClass('active');
    });
}






/****************************************Display selected chart ont the page******************************************************/

function displayFlaps() {
    $("#display-div").load("php_includes/templates/charts/totaltime_flaps.php");
}

function display3laps() {
    $("#display-div").load("php_includes/templates/charts/totaltime_3laps.php");
}

function displayTotalNumberRecords() {
    $("#display-div").load("php_includes/templates/charts/playersRanking.php");
}

function displayTotalNumberTracks() {
    $("#display-div").load("php_includes/templates/charts/playersRanking_tracks.php");
}

function displayRecordsPerMonth() {
    $("#display-div").load("php_includes/templates/charts/activity_recordsPerMonth.php");
}

function displayRecordsPerYear() {
    $("#display-div").load("php_includes/templates/charts/activity_recordsPerYear.php");
}

function displayPlayersPerYear() {
    $("#display-div").load("php_includes/templates/charts/activity_playersPerYear.php");
}