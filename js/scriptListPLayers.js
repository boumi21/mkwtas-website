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
        $("#listPlayers a").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });

        if ($("#listPlayers_noResult").length !== 0){
            $("#listPlayers_noResult").remove();
        }
        if (areAllChidrenHidden($("#listPlayers"))){
            $("#listPlayers").append("<span id='listPlayers_noResult'>No result</span>");
        }
    });
}


// Verify if all children are hidden for a given element
function areAllChidrenHidden(element){
    all_are_hidden = true;
    element.children().each(function(){
        if($(this).css('display') !== 'none')
        {
            all_are_hidden = false;
            return false;
        }
    });
    if (all_are_hidden) {
        return true;
    } else {
        return false;
    }
}