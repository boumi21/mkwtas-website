<td>
    <?php
    if ($data['link'] == '') {
        echo $data['time_record'];
    } else {
        echo "<a href=" . $data['link'] . " target='_blank' rel='noopener'>" . $data['time_record'];
    }
    ?></a>
    <?php

    echo "<span style='display:none;'>" . $data['tag_name'] . "</span>";

    if ($data['flap_no_bkt']) {
        echo "<img class='icon-zoom mb-1 ml-1' src='assets/img/svg/snail.svg' width='22px' alt='' data-toggle='popover' tabindex='0' data-trigger='focus' data-content='" . $flapNoBktDesc . "' title='Flap no BKT'>";
    }

    if ($data['is_supergrind'] == 1) {
        displaySuperGrind();
    }

    if ($data['id_tag'] == 2) {
        echo '<span class="icon-zoom mb-1 ml-1 record_tag_' . $data['tag_name'] . '" data-toggle="popover" tabindex="0" data-trigger="focus" data-content="' . $unverifiedDesc . '" title="' . $data['tag_name'] . '"></span>';
    } elseif ($data['id_tag'] == 3) {
        echo '<span class="icon-zoom mb-1 ml-1 record_tag_' . $data['tag_name'] . '" data-toggle="popover" tabindex="0" data-trigger="focus" data-content="' . $invalidDesc . '" title="' . $data['tag_name'] . '"></span>';
    }
    ?>
</td>