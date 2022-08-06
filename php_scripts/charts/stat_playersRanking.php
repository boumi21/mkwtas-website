<?php
const FIRST_YEAR = 2009;

function getPlayersRanking($getplayersRankingQuery)
{

  $actualPLayer = ""; // Actual player on the database record
  $firstYear = FIRST_YEAR;
  $lastYear = (int)date('Y');
  $playersRankingValues = array(); // final array with arranged values

  $getplayersRankingQuery->execute();
  while ($data = $getplayersRankingQuery->fetch()) {
    if ($actualPLayer != $data['name_player']) // If player changes
    {
      if (isset($arrayDataPlayer) and isset($sumNumberRecords)) {
        $arrayDataPlayer['totalRecordsPlayer'] = $sumNumberRecords;
        array_push($playersRankingValues, $arrayDataPlayer); // We push the data of previous player in the final array
      }

      // We create a new array filled with zer0s
      $arrayDataPlayer = array();
      for ($i = $firstYear; $firstYear <= $lastYear; $firstYear++) {
        $arrayDataPlayer[$firstYear] = 0;
      }
      $sumNumberRecords = 0;

      // We add the player name
      $arrayDataPlayer['player'] = $data['name_player'];

      // We reset data
      $actualPLayer = $data['name_player'];
      $firstYear = FIRST_YEAR;
    }
    // We add sql row for the selected year
    $arrayDataPlayer[$data['year']] = $data['year_tas'];
    $sumNumberRecords = $sumNumberRecords + $data['year_tas'];
  }
  $getplayersRankingQuery->closeCursor();

  //We push the data of last player in the final array
  if (isset($arrayDataPlayer) and isset($sumNumberRecords)) {
    $arrayDataPlayer['totalRecordsPlayer'] = $sumNumberRecords;
    array_push($playersRankingValues, $arrayDataPlayer); // We push the data of previous player in the final array!!!!!!!!
  }

  // We sort the array by total number of records by player
  array_multisort(array_column($playersRankingValues, 'totalRecordsPlayer'), SORT_DESC, $playersRankingValues);

  return $playersRankingValues;
}
