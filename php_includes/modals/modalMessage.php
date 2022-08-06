<!-- Sending message through the form is now removed.-->
<!-- TODO : Implement a new system for feedback / messages -->

<div id="modalMessage" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Report error / Send message</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <!-- <div class="form-group">
                        <label for="email">Email address if you want a reply <i>(optional)</i></label>
                        <input type="email" class="form-control" name="emailSentFrom" placeholder="yourEmail@whatever (optional)" id="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Errors, improvements, kind words...</label>
                        <textarea class="form-control" name="emailText" placeholder="Type anything here!" id="exampleFormControlTextarea1"></textarea>
                    </div> -->
                    <div class="text-center"><i class="fas fa-ban"></i> Sending message from mkwtas is disabled right now <i class="fas fa-ban"></i></div>
                    <hr>
                    <div class="mb-4">
                        <p class="person-logo">You can always contact me on Discord</p><img src="assets/img/svg/discord2.svg" class="person-logo" width="30" alt="">
                        <p class="person-logo">boumi21#6868</p>
                    </div>
                    <hr>
                    <div>
                        <p class="text-center">Or report an issue on Github</p>
                        <a href="<?php echo GITHUB_REPO ?>"><img src="assets/img/github.png" class="zoom-image d-block mx-auto" width="50px"></a>
                    </div>

                    <!-- <button type="submit" name="submitButton" id="email-submitButton" class="btn btn-primary d-block mx-auto mt-3">Submit <i class="far fa-paper-plane"></i></button> -->
                </form>

            </div>
        </div>

    </div>
</div>