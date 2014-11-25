<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("buy_form.php", ["title" => "Buy"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        // check if valid symbol and if so find stock's latest price
        $quote = lookup($_POST["symbol"]);
 
        if($quote === false)
        {
            apologize("Invalid symbol.");
        }  
        
        // total cost of desired purchase
        $total = $_POST["shares"] * $quote["price"];
        
        // user's cash balance
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]); 
        
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must select a stock to sell.");
        }
        else if (empty($_POST["shares"]))
        {
            apologize("You must select the number of shares you would like to sell.");
        }       
        else if (preg_match("/^\d+$/", $_POST["shares"]) === false)
        {
            apologize("Invalid number of shares.");
        }
        else if ($total > $cash[0]["cash"])
        {
            apologize("You can't afford that.");
        }
        else
        { 
            // capitalize input symbol
            $symbol_upper = strtoupper($_POST["symbol"]);
            
            // update database to show purchased stocks
            $result = query("INSERT INTO stocks (id, symbol, shares) 
            VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $symbol_upper, $_POST["shares"]);                     

            if ($result === false)
            {
                apologize("This purchase couldn't be executed.");
            }
            
            // update user's cash
            $result = query("UPDATE users SET cash = cash - ? WHERE id = ?", $total, $_SESSION["id"]); 
            if ($result === false)
            {
                apologize("This purchase couldn't be executed.");
            }
            
            // get formatted timestamp
            $dateTimeVariable = date("m/j/Y, g:ia");
            
            // update history
            $result = query("INSERT INTO history (id, transaction, datetime, symbol, shares, price) 
            VALUES(?, 'BUY', ?, ?, ?, ?)", $_SESSION["id"], $dateTimeVariable, $symbol_upper, $_POST["shares"], $quote["price"]);                     
            
            if ($result === false)
            {
                apologize("This purchase couldn't be executed.");
            }
        }
        
        
        // redirect to index
        redirect("index.php");     
    }
      
    
?>
