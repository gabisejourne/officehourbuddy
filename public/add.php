<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("add_form.php", ["title" => "Add"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
            
            // update database to show purchased stocks
            $result = query("INSERT INTO students (identity, faculty, day, start, end) 
            VALUES(?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE day = VALUES(day), start = VALUES(start), end = VALUES(end)", $_SESSION["user"]["identity"], $_POST["fullname"], $_POST["day"], $_POST["start"], $_POST["end"]);                     

            if ($result === false)
            {
                apologize("These office hours were not added to your portfolio.");
            }    
        
        
        // render portfolio
        render("portfolio.php");     
    }
      
    
?>
