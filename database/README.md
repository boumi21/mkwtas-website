# Database

This folder contains the SQL script that creates tables, indexes and insert some data.

Database Server : **MariaDB 10.3.34**

---

## Database diagram

![db_model](https://user-images.githubusercontent.com/28055187/180665119-fd4c3f36-58e2-491e-b491-b50d8f20309c.png)

### record
* Describe a TAS with all it's informations (time, character used, category...)

### record_tags
* Table that contains every existing tag (Verified, Unverified, Invalid)
* Each record is associated to one tag

### record_actions
* Historize every action made on the 'record' table (create / update / delete)

### deleted_record
* Save all deleted TAS from the 'record' table

### track
* Contains avery track in Mario Kart Wii
* Each record is associated to one track

### record_with_players
* Link records with the associated players

### player
* Describe a player with all it's informations (name, country...)

### player_actions
* Historize every action made on the 'player' table (create / update / delete)

### deleted_players
* Save all deleted players from the 'player' table

### connect_log
* Historize all connections through Discord authentication

### calendar_table
* Usefull table that serves as a calendar and allows to make joins with othe tables in SQL requests
