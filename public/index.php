<?php

    // configuration
    require("../includes/config.php"); 

    // define positions array
    $positions = [];

    
    // query database for user's stocks
    $stocks = query("SELECT * FROM stocks WHERE id = ?", $_SESSION["id"]);
    
    // make array for portfolio table       
    foreach ($stocks as $stock)
    {
        $quote = lookup($stock["symbol"]);
        
        if ($stock !== false)
        {
            $positions[] = [
                "symbol" => $stock["symbol"],
                "name" => $quote["name"],
                "shares" => $stock["shares"],
                "price" => number_format($quote["price"], 2, '.', ','),
                "total" => number_format(($stock["shares"] * $quote["price"]), 2, '.', ',')
            ];
        }
    }
    
    // query database for user's cash
    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    // user's current cash balance
    $cash[0]["cash"] = number_format($cash[0]["cash"], 2, '.',  ',');

    // render portfolio
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "cash" => $cash[0]["cash"]]);

?>
