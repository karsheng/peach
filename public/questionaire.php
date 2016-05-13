<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("questionaire_form.php", ["title" => "Questionaire"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if (empty($_POST["needs"]) || empty($_POST["will_to_pay"]))
        {
            apologize("Please ensure all fields are filled up");
        }

        // query database for user
        $needs = mysqli_real_escape_string($link, $_POST['needs']);
        $will_to_pay = mysqli_real_escape_string($link, $_POST['will_to_pay']);
        if (!is_numeric($will_to_pay) || $will_to_pay <= 0 )
        {
            apologize("Please provide a positive number");
        }
        $query = "INSERT INTO `user_preferences` (`user_id`, `needs`, `will_to_pay`) VALUES('".$_SESSION["id"]."', '".$needs."','".$will_to_pay."') ON DUPLICATE KEY UPDATE `needs` = '".$needs."', `will_to_pay` = '".$will_to_pay."'";
        
        if (!mysqli_query($link, $query)) 
        {

            die('Invalid query: ' . mysqli_error($link));


        } 
        else 
        {
        
            mysqli_query($link, $query);
            
                    
        }
        
        // redirect to portfolio
        redirect("/public");        
    }
?>