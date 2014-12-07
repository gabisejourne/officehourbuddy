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
            // find all updated hours of current user
            $rows = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);
            
            foreach($rows as $row)
            {
                if(empty($row["day"]))
                {
                    $result = query("UPDATE faculty SET course = ?, day = ?, start = ?, end = ?, location = ? WHERE identity = ?", $_POST["course"], $_POST["day"], $_POST["start"], $_POST["end"], $_POST["location"], $_SESSION["user"]["identity"]);    
                }
            }
                
            // insert staff member's office hours to faculty database, update if time change for given course
            $rows = query("INSERT INTO faculty (identity, fullname, course, day, start, end, location) 
            VALUES(?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE course = VALUES(course), start = VALUES(start), end = VALUES(end), location = VALUES(location)", $_SESSION["user"]["identity"], $_SESSION["user"]["fullname"], $_POST["course"], $_POST["day"], $_POST["start"], $_POST["end"], $_POST["location"]);                     

            if ($rows === false)
            {
                apologize("Your office hours did not post.");
            }
            
            // insert staff member's office hours to student database, update if time change for given course
            $rows = query("UPDATE students SET course = ?, start = ?, end = ?, location = ? WHERE identity = ? AND faculty = ? AND day = ?", $_POST["course"], $_POST["start"], $_POST["end"], $_POST["location"], $_SESSION["user"]["identity"], $_SESSION["user"]["fullname"], $_POST["day"]);  
            
            if ($rows === false)
            {
                apologize("Your office hours did not post.");
            }
        } 
        
        // render hours report
        $faculty = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);
        $students = query("SELECT * FROM students WHERE identity = ?", $_SESSION["user"]["identity"]);
        render("hours.php", ["faculty" => $faculty, "students" => $students, "title" => "Your Hours"]);
    }
      
    
?>
