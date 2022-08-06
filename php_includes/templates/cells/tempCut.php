<td>
    <?php if (isset($data['cut'])) { ?>
        <span class="time-cut">
            <?php
            if ($data['prev_lien'] == '') {
                echo "-" . $data['cut'];
            } else {
                echo "<a href=" . $data['prev_lien'] . " target='_blank' rel='noopener'>-" . $data['cut'];
            ?>
        </span>
    <?php } ?></a>
<?php } ?>
</td>