<?php

    // configuration
    require("../includes/config.php"); 

    // retrieve what shares logged in user has 
    $rows = CS50::query("SELECT id, user_id, symbol, shares FROM portfolios WHERE user_id = ?", $_SESSION["id"]);

    // retrieve how much cash user logged in has left 
    $cashrow = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            "totalprice" => $stock["price"] * $row["shares"],
        ];
        }
        
    }        

    // render portfolio
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio", "cash" => $cashrow[0]["cash"], ]);
?>
