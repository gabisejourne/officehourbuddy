<?php

    // configuration
    require("../includes/config.php"); 

    // define positions array
    $positions = [];
   
    // query database for history, order using unformatted timestamp (because it is more accurate than formatted, which only measures to nearest minute)
    $history = query("SELECT * FROM history WHERE id = ? ORDER BY timestamp DESC", $_SESSION["id"]);
    
    // array for history table    
    foreach ($history as $event)
    {   
        if ($event !== false)
        {
            $positions[] = [
                "transaction" => $event["transaction"],
                "datetime" => $event["datetime"],
                "symbol" => $event["symbol"],
                "shares" => $event["shares"],
                "price" => number_format(($event["price"]), 2, '.', ',')
            ];
        }
    }
    
    // render history form
    render("history_form.php", ["title" => "History", "positions" => $positions]);
?>
