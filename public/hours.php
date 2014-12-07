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
            // insert staff member's office hours, update if time change for given course
            $result = query("INSERT INTO faculty (identity, fullname, course, day, start, end, location) 
            VALUES(?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE day = VALUES(day), start = VALUES(start), end = VALUES(end), location = VALUES(location)", $_SESSION["user"]["identity"], $_SESSION["user"]["fullname"], $_POST["course"], $_POST["day"], $_POST["start"], $_POST["end"], $_POST["location"]);                     

            if ($result === false)
            {
                apologize("Your office hours did not post.");
            }
        } 
        
        // render hours report
        $faculty = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);
        render("hours.php", ["faculty" => $faculty[0], "title" => "Your Hours"]);
    }
      
    
?>
