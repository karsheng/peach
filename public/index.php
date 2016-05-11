<?php

    // configuration
    require("../includes/config.php"); 

    $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);

    $rows2 = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    $cash = $rows2[0]["cash"];
    
    $positions = [];

    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => number_format($stock["price"], 2, '.', ''),
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "total" => number_format($stock["price"] * $row["shares"], 2, '.', '')
            ];
            
        }
        
    }
    
        // render portfolio
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio", "cash" => number_format($cash, 2, '.', '')]);    

?>
