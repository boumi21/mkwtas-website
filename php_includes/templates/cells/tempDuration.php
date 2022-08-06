<td>
    <?php
    if (isset($data['date_option'])) {
        echo "<span class='approx' data-toggle='tooltip' title='Approximate duration '>" . $data['duration'] . "</span>";
    } else {
        echo $data['duration'];
    }
    ?>
</td>