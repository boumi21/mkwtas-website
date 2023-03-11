<td>
    <?php

    $ghostFile = getGhostFile($data['id_record']);

    if (!is_null($ghostFile)) { ?>

        <!-- Hidden text for ghost filter -->
        <span style="display:none;">yes_ghost</span>

        <a class="btn btn-primary" href="<?php echo UPLOADS . basename($ghostFile) ?>" download id="download">Download
            <i class="fas fa-download"></i></a>
    <?php } else { ?>

        <!-- Hidden text for ghost filter -->
        <span style="display:none;">no_ghost</span>


        <span class="fa-stack fa-sm">
            <i class="fas fa-ghost fa-stack-1x"></i>
            <i class="fas fa-ban fa-stack-2x" style="color:Tomato"></i>
        </span>
    <?php } ?>
</td>
