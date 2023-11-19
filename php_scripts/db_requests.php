<?php

// Database requests in SQL
// Good luck with some of the requests ( ͡ಥ ͜ʖ ͡ಥ)

/*** Select all BKT from a category ***/
$getBktFromCategory = $bdd->prepare('SELECT *
,RIGHT(duree, LENGTH(duree) - 4) AS time_record
,(
	SELECT RIGHT(TIMEDIFF(r.time_record, b.duree), LENGTH(b.duree) - 4)
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) cut
,(
	SELECT r.link
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) prev_lien
FROM (
SELECT RIGHT(lap1, LENGTH(lap1) - 6) AS lap1
	,RIGHT(lap2, LENGTH(lap2) - 6) AS lap2
	,RIGHT(lap3, LENGTH(lap3) - 6) AS lap3
	,name_track
	,time_record AS duree
	,date_record
	,DATEDIFF(CURRENT_DATE (), date_record) AS duration
	,type_record
	,link
	,charac
	,date_option
	,flap_no_bkt
	,vehicle
	,is_supergrind
	,r.id_track
	,r.id_tag
	,rt.NAME AS tag_name
	,r.id_record AS id_record
FROM record AS r
INNER JOIN record_with_players AS p ON r.id_record = p.id_record
INNER JOIN player AS j ON p.id_player = j.id_player
INNER JOIN track AS c ON r.id_track = c.id_track
INNER JOIN record_tags AS rt ON r.id_tag = rt.id_record_tags
INNER JOIN (
	SELECT MIN(time_record) AS best_temps
	FROM record AS re
	WHERE type_record = ?
	GROUP BY re.id_track
	) r ON time_record = r.best_temps
WHERE type_record = ?
GROUP BY c.id_track
ORDER BY c.id_track
) b

');




/*** Select all TASes from a player ***/
$getAllByPlayer = $bdd->prepare('SELECT *
,RIGHT(duree, LENGTH(duree) - 4) AS time_record
,(
	SELECT RIGHT(TIMEDIFF(r.time_record, b.duree), LENGTH(b.duree) - 4)
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) cut
,(
	SELECT r.link
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) prev_lien
FROM (
SELECT RIGHT(lap1, LENGTH(lap1) - 6) AS lap1
	,RIGHT(lap2, LENGTH(lap2) - 6) AS lap2
	,RIGHT(lap3, LENGTH(lap3) - 6) AS lap3
	,name_track
	,time_record AS duree
	,date_record
	,DATEDIFF(CURRENT_DATE (), date_record) AS duration
	,type_record
	,link
	,charac
	,date_option
	,vehicle
	,flap_no_bkt
	,is_supergrind
	,r.id_track
	,r.id_tag
	,rt.NAME AS tag_name
	,r.id_record AS id_record
FROM record AS r
INNER JOIN record_with_players AS p ON r.id_record = p.id_record
INNER JOIN player AS j ON p.id_player = j.id_player
INNER JOIN track AS c ON r.id_track = c.id_track
INNER JOIN record_tags AS rt ON r.id_tag = rt.id_record_tags
WHERE name_player = ?
ORDER BY date_record
	,time_record DESC
) b
');



/*** Select all BKT from a player ***/
$getBKTByPlayer = $bdd->prepare('SELECT *
,RIGHT(duree, LENGTH(duree) - 4) AS time_record
,(
	SELECT RIGHT(TIMEDIFF(r.time_record, b.duree), LENGTH(b.duree) - 4)
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) cut
,(
	SELECT r.link
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) prev_lien
FROM (
SELECT RIGHT(lap1, LENGTH(lap1) - 6) AS lap1
	,RIGHT(lap2, LENGTH(lap2) - 6) AS lap2
	,RIGHT(lap3, LENGTH(lap3) - 6) AS lap3
	,cir.name_track
	,time_record AS duree
	,t1.date_record
	,DATEDIFF(CURRENT_DATE (), t1.date_record) AS duration
	,t1.type_record
	,t1.link
	,t1.charac
	,t1.flap_no_bkt
	,t1.date_option
	,t1.vehicle
	,t1.id_track
	,t1.id_tag
	,rt.NAME AS tag_name
	,t1.is_supergrind
	,t1.id_record
FROM record t1
INNER JOIN (
	SELECT MIN(time_record) AS min_value
		,type_record
	FROM record
	GROUP BY type_record
		,id_track
	) AS t2 ON t1.type_record = t2.type_record
	AND t1.time_record = t2.min_value
INNER JOIN record_with_players pos ON t1.id_record = pos.id_record
INNER JOIN track cir ON t1.id_track = cir.id_track
INNER JOIN record_tags AS rt ON t1.id_tag = rt.id_record_tags
INNER JOIN player joue ON pos.id_player = joue.id_player
WHERE joue.name_player = ?
ORDER BY t1.date_record
	,time_record DESC
) b
');



/*****Select all players from database********/
$getAllPlayers = $bdd->prepare('
	SELECT name_player, id_player, country
	FROM player
	ORDER BY name_player'
);

/*****Count all players in the database*******/
$countAllPlayers = $bdd->prepare('
	SELECT COUNT(name_player) AS nbrJoueurs
	FROM player'
);



/*** Select all players that participated in a TAS ***/
$getPlayersFromTAS = $bdd->prepare('SELECT name_player
FROM player AS j
INNER JOIN record_with_players AS p ON j.id_player = p.id_player
WHERE id_record IN (
		SELECT id_record
		FROM record_with_players
		WHERE id_record = ?
		)
');


/*** Select all players that participated in a TAS ***/
$getIdPlayersFromTAS = $bdd->prepare('SELECT j.id_player
FROM player AS j
INNER JOIN record_with_players AS p ON j.id_player = p.id_player
WHERE id_record IN (
		SELECT id_record
		FROM record_with_players
		WHERE id_record = ?
		)
');



/*** Select all TASes ***/
$getAllTASBKT = $bdd->prepare('SELECT *
,RIGHT(duree, LENGTH(duree) - 4) AS time_record
,(
	SELECT RIGHT(TIMEDIFF(r.time_record, b.duree), LENGTH(b.duree) - 4)
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) cut
,(
	SELECT r.link
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) prev_lien
FROM (
SELECT RIGHT(lap1, LENGTH(lap1) - 6) AS lap1
	,RIGHT(lap2, LENGTH(lap2) - 6) AS lap2
	,RIGHT(lap3, LENGTH(lap3) - 6) AS lap3
	,name_track
	,time_record AS duree
	,date_record
	,DATEDIFF(CURRENT_DATE (), date_record) AS duration
	,type_record
	,link
	,charac
	,flap_no_bkt
	,date_option
	,vehicle
	,is_supergrind
	,r.id_track
	,r.id_tag
	,rt.NAME AS tag_name
	,r.id_record AS id_record
FROM record AS r
INNER JOIN record_with_players AS p ON r.id_record = p.id_record
INNER JOIN player AS j ON p.id_player = j.id_player
INNER JOIN track AS c ON r.id_track = c.id_track
INNER JOIN record_tags AS rt ON r.id_tag = rt.id_record_tags
GROUP BY r.id_record
ORDER BY date_record DESC
	,time_record DESC
) b
');


/***** Select all TASes from a track and from a category ordered by date ******/
$getAllByTrackAndCategory = $bdd->prepare('SELECT *
,RIGHT(duree, LENGTH(duree) - 4) AS time_record
,(
	SELECT RIGHT(TIMEDIFF(r.time_record, b.duree), LENGTH(b.duree) - 4)
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) cut
,(
	SELECT r.link
	FROM record r
	WHERE b.duree < r.time_record
		AND r.type_record = b.type_record
		AND r.id_track = b.id_track
	ORDER BY r.time_record ASC limit 1
	) prev_lien
FROM (
SELECT RIGHT(lap1, LENGTH(lap1) - 6) AS lap1
	,RIGHT(lap2, LENGTH(lap2) - 6) AS lap2
	,RIGHT(lap3, LENGTH(lap3) - 6) AS lap3
	,name_track
	,time_record AS duree
	,date_record
	,DATEDIFF(CURRENT_DATE (), date_record) AS duration
	,type_record
	,link
	,charac
	,flap_no_bkt
	,date_option
	,vehicle
	,is_supergrind
	,r.id_track
	,r.id_tag
	,rt.NAME AS tag_name
	,r.id_record AS id_record
FROM record AS r
INNER JOIN record_with_players AS p ON r.id_record = p.id_record
INNER JOIN player AS j ON p.id_player = j.id_player
INNER JOIN track AS c ON r.id_track = c.id_track
INNER JOIN record_tags AS rt ON r.id_tag = rt.id_record_tags
WHERE name_track = ?
	AND type_record = ?
GROUP BY r.id_record
ORDER BY date_record
	,time_record DESC
) b
');



/*** Select all players that hold at least a BKT in 3 LAPS and count them ***/
$getCountRecords3Laps = $bdd->prepare('SELECT name_player
,SUM(nbrRecord) AS totalRecord
FROM (
(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "classic"
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "classic"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)

UNION ALL

(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "no_glitch"
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "no_glitch"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)

UNION ALL

(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "no_cut"
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "no_cut"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)
) r
GROUP BY name_player
ORDER BY totalRecord DESC
');



/*** Select all players that hold at least a BKT in FLAPS and count them ***/
$getCountRecordsFlaps = $bdd->prepare('SELECT name_player
,SUM(nbrRecord) AS totalRecord
FROM (
(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "flap"
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "flap"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)

UNION ALL

(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "flap_no_glitch"
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "flap_no_glitch"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)

UNION ALL

(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "flap_no_cut"
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "flap_no_cut"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)
) r
GROUP BY name_player
ORDER BY totalRecord DESC
');



/*** Select info from player ***/
$getInfoPlayer = $bdd->prepare('
SELECT country, id_player
FROM player AS j
WHERE name_player = ?
');


/*** Select info from TAS ***/
$getInfoTAS = $bdd->prepare("SELECT r.id_track
	,charac
	,vehicle
	,RIGHT(time_record, LENGTH(time_record) - 4) AS time_record
	,lap1
	,lap2
	,lap3
	,type_record
	,date_record
	,link
	,date_option
	,is_supergrind
	,flap_no_bkt
	,r.id_tag
FROM record AS r
WHERE r.id_record = ?
");




/*********************************************Main-Menu***************************************************** */


/*** Select last 3 TASes ***/
$getLastBKTs = $bdd->prepare('SELECT name_track
,RIGHT(time_record, LENGTH(time_record) - 4) AS time_record
,type_record
,date_record
,link
,date_option
,is_supergrind
,r.id_tag
,rt.NAME AS tag_name
,flap_no_bkt
FROM record AS r
INNER JOIN record_with_players AS p ON r.id_record = p.id_record
INNER JOIN player AS j ON p.id_player = j.id_player
INNER JOIN track AS c ON r.id_track = c.id_track
INNER JOIN record_tags AS rt ON r.id_tag = rt.id_record_tags
GROUP BY r.id_record
ORDER BY date_record DESC
,time_record DESC LIMIT 3
');


/*****Select 3 random players from database********/
$getRandomPlayers = $bdd->prepare('
	SELECT name_player
	FROM player
	ORDER BY RAND()
	LIMIT 3'
);



/*********************************************Statistics***************************************************** */


/*** Select total number of TASes group by player and year (number of TASes with year if active, 0 with null date if inactive) */
$getplayersRanking = $bdd->prepare('SELECT j.name_player
	,YEAR(r.date_record) AS year
	,COUNT(r.id_record) AS year_tas
FROM player j
INNER JOIN record_with_players p ON j.id_player = p.id_player
LEFT JOIN record r ON p.id_record = r.id_record
	AND YEAR(r.date_record) BETWEEN "2009"
		AND YEAR(CURDATE())
GROUP BY j.name_player
	,YEAR(r.date_record)
');




/**********************************************************************************************************/
/***********************SNAPSHOT********************************/


/*** Select all BKT from 3 Laps or flaps ***/
$getAllSnapshot = $bdd->prepare('SELECT *
,RIGHT(duree, LENGTH(duree) - 4) AS time_record
,(
	SELECT RIGHT(TIMEDIFF(r1.time_record, b.duree), LENGTH(b.duree) - 4)
	FROM record r1
	WHERE b.duree < r1.time_record
		AND r1.type_record = b.type_record
		AND r1.id_track = b.id_track
	ORDER BY r1.time_record ASC limit 1
	) cut
,(
	SELECT r2.link
	FROM record r2
	WHERE b.duree < r2.time_record
		AND r2.type_record = b.type_record
		AND r2.id_track = b.id_track
	ORDER BY r2.time_record ASC limit 1
	) prev_lien
FROM (
SELECT RIGHT(lap1, LENGTH(lap1) - 6) AS lap1
	,RIGHT(lap2, LENGTH(lap2) - 6) AS lap2
	,RIGHT(lap3, LENGTH(lap3) - 6) AS lap3
	,name_track
	,time_record AS duree
	,date_record
	,DATEDIFF(?, date_record) AS duration
	,type_record
	,link
	,charac
	,date_option
	,vehicle
	,is_supergrind
	,r3.id_track
	,r3.id_tag
	,rt.NAME AS tag_name
	,r3.flap_no_bkt
	,r3.id_record AS id_record
FROM record AS r3
INNER JOIN record_with_players AS p ON r3.id_record = p.id_record
INNER JOIN player AS j ON p.id_player = j.id_player
INNER JOIN track AS c ON r3.id_track = c.id_track
INNER JOIN record_tags AS rt ON r3.id_tag = rt.id_record_tags
INNER JOIN (
	SELECT MIN(time_record) AS best_temps
		,re.id_track
	FROM record AS re
	WHERE (
			type_record = ?
			OR type_record = ?
			OR type_record = ?
			)
		AND date_record <= ?
	GROUP BY re.id_track
	) r ON time_record = best_temps
	AND r3.id_track = r.id_track
GROUP BY c.id_track
ORDER BY c.id_track
) b
');




/***Count total time from 3 laps or flaps (ACTUAL BKT ONLY) ***/
$getTimeSnapshot = $bdd->prepare('SELECT SEC_TO_TIME(sum(TIME_TO_SEC(CONCAT (
	"00:0"
	,time_record
	)))) AS totalTime
FROM (
SELECT name_track
,RIGHT(time_record, LENGTH(time_record) - 4) AS time_record
,date_record
,DATEDIFF(CURRENT_DATE (), date_record) AS duration
,type_record
,link
,charac
,date_option
,vehicle
,r.id_record AS id_record
FROM record AS r
INNER JOIN record_with_players AS p ON r.id_record = p.id_record
INNER JOIN track AS c ON r.id_track = c.id_track
INNER JOIN (
SELECT MIN(time_record) AS best_temps
,re.id_track
FROM record AS re
WHERE (
type_record = ?
OR type_record = ?
OR type_record = ?
)
AND date_record <= ?
GROUP BY re.id_track
) r2 ON time_record = r2.best_temps
AND r.id_track = r2.id_track
GROUP BY c.id_track
ORDER BY c.id_track
) AS T
');



/*** Select all players that hold at least a BKT in 3 LAPS and count them ***/
$getCountRecords3LapsSnapshot = $bdd->prepare('SELECT name_player
,SUM(nbrRecord) AS totalRecord
FROM (
(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "classic"
			AND date_record <= ?
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "classic"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)

UNION ALL

(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "no_glitch"
			AND date_record < ?
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "no_glitch"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)

UNION ALL

(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "no_cut"
			AND date_record < ?
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "no_cut"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)
) r
GROUP BY name_player
ORDER BY totalRecord DESC
');


/*** Select all players that hold at least a BKT in Flaps and count them ***/
$getCountRecordsFlapsSnapshot = $bdd->prepare('SELECT name_player
,SUM(nbrRecord) AS totalRecord
FROM (
(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "flap"
			AND date_record <= ?
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "flap"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)

UNION ALL

(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "flap_no_glitch"
			AND date_record <= ?
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "flap_no_glitch"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)

UNION ALL

(
	SELECT name_player
		,COUNT(r.id_record) AS nbrRecord
		,type_record
		,time_record
	FROM record AS r
	INNER JOIN record_with_players AS p ON r.id_record = p.id_record
	INNER JOIN player AS j ON p.id_player = j.id_player
	INNER JOIN (
		SELECT MIN(time_record) AS best_temps
		FROM record AS re
		WHERE type_record = "flap_no_cut"
			AND date_record <= ?
		GROUP BY re.id_track
		) r ON time_record = r.best_temps
	WHERE type_record = "flap_no_cut"
	GROUP BY j.name_player
	ORDER BY nbrRecord DESC
	)
) r
GROUP BY name_player
ORDER BY totalRecord DESC
');
