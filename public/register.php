<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["email"]))
        {
            apologize("You must provide an email address.");
        }        
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords don't match.");
        }
        
        // query database for user
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $password = password_hash(mysqli_real_escape_string($link, $_POST['password']),PASSWORD_DEFAULT);

        $query = "SELECT id FROM `users` WHERE email = '".$email."' LIMIT 1";
        $query2 = "SELECT id FROM `users` WHERE username = '".$username."' LIMIT 1";

        $result_username = mysqli_query($link, $query);
        $result_email = mysqli_query($link, $query2);        
        
        if (mysqli_num_rows($result_username) > 0)
        {
            apologize("Looks like the username has been taken. Please use a different username.");
        }
        else if (mysqli_num_rows($result_email) > 0)
        {
            apologize("Looks like the email address has been taken. Please use a different email address.");
        }
        else
        {
            $query = "INSERT INTO `users` (`email`, `hash`, `username`) VALUES ('".$email."', '".$password."','".$username."')";

            if (!mysqli_query($link, $query)) 
            {
                
                apologize("Could not sign you up - please try again later");

            } 
            else 
            {

                mysqli_query($link, $query);
    
                $_SESSION['id'] = mysqli_insert_id($link);
    
                if ($_POST['stayLoggedIn'] == '1') 
                {
    
                    setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);
    
                } 
            
            }

            // redirect to portfolio
            redirect("/public");
        }

        

    }

?>