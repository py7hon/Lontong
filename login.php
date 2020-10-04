<?php

function redirect($url){
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
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/discord.php";
init ("http://localhost/login.php", "", "");
get_user();
$_SESSION['guilds'] = get_guilds();
redirect("index.php");
?>
 
 
