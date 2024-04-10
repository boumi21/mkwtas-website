<?php

/* Discord Oauth v.4.0
 * Demo Login Script
 * @author : MarkisDev
 * @copyright : https://markis.dev
 */

require '../../php_includes/constant.php';
require DB_CONNECT;
require 'requests.php';

# Enabling error display
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

# Including all the required scripts for demo
require "discord.php";
require_once "functions.php";

# Initializing all the required values for the script to work
init(LOGIN_URL, DISCORD_ID, DISCORD_SECRET);

# Fetching user details | (identify scope)
get_user();

# Fetching user guild details | (guilds scope)
//$_SESSION['guilds'] = get_guilds();

$isAdmin = isUserAdmin();

$addConnectLog->execute([
    $_SESSION['user_id'],
    $_SESSION['username'],
    $_SESSION['discrim'],
    $isAdmin,
]);

// if user not admin -> logout
if(!$isAdmin){
    logout(true);
# Else redirect to home page once all data has been fetched
} else{
    redirect("../../menu.php");
}