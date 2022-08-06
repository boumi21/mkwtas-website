/**
 * Used in listPlayers.php
 */

$(function () {
    searchPlayers();
});

// Search method for list player's page
function searchPlayers() {
    $("#input_searchPlayer").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#listPlayers li").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
}
