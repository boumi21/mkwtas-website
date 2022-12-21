<?php

include '../../php_includes/connect.php';

# Request
$getChartPlayersPerYear = $bdd->prepare("SELECT CONVERT(YEAR(r.date_record),char) AS year, COUNT(DISTINCT j.id_player) AS players, 0 as source_column
FROM player j
INNER JOIN record_with_players p ON j.id_player = p.id_player
INNER JOIN  record r ON p.id_record = r.id_record
GROUP BY
YEAR(r.date_record)

UNION ALL

SELECT YEAR(r.date_record) AS year, COUNT(DISTINCT j.id_player) AS players, 1 as source_column
FROM player j
INNER JOIN record_with_players p ON j.id_player = p.id_player
INNER JOIN  record r ON p.id_record = r.id_record
WHERE
j.id_player NOT IN (
    SELECT DISTINCT j.id_player
    FROM player j
    INNER JOIN record_with_players p ON j.id_player = p.id_player
	INNER JOIN  record re ON p.id_record = re.id_record
    WHERE YEAR(re.date_record) < YEAR(r.date_record)
    )
GROUP BY
YEAR(r.date_record)");


#Variables
$arrayTotalPlayers = array();
$arrayNewPlayers = array();
$arrayYears = getArrayYears();
$arrayFinalValues = array();

$getChartPlayersPerYear->execute();
while ($data = $getChartPlayersPerYear->fetch()) {
    if ($data['source_column'] == 0) {
        array_push($arrayTotalPlayers, $data);
    } else {
        $arrayNewPlayers[$data['year']] = $data;
    }
}
$getChartPlayersPerYear->closeCursor();

foreach ($arrayTotalPlayers as $key => $totalPlayers) {
    if (array_key_exists($totalPlayers['year'], $arrayNewPlayers)) {
        $arrayTotalPlayers[$key] += ["newplayers" => $arrayNewPlayers[$totalPlayers['year']]['players']];
    } else {
        $arrayTotalPlayers[$key] += ["newplayers" => 0];
    }
}


$json = json_encode($arrayTotalPlayers);
echo $json;

/**
 * Create an array with every year from 2009 until today
 */
function getArrayYears()
{
    $firstYear = 2009;
    $lastYear = (int)date('Y');
    $arrayYears = array();

    for ($i = $firstYear; $firstYear <= $lastYear; $firstYear++) {
        $arrayYears[$i] = $firstYear;
    }
    return $arrayYears;
}
