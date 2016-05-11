<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (empty($_POST["symbol"]))
        {
            apologize("Please provide a valid symbol.");
        }
        else if (empty($_POST["shares"]) || preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
         
            apologize("Please provide a valid share value.");
    
        }
        else
        {
            $stock = lookup($_POST["symbol"]);
            if ($stock)
            {
                $rows = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
                
                $cash = $rows[0]["cash"];
                
                if ($cash < $stock["price"] * $_POST["shares"])
                {
                    
                    apologize("You don't have enough cash to buy!");
                
                    
                }
                else
                {
                    $cash -= $stock["price"] * $_POST["shares"];
                    
                    CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
                    CS50::query("UPDATE users SET cash = ? WHERE id = ?", $cash, $_SESSION["id"]);
                    CS50::query("INSERT INTO history (user_id, date_time, symbol, shares, transaction, price) VALUES(?, ?, ?, ?, ?, ?)", $_SESSION["id"], date("Y-m-d H:i:s"), strtoupper($_POST["symbol"]), $_POST["shares"], true, number_format($stock["price"], 2, '.', ''));
                    // redirect to portfolio
                    redirect("/");
                }
            
            }
            else
            {
                
                apologize("Invalid symbol. Please re-enter a valid symbol.");
                
            }
            
        }

    }

?>