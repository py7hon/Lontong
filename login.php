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
init ("https://lontong.herokuapp.com/login.php", "762237345663549470", "eiwxZpD7ZegiixdGAp-6q1YYC57KP-ZF");
get_user();
$_SESSION['guilds'] = get_guilds();
redirect("index.php");
?>
 
 
