<?php

include '../../php_includes/connect.php';

# Request
$getChartPlayersRankingTracks = $bdd->prepare("SELECT
j.name_player,
COUNT(DISTINCT r.id_track) AS number_bkt
FROM
player j
INNER JOIN record_with_players p ON j.id_player = p.id_player
INNER JOIN record r ON p.id_record = r.id_record
GROUP BY j.id_player");

$getChartPlayersRankingTracks->execute();
$results = $getChartPlayersRankingTracks->fetchAll();

$json = json_encode($results, JSON_NUMERIC_CHECK);
echo $json;