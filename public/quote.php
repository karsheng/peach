<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Get Quote"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (empty($_POST["symbol"]))
        {
            apologize("Please provide a valid symbol.");
        }
        else
        {
            $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);

            $stock = lookup($_POST["symbol"]);
            if ($stock)
            {
                render("quote_result.php", ["title" => "Quote", "name" => $stock["name"], "symbol" => strtoupper($_POST["symbol"]), "price" => number_format($stock["price"], 2, '.', '')]);

            }
            else
            {
                apologize("Invalid symbol. Please re-enter a valid symbol.");
            }
            // else render result
            //render("quote_result.php", ["title" => "Quote"]);
        }

    }

?>