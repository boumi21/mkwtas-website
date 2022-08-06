    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filters <i class="fas fa-filter"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="filter-body" class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <p>Track : </p>
                        </div>
                        <div class="col-9">
                            <span id="trackFilter"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Category : </p>
                        </div>
                        <div class="col-9">
                            <span id="categoryFilter"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Player : </p>
                        </div>
                        <div class="col-9">
                            <span id="playerFilter"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Character : </p>
                        </div>
                        <div class="col-9">
                            <span id="characterFilter"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Vehicle : </p>
                        </div>
                        <div class="col-9">
                            <span id="vehicleFilter"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Tag : </p>
                        </div>
                        <div class="col-9">
                            <span id="tagFilter"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Ghost file : </p>
                        </div>
                        <div class="col-9">
                            <span id="ghostFilter"></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" onclick="resetAllFilters()">Reset</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>