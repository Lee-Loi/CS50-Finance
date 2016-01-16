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
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // checks symbol in lookup function
        $stock = lookup($_POST["symbol"]);
        
        // error checking
        if ($stock == false)
        {
            apologize("You entered an invalid Stock Symbol.");
        }
        
        render("quote.php", ["title" => "Quote", "name" => $stock["name"], "symbol" => $stock["symbol"], "price" => $stock["price"]]);
        
    }

?>
