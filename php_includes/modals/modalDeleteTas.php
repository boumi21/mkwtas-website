<div class="modal fade" id="modal-delete-tas" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form-delete-tas" action="php_scripts/manage/deleteTasManager.php" method="POST">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span id="text-delete-tas">Are you sure to delete TAS...</span>

                    <input id="hidden-id-record" name="idRecord" type="hidden">
                    <input id="hidden-url" name="url" type="hidden">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete <i class="fas fa-exclamation"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>