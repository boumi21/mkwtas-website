<?php
$trackNameUnderscore = str_replace(' ', '_', $data['name_track']);
?>

<td>
    <span>
        <a href="modifyTas.php?record=<?php echo $data['id_record']; ?>"><span class="text-info">
                <i class="fas fa-edit mr-2"></i></span></a>
        <span>
            <a href="#modal-delete-tas" data-toggle="modal" data-target="#modal-delete-tas" data-time="<?php echo $data['time_record']; ?>" data-track="<?php echo $trackNameUnderscore; ?>" data-record="<?php echo $data['id_record']; ?>">
                <span class="text-danger"><i class="fas fa-trash-alt"></i></span></a>
        </span>
    </span>
</td>