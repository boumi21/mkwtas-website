<td>
    <?php
    if ($data['link'] == '') {
        echo $data['time_record'];
    } else {
        echo "<a href=" . $data['link'] . " target='_blank' rel='noopener'>" . $data['time_record'];
    }
    ?></a>
    <?php

    if ($data['flap_no_bkt']) {
        echo "<img class='icon-zoom mb-1 ml-1' src='assets/img/svg/snail.svg' width='22px' alt='' data-toggle='tooltip' title='At least one lap of the 3 Laps run is faster than this Flap. '>";
    }

    if ($data['is_supergrind'] == 1) {
        displaySuperGrind();
    }

    if ($data['id_tag'] == 2) {
        echo '<span class="icon-zoom mb-1 ml-1 record_tag_' . $data['tag_name'] . '" data-toggle="popover" tabindex="0" data-trigger="focus" data-content="' . $unverifiedDesc . '" title="' . $data['tag_name'] . '"></span>';
    } elseif ($data['id_tag'] == 3) {
        echo '<span class="icon-zoom mb-1 ml-1 record_tag_' . $data['tag_name'] . '" data-toggle="popover" tabindex="0" data-trigger="focus" data-content="' . $invalidDesc . '" title="' . $data['tag_name'] . '"></span>';
    } ?>

    <?php if (isUserAdmin()) { ?>
        <span class="ml-2 float-right">
            <a href="modifyTas.php?record=<?php echo $data['id_record'] ?>"><span class="text-info"><i class="fas fa-edit mr-2"></i></span></a>
            <span>
                <a href="#modal-delete-tas" data-toggle="modal" data-target="#modal-delete-tas" data-time="<?php echo $data['time_record'] ?>" data-track="<?php echo $trackName ?>" data-record="<?php echo $data['id_record'] ?>"><span class="text-danger"><i class="fas fa-trash-alt"></i></span></a>
            </span>
        </span>
    <?php } ?>
</td>