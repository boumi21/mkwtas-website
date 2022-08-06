<?php
include '../../connect.php';
include '../../../php_scripts/db_requests.php';
include '../../../php_scripts/charts/stat_playersRanking.php';
?>


<?php
$playersRanking = getPlayersRanking($getplayersRanking);
?>

<!-- HTML -->
<h2 class="text-center mt-2 font-weight-bold">Total Number of BKTs</h2>

<table id="table_playersRanking" class="table table-sm table-bordered mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Player</th>
            <th scope="col">Total</th>
            <?php
            $firstYear = 2009;
            $lastYear = (int)date('Y');
            for ($i = $firstYear; $firstYear <= $lastYear; $firstYear++) {
                echo '<th scope="col">' . $firstYear . '</th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($playersRanking); $i++) {
        ?>
            <tr>
                <th scope="row"><?php echo $i + 1; ?></th>
                <td><?php echo "<a href=player.php?name=" . str_replace(' ', '_', $playersRanking[$i]['player']) . ">" . $playersRanking[$i]['player'] . "</a>"; ?>
                </td>
                <td><?php echo $playersRanking[$i]['totalRecordsPlayer']; ?></td>
                <?php
                $firstYear = 2009;
                $lastYear = (int)date('Y');
                for ($j = $firstYear; $firstYear <= $lastYear; $firstYear++) {
                    if ($playersRanking[$i][$firstYear] == 0) {
                        echo '<td class="text-white-50">' . $playersRanking[$i][$firstYear] . '</td>';
                    } else {
                        echo '<td>' . $playersRanking[$i][$firstYear] . '</td>';
                    }
                }
                ?>
            </tr>
        <?php } ?>
    </tbody>
</table>