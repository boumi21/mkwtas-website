<td>
    <?php if (isset($data['cut'])) {
        $timeCutDisplay = $data['cut'];
        if (substr($timeCutDisplay, 0, 1) == "0") {
            $timeCutDisplay = substr($timeCutDisplay, 2);
        } ?>
        <span class="time-cut">
            <?php
            if ($data['prev_lien'] == '') {
                echo $timeCutDisplay;
            } else {
                echo "<a href=" . $data['prev_lien'] . " target='_blank' rel='noopener'>" . $timeCutDisplay;
            ?>
        </span>
    <?php } ?></a>
<?php } ?>
</td>