<div class="modal fade" id="modal-delete-player" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form-delete-player" action="php_scripts/manage/deletePlayerManager.php" method="POST">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span>Are you sure to delete player <b><?php echo $playerName ?></b>?</span>

                    <input id="hidden-id-joueur" name="idPlayer" type="hidden" value="<?php echo $data['id_player']; ?>">
                    <div id="validation-no-record" class="text-danger hide-element">
                        Cannot delete player with record(s)
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete <i class="fas fa-exclamation"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>