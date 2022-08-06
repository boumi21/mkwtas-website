<td>
    <div class="read-more overflow-hidden">
        <?php
        $getPlayersFromTAS->execute(array($data['id_record']));
        while ($data2 = $getPlayersFromTAS->fetch()) {
            echo "<a href=player.php?name=" . str_replace(' ', '_', $data2['name_player']) . ">" . $data2['name_player'] . "</a></br>";
        }
        ?>
    </div>
</td>