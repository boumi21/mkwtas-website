/**
 * Used in track.php
 */

$(function () {
    autoSelectTab();
});

// Used to automatically select the correct tab depending on URL
function autoSelectTab() {
    var windowLoc = $(location).attr('pathname');
    if (windowLoc.includes("track.php")) {
        var hash = window.location.hash;
        if (hash != "") {
            $('#button-tabs a[href="' + hash + '"]').tab('show');
        }
    }
}