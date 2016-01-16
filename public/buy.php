<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // make sure user only enters a positive integer
        if (preg_match("/^\d+$/", $_POST["shares"]) == false )
        {
            apologize("You can only buy whole shares");
        }
        
        // checks symbol in lookup function
        $stock = lookup($_POST["symbol"]);
        
        // make sure user entered a valid symbol
        if ($stock == false)
        {
            apologize("You entered an invalid Stock Symbol.");
        }

        // find the cost of how much shares are
        $cost = $stock["price"] * $_POST["shares"];
        
        // check if user has enough cash
        $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);

        // check users balance
        if ($cash[0]["cash"] < $cost)
        {
            apologize("You do not have enough to cash to purchase that quantity of shares");
        }
        
        else
        {
            // insert new stock into users database
            $query = CS50::query("INSERT INTO portfolios(user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
            
            // error checking
            if (query == false)
            {
                apologize("There was an error buying shares");
            }
            
            // update users cash amount
            $query = CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);
            
            // error checking
            if (query == false)
            {
                apologize("There was an error buying shares");
            }
            
            // Log it for history
            $query = CS50::query("INSERT INTO history(transaction, user_id, symbol, shares, price) VALUES(?,?,?,?,?)", "BUY",  $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"], $stock["price"]);
            
            
            // send user back to portfolio to show shares bought and new balance
            redirect("/");
        }
    }
        
    else
    {
        render("buy_form.php", ["title" => "Buy"]);  
    }
?>
