<?php

include '../../php_includes/connect.php';

# Request
$getChartRecordsPerYear = $bdd->prepare("SELECT
CONVERT(YEAR(r.date_record),char) AS year,
COUNT(*) AS records
FROM
record r
GROUP BY
YEAR(r.date_record)");

$getChartRecordsPerYear->execute();
$results = $getChartRecordsPerYear->fetchAll();

$json = json_encode($results);
echo $json;