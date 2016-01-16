<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        // find out how many shares of stock user owns, retrieves symbol from POST
        $rows = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? and symbol = ?", $_SESSION["id"], $_POST['symbol']);
        
        // incase user doesn't actually own shares    
        if (count($rows) != 1)
        {
            apologize("Sorry, shares not found!");
        }
        
        else
        {
            // find out how much stock is worth
            $stock = lookup($_POST['symbol']);
            
            // error checking
            if ($stock == false)
            {
            apologize("Stock symbol chosen couldn't be found.");
            }
            $value = $stock["price"] * $rows[0]["shares"];
            
            // remove shares from users table
            $query = CS50::query("DELETE FROM portfolios WHERE user_id = ? and symbol = ?", $_SESSION["id"], $_POST['symbol']);
            
            // error checking
            if ($query == false)
            {
                apologize("There was an issue selling shares.");
            }
            
            // update users cash
            $query = CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $value, $_SESSION["id"]);
            
            // error checking
            if ($query == false)
            {
                apologize("There was an issue adding cash to your account.");
            }
            
            // Log it for history
            $query = CS50::query("INSERT INTO history(transaction, user_id, symbol, shares, price) VALUES(?,?,?,?,?)", "SELL",  $_SESSION["id"], strtoupper($_POST["symbol"]), $rows[0]["shares"], $stock["price"]);
            
            // send user back to portfolio to show 'symbol' has been sold
            redirect("/");
        }
    }
        
    else
    {
        $shares = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);

        render("sell_form.php", ["title" => "Sell", "symbols" => $shares]);  
    }
?>
