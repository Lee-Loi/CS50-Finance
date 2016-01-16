<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // make sure user only enters a positive integer
        if (preg_match("/^\d+$/", $_POST["cash"]) == false )
        {
            apologize("Please enter a valid amount of cash");
        }
        
        // update users cash
        $query = CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["cash"], $_SESSION["id"] );

        // Log cash lodgement for history
        $query = CS50::query("INSERT INTO history(transaction, user_id, shares, price) VALUES(?,?,?,?)", "Cash Lodgement",  $_SESSION["id"], strtoupper($_POST["symbol"]),  $_POST["cash"]);
            
        // send user back to portfolio to show shares bought and new balance
        redirect("/");
    }
        
    else
    {
        render("settings.php", ["title" => "Settings"]);  
    }
?>
