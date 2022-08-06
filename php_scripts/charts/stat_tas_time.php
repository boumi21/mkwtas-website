<?php

include '../../php_includes/connect.php';

# Request
$getChartTotalTime = $bdd->prepare("SELECT dt AS x, LEFT(total_time, LENGTH(total_time)-4) AS y FROM (
    SELECT ((SUM(TIME_TO_SEC( best_temps)))*1000) AS total_time, dt FROM (
    SELECT MIN(re.time_record) AS best_temps, re.id_track, ca.dt
                                        FROM record AS re 
                                        CROSS JOIN calendar_table AS ca
                                         WHERE (type_record = 'classic' OR type_record = 'no_glitch' OR type_record = 'no_cut')
                                         AND date_record <= ca.dt
                                         AND (dt BETWEEN '2011-03-24' AND CURDATE())
                                        GROUP BY ca.dt, re.id_track ) AS T1 GROUP BY dt ) AS T2");


$getChartTotalTime->execute();
$results = $getChartTotalTime->fetchAll();

$json = json_encode($results, JSON_NUMERIC_CHECK);
echo $json;
