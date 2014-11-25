<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $stocks = query("SELECT * FROM stocks WHERE id = ?", $_SESSION["id"]); 
        // render form
        render("sell_form.php", ["title" => "Sell", "stocks" => $stocks]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must select a stock to sell.");
        }
        else if (empty($_POST["shares"]))
        {
            apologize("You must select the number of shares you would like to sell.");
        }        
        
        // query database for shares of stock
        $shares = query("SELECT shares FROM stocks WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]); 
        
        // validate submission
        if ($_POST["shares"] > $shares[0]["shares"])
        {
            apologize("You don't own that many shares of {$_POST["symbol"]}!");
        }
        
        // if all shares sold
        else if ($_POST["shares"] == $shares[0]["shares"])
        {
            $result = query("DELETE FROM stocks where id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            if ($result === false)
            {
                apologize("This sale couldn't be executed.");
            }
        }
        
        // some of shares sold
        else
        {  
            $result = query("UPDATE stocks SET shares = shares - ? WHERE id = ? AND symbol = ?", $_POST["shares"], $_SESSION["id"], $_POST["symbol"]);                     
            if ($result === false)
            {
                apologize("This sale couldn't be executed.");
            }
        }
        
        // lookup input symbol
        $quote = lookup($_POST["symbol"]); 
        
        // update user's cash
        $result = query("UPDATE users SET cash = cash + ? WHERE id = ?", ($_POST["shares"] * $quote["price"]), $_SESSION["id"]); 
        if ($result === false)
        {
            apologize("This sale couldn't be executed.");
        }
        
        // capitalize symbol input
        $symbol_upper = strtoupper($_POST["symbol"]);
        
        // get formatted timestamp
        $dateTimeVariable = date("m/j/Y, g:ia");
        
        // update history
        $result = query("INSERT INTO history (id, transaction, datetime, symbol, shares, price) 
        VALUES(?, 'SELL', ?, ?, ?, ?)", $_SESSION["id"], $dateTimeVariable, $symbol_upper, $_POST["shares"], $quote["price"]);  
        if ($result === false)
        {
            apologize("This sale couldn't be executed.");
        }
        
        // redirect to index
        redirect("index.php");       
    }
?>
