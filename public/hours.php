<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("hours_form.php", ["title" => "Hours"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {           
        // validate submission
        if (empty($_POST["day"]))
        {
            apologize("You must select a day of the week.");
        }
        else if (empty($_POST["start"]))
        {
            apologize("You must select the start time.");
        }       
        else if (empty($_POST["end"]))
        {
            apologize("You must select the end time.");
        }       

        else
        { 
            
            // update database to show purchased stocks
            $result = query("INSERT INTO faculty (fullname, day, start, end) 
            VALUES(?, ?, ?, ?) ON DUPLICATE KEY UPDATE day = VALUES(day), start = VALUES(start), end = VALUES(end)", $_SESSION["user"]["fullname"], $_POST["day"], $_POST["start"], $_POST["end"]);                     

            if ($result === false)
            {
                apologize("Your office hours did not post.");
            }
        } 
        
        // redirect to index
        redirect("index.php");     
    }
      
    
?>
