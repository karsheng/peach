<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        $rows = CS50::query("SELECT symbol FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
        
        $symbols = [];
        
        foreach ($rows as $row)
        {
            $symbols[] = $row["symbol"];
        }
        
        render("sell_form.php", ["symbols" => $symbols, "title" => "Sell"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       if (empty($_POST["symbol"]))
        {
            apologize("Please provide a valid symbol.");
        }
        else
        {
            $rows = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"],$_POST["symbol"]);
            
            $stock = lookup($_POST["symbol"]);
            if ($stock)
            {
                $cash_gain = $rows[0]["shares"] * $stock["price"];
                
                CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
                CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $cash_gain, $_SESSION["id"]);
                CS50::query("INSERT INTO history (user_id, date_time, symbol, shares, transaction, price) VALUES(?, ?, ?, ?, ?, ?)", $_SESSION["id"], date("Y-m-d H:i:s"), strtoupper($_POST["symbol"]), $rows[0]["shares"], false, number_format($stock["price"], 2, '.', ''));

                // redirect to portfolio
                redirect("/");
            }
            else
            {
                apologize("Invalid symbol. Please re-enter a valid symbol.");
            }

        }

    }

?>