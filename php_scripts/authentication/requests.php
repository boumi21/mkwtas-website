<!-- DB requests related to authentication -->

<?php

# Log every attempt to connect through Discord
$addConnectLog = $bdd->prepare("
INSERT INTO connect_log VALUES
(null, ?, ?, ?, ?, null)
");