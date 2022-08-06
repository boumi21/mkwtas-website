<?php

include '../../php_includes/connect.php';

# Request
$getChartRecordsPerYear = $bdd->prepare("SELECT
YEAR(r.date_record) AS year,
COUNT(*) AS records
FROM
record r
GROUP BY
YEAR(r.date_record)");

$getChartRecordsPerYear->execute();
$results = $getChartRecordsPerYear->fetchAll();

$json = json_encode($results);
echo $json;