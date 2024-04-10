<?php
/* Useful functions.
 * This file contains some useful functions for demo.
 * @author : MarkisDev
 * @copyright : https://markis.dev
 */
 
# A function to redirect user.
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>';
        exit;
    }
}

# A function which returns users IP
function client_ip()
{
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		return $_SERVER['REMOTE_ADDR'];
	}
}

# Check user's avatar type
function is_animated($avatar)
{
	$ext = substr($avatar, 0, 2);
	if ($ext == "a_")
	{
		return ".gif";
	}
	else
	{
		return ".png";
	}
}

# Verify if a discord user is admin
# If the user Id is not sent, the value from the session is used
function isUserAdmin($userId = null){
    if ($userId === null){
        if(isset($_SESSION['user_id'])){
            $userId = $_SESSION['user_id'];
        } else {
            return false;
        }
    }
    return (array_key_exists($userId, DISCORD_ADMINS));
}


# Logout a user / destroy session
function logout($isNotAdmin = false){

    # Starting the session
    session_start();

    # Closing the session and deleting all values associated with the session
    session_destroy();

    # Redirecting the user back to the main menu
    if($isNotAdmin){
        redirect("../../menu.php?logout=noAdmin");
    } else {
        redirect("../../menu.php");
    }
}

# Verify if a user is Admin and logout if not
function logoutUserIfNotAdmin($userId = null){
    if (!isUserAdmin($userId)){
        logout(true);
    }
}

?>
