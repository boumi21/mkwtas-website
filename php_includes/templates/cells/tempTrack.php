<td>
    <?php
    echo "<a href=track.php?name=" . str_replace(' ', '_', $data['name_track']) . "#" . $data['type_record'] . ">" . $data['name_track'] . "</a>";
    ?>
</td>