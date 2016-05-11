<?php

    // configuration
    require("../includes/config.php"); 

    $rows = CS50::query("SELECT * FROM history WHERE user_id = ? ORDER BY date_time DESC", $_SESSION["id"]);

    $positions = [];

    if (count($rows) > 0)
    {
        foreach ($rows as $row)
        {
            if ($row["transaction"])
            {
                $buy_sell = "BUY";
            }
            else
            {
                $buy_sell = "SELL";
            }
            
            $date = date_create($row["date_time"]);
                
            $positions[] = [
                "transaction" => $buy_sell,
                "date_time" => date_format($date, "m/d/y g:ha"),
                "symbol" => $row["symbol"],
                "shares" => $row["shares"],
                "price" => number_format($row["price"], 2, '.', '')
            ];
        }
    }
    
        // render portfolio
    render("history_table.php", ["positions" => $positions, "title" => "History"]);    

?>
