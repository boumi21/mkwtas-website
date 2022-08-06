<?php
/* Discord Oauth v.4.0
 * This file will logout a user logged in via the oauth.
 * @author : MarkisDev
 * @copyright : https://markis.dev
 */

# Including all the required scripts for demo
require "functions.php";

# Starting the session
session_start();

# Closing the session and deleting all values associated with the session
session_destroy();

// Add GET parameter if user is logged out because no rights
$noAdmin = (isset($_GET['logout'])) ? "?logout=noAdmin" : "";

# Redirecting the user back to login page
redirect("../../menu.php" . $noAdmin);

?>
