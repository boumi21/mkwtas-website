<?php

$viewsFolder = "views/";

// Get requested URL
$url = $_GET['url'];

// Delete useless / at the end of URL;
$url = rtrim($url, '/');

// Remove unwanted symbols in URL
$url = filter_var($url, FILTER_SANITIZE_URL);

//Build the route for redirect
$routeRedirect = $viewsFolder . $url;

if(file_exists($routeRedirect)){
    REQUIRE __DIR__ . "/" . $routeRedirect;
} else {
    // TODO : redirect to 404 page
    REQUIRE __DIR__ . "/" . $viewsFolder . "menu.php";
}