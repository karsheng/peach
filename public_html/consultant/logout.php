<?php

    // configuration
    require("../../includes/config.php"); 

    // log out current user, if any
    conLogout();

    // redirect user
    redirect("/public_html/consultant/login.php");

?>