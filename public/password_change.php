<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("password_change_form.php", ["title" => "Change Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (empty($_POST["old_password"]) || empty($_POST["new_password"]) || empty($_POST["confirmation"]))
        {
            apologize("Please ensure all fields are entered");
        }
        else
        {
            // query database for user
            $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
             
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["old_password"], $row["hash"]) == false)
            {
                apologize("Invalid old password. Please enter the correct password.");
            }
            else if ($_POST["old_password"] == $_POST["new_password"])
            {
                apologize("Please provide a different password.");
            }
            else if ($_POST["new_password"] !== $_POST["confirmation"])
            {
                apologize("Passwords don't match.");
            }
            else
            {
                CS50::query("UPDATE users SET hash = ? WHERE id = ?", password_hash($_POST["new_password"], PASSWORD_DEFAULT), $_SESSION["id"]);
                
                render("password_change_success.php", ["title" => "Password Changed!"]);
            }
            
        }
    }

?>