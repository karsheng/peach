<?php

    /**
     * config.php
     * Configures app.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("helpers.php");
    
    //enable sessions
    session_start();
    
    $link = mysqli_connect("localhost", "karsheng88", "", "peach");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
                
        }
    

    // require authentication for all pages except /login.php, /logout.php, and /register.php
    if (!in_array($_SERVER["PHP_SELF"], ["/public_html/login.php", "/public_html/logout.php", "/public_html/register.php", "/public_html/consultant/login.php"]))
    {
        if (empty($_SESSION["id"]) && empty($_SESSION["con_id"]))
        {
            redirect("/public_html/login.php");
        }
    }


?>
