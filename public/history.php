<?php

    // configuration
    require("../includes/config.php"); 

    // retrieve the history of the user
    $rows = CS50::query("SELECT id, user_id, transaction, date, symbol, shares, price FROM history WHERE user_id = ?", $_SESSION["id"]);

    $positions = [];
    foreach ($rows as $row)
    {
            $positions[] = [
            "transaction" => $row["transaction"],
            "date" => $row["date"],
            "symbol" => $row["symbol"],
            "shares" => $row["shares"],
            "price" => $row["price"],
        ];
    }        

    // render portfolio
    render("history.php", ["positions" => $positions, "title" => "History", ]);
?>
