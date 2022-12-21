<?php

include '../../php_includes/connect.php';

# Request
$getChartRecordsPerMonth = $bdd->prepare("SELECT
COUNT(DISTINCT r.id_record) AS records, CONVERT(ca.y,char) AS year, ca.monthName AS month
FROM
record r
RIGHT JOIN calendar_table ca ON r.date_record = ca.dt
WHERE ca.dt < CURDATE()
GROUP BY ca.y, ca.m");

$getChartRecordsPerMonth->execute();
$results = $getChartRecordsPerMonth->fetchAll();

$json = json_encode($results);
echo $json;