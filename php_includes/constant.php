<?php

$discordConfig = parse_ini_file(__DIR__ . '/../settings/config.ini', true)['discord'];


// USEFULL CONSTANTS //

// Specify your website folder (only for development, "/" in production)
// e.g : If your website is at ".../htdocs/website/" , then put "/website/"
define('SITE_FOLDER', "/mkwtas-website/");

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . SITE_FOLDER);

define('UPLOADS', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . SITE_FOLDER . 'uploads/');

define('TEMP', SITE_ROOT . 'php_includes/templates/');

define('TEMP_CELLS', SITE_ROOT . 'php_includes/templates/cells/');

define('TEMP_THEAD', SITE_ROOT . 'php_includes/templates/thead/');

define('TEMP_CHARTS', SITE_ROOT . 'php_includes/templates/charts/');

define('MODAL', SITE_ROOT . 'php_includes/modals/');

define('AUTHENT_SCRIPTS', SITE_ROOT . 'php_scripts/authentication/');

define('PHP_SCRIPTS', SITE_ROOT . 'php_scripts/');

define('PHP_INCLUDES', SITE_ROOT . 'php_includes/');

define('DB_CONNECT', SITE_ROOT . 'php_includes/connect.php');

define('UTILS_PHP', SITE_ROOT . 'php_includes/utils.php');

define('SETTINGS', SITE_ROOT . 'settings/');

define('LOGIN_URL', $discordConfig['login_url']);

define('DISCORD_ID', $discordConfig['id']);

define('DISCORD_SECRET', $discordConfig['secret']);

define('DISCORD_ADMINS', $discordConfig['admins']);

define('GITHUB_REPO', 'https://github.com/boumi21/mkwtas-website');



// USEFULL STRINGS //

$unverifiedDesc = "This run is unconfirmed to sync on a console.";
$invalidDesc = "This run does not sync on a console.";
$flapNoBktDesc = "At least one lap from the 3lap BKT is faster than this Flap.";
