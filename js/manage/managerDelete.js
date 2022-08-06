/* Script for deleting TAS and player */

$(function () {

    listenSubmitDeletePlayer();

    generateInfoDeleteTas();

});

/**
 * Add the correct infos in the modal depending on which run the user clicked
 */
function generateInfoDeleteTas() {
    $('#modal-delete-tas').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal


        // Extract info from data-* attributes
        var time = button.data('time');
        var track = button.data('track');
        var idRecord = button.data('record');

        // Update the modal's content.
        var modal = $(this);
        modal.find('#text-delete-tas').html('Are you sure to delete <b>' + time + '</b> on <b>' + track + '</b>?');
        modal.find('#hidden-id-record').val(idRecord);
        modal.find('#hidden-url').val(window.location.href);
    });
}

/**
 * Call verification function when deleting a player
 */
function listenSubmitDeletePlayer() {
    $("#form-delete-player").submit(function (e) {
        var valIdPlayer = $("#hidden-id-joueur").val();

        $.ajax({
            type: 'GET',
            'async': false,
            'data': { idPlayer: valIdPlayer },
            'url': "php_scripts/manage/verifyPlayerDelete.php",
            'dataType': "json",
            'success': function (data) {
                // We do not delete the player if he still has records
                if (data['hasRecord'] > 0) {
                    e.preventDefault();
                    $('#validation-no-record').show();
                }
            }
        });
    });
}
