<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }

        // query database for user
        $query = "SELECT * FROM `users` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
        $results = mysqli_query($link, $query);            
        $row = mysqli_fetch_array($results);

        // if we found user, check password
        if (isset($row))
        {

            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["password"], $row["hash"]))
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                
                if ($_POST['stayLoggedIn'] == '1') 
                {
                    
                    
                    setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);
    
                } 

                // redirect to portfolio
                redirect("/public_html/");
            }
        }

        // else apologize
        apologize("Invalid username and/or password.");
    }

?>
