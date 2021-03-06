<!--consultant-->
<?php

    // configuration
    require("../../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        conrender("login_form.php", ["title" => "Consultant Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["con_name"]))
        {
            conApologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            conApologize("You must provide your password.");
        }

        // query database for user
        $query = "SELECT * FROM `consultants` WHERE con_name = '".mysqli_real_escape_string($link, $_POST['con_name'])."'";
        $results = mysqli_query($link, $query);            
        $row = mysqli_fetch_array($results);

        // if we found user, check password
        if (isset($row))
        {

            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["password"], $row["hash"]))
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["con_id"] = $row["id"];
                $_SESSION["con_name"] = $row["con_name"];
                
                if ($_POST['stayLoggedIn'] == '1') 
                {
                    
                    
                    setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);
    
                } 

                // redirect to portfolio
                redirect("/public_html/consultant/");
            }
        }

        // else apologize
        conApologize("Invalid username and/or password.");
    }

?>
