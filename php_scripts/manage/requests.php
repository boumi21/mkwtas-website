<?php

// Requests to database used in the "manage" folder

# Add a new record (TAS)
$addRecord = $bdd->prepare("
INSERT INTO record VALUES
(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

# Modify an existing record (TAS)
$modifyRecord = $bdd->prepare("
UPDATE record
SET 
time_record = ?,
date_record = ?,
charac = ?,
vehicle = ?,
type_record = ?,
link = ?,
id_track = ?,
id_tag = ?,
lap1 = ?,
lap2 = ?,
lap3 = ?,
date_option = ?,
is_supergrind = ?,
flap_no_bkt = ?
WHERE id_record = ?
");

# Remove a record (TAS)
$deleteRecord = $bdd->prepare("
DELETE FROM record WHERE id_record = ?
");

# Save an existing record (TAS) in a "backup" table
$saveDeleteRecord = $bdd->prepare("
INSERT INTO deleted_record
SELECT r.*
FROM record r
WHERE r.id_record = ?;
");

# Add a new historic event in the historization table. On add / update / remove a TAS
$addRecordAction = $bdd->prepare("
INSERT INTO record_actions VALUES
(null, ?, ?, ?, ?, null)
");

# Add a relation between a record (TAS) and a player
$addPossede = $bdd->prepare("
INSERT INTO record_with_players VALUES
(?, ?)
");

# Remove a relation between a record (TAS) and a player
$deletePossede = $bdd->prepare("
DELETE FROM record_with_players
WHERE id_record = ?
");

# Add a new player
$addPlayer = $bdd->prepare("
INSERT INTO player VALUES
(null, ?, UPPER(?))
");

# Modify an existing player
$modifyPlayer = $bdd->prepare("
UPDATE player
SET 
name_player = ?,
country = UPPER(?)
WHERE id_player = ?
");

# Remove a player
$deletePlayer = $bdd->prepare("
DELETE FROM player
WHERE id_player = ?
");

# Save an existing player in a "backup" table
$saveDeletePlayer = $bdd->prepare("
INSERT INTO deleted_player
SELECT j.*
FROM player j
WHERE j.id_player = ?;
");

# Add a new historic event in the historization table. On add / update / remove a player
$addPlayerAction = $bdd->prepare("
INSERT INTO player_actions VALUES
(null, ?, ?, ?, ?, null)
");

# Verify if a player has at least one relation with a record (TAS)
$verifyPlayerDelete = $bdd->prepare("
SELECT 
EXISTS(SELECT * FROM record_with_players WHERE id_player = ?) as 'hasRecord'
");

# Verify if a player's name already exists
$verifyPlayerAdd = $bdd->prepare("
SELECT EXISTS(SELECT * FROM player WHERE name_player = ?) as 'playerExists'
");