<td><?php
    if (!isset($data['date_record'])) {
        echo "N/A";
    } elseif (isset($data['date_option'])) {
        echo $data['date_option'];
    } else {
        echo $data['date_record'];
    }
    ?>
</td>