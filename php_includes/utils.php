<?php



// USEFULL VARIABLES //

/**
 * "Enum" class for the different types of tables on the site
 */
abstract class TableType
{
    const Classic = "classic";
    const All = "all";
    const PlayerAll ="player-all";
    const PlayerBKT = "player-bkt";
    const Track = "track";
}

/**
 * Array that maps every technical category's name to it's more user friendly alternative
 */
$arrayCategorieToText = array(
	"classic" => "Unrestricted 3laps",
	"no_cut" => "No Ultra 3laps",
	"no_glitch" => "No Glitch/SC 3laps",
	"flap" => "Unrestricted Flaps",
	"flap_no_cut" => "No Ultra Flaps",
	"flap_no_glitch" => "No Glitch/SC Flaps",
);

/**
 * Array that maps every user friendly category to it's technical name
 */
$arrayTextToCategory = array(
	"classic" => "classic",
	"classicNoGlitch" => "no_glitch",
	"classicNoUltra" => "no_cut",
	"flap" => "flap",
	"flapNoGlitch" => "flap_no_glitch",
	"flapNoUltra" => "flap_no_cut",
);

function includeHeader($variables) {
    extract($variables);
    include(PHP_INCLUDES . "head.php");
}

/**
 * Array that contains every Nintendo track in the game.
 * You can use that instead of making a request to the database.
 */
function getTracks()
{
    $arrayTracks = array(
        1 => "Luigi Circuit",
        2 => "Moo Moo Meadows",
        3 => "Mushroom Gorge",
        4 => "Toad's Factory",
        5 => "Mario Circuit",
        6 => "Coconut Mall",
        7 => "DK Summit",
        8 => "Wario's Gold Mine",
        9 => "Daisy Circuit",
        10 => "Koopa Cape",
        11 => "Maple Treeway",
        12 => "Grumble Volcano",
        13 => "Dry Dry Ruins",
        14 => "Moonview Highway",
        15 => "Bowser's Castle",
        16 => "Rainbow Road",
        17 => "GCN Peach Beach",
        18 => "DS Yoshi Falls",
        19 => "SNES Ghost Valley 2",
        20 => "N64 Mario Raceway",
        21 => "N64 Sherbet Land",
        22 => "GBA Shy Guy Beach",
        23 => "DS Delfino Square",
        24 => "GCN Waluigi Stadium",
        25 => "DS Desert Hills",
        26 => "GBA Bowser Castle 3",
        27 => "N64 DK's Jungle Parkway",
        28 => "GCN Mario Circuit",
        29 => "SNES Mario Circuit 3",
        30 => "DS Peach Gardens",
        31 => "GCN DK Mountain",
        32 => "N64 Bowser's Castle"
    );

    return $arrayTracks;
}

/**
 * Array that contains every character in the game.
 * You can use that instead of making a request to the database.
 */
function getCharacters()
{
    $arrayCharacters = array(
        'Baby Mario',
        'Baby Peach',
        'Toad',
        'Koopa Troopa',
        'Mario',
        'Luigi',
        'Peach',
        'Yoshi',
        'Wario',
        'Waluigi',
        'Donkey Kong',
        'Bowser',
        'Baby Luigi',
        'Baby Daisy',
        'Toadette',
        'Dry Bones',
        'Daisy',
        'Birdo',
        'Diddy Kong',
        'Bowser Jr.',
        'King Boo',
        'Rosalina',
        'Funky Kong',
        'Dry Bowser',
        'Mii'
    );

    return $arrayCharacters;
}

/**
 * Array that contains every vehicle in the game.
 * You can use that instead of making a request to the database.
 */
function getVehicles()
{
    $arrayVehicles = array(
        'Standard Kart S',
        'Booster Seat',
        'Mini Beast',
        'Cheep Charger',
        'Tiny Titan',
        'Blue Falcon',
        'Standard Bike S',
        'Bullet Bike',
        'Bit Bike',
        'Quacker',
        'Magikruiser',
        'Jet Bubble',
        'Standard Kart M',
        'Classic Dragster',
        'Wild Wing',
        'Super Blooper',
        'Daytripper',
        'Sprinter',
        'Standard Bike M',
        'Mach Bike',
        'Sugarscoot',
        'Zip Zip',
        'Sneakster',
        'Dolphin Dasher',
        'Standard Kart L',
        'Offroader',
        'Flame Flyer',
        'Piranha Prowler',
        'Jetsetter',
        'Honeycoupe',
        'Standard Bike L',
        'Flame Runner',
        'Wario Bike',
        'Shooting Star',
        'Spear',
        'Phantom'
    );

    return $arrayVehicles;
}


/**
 * Array that contains every tag for the site.
 * You can use that instead of making a request to the database.
 */
function getTags() {
    $arrayTags = array(
        1 => "Verified",
        2 => "Unverified",
        3 => "Invalid"
    );

    return $arrayTags;
}

/**
 * Return html in case there is no TAS to show
 */
function displayNothing()
{
	echo "<img id='nothingFunky' class='d-block m-auto img-fluid' src='assets/img/nothing.png'>";
}

/**
 * Display supergrind icon when needed
 */
function displaySuperGrind()
{
	echo "<img class='icon-zoom mb-1 ml-1' src='assets/img/supergrind.png' width='20px' data-toggle=\"popover\" tabindex='0' data-trigger='focus' data-content='This run utilises a type of rapid-fire hop exploit called supergrinding, which allows you to lose traction with the ground and build up speed.' title=\"Supergrind\">";
}

/**
 * Returns the filename of the ghostfile matching the id of a record
 */
function getGhostFile($idRecord){
    $availableGhostExtensions = array('.rkg', '.csv');
    foreach ($availableGhostExtensions as $value) {
        $filename = SITE_ROOT . 'uploads/' . $idRecord . $value;
        if (file_exists($filename)) {
            return $filename;
        }
    }
    return null;
}

/**
 * Returns the json file with country codes to their names as an array
 */
function getCodeToCountryArray(){
    $string = file_get_contents("assets/country-flags/countries.json");
    return json_decode($string);
}


/**
 * Retrieve the country name matching the country code
 */
function getCountryNameFromCode($countryArray, $countryCode){
    foreach ($countryArray as $key => $value) {
        if (strtoupper($key) == strtoupper($countryCode)) {
            return $value;
        }
    }
}

?>