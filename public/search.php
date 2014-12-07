<?php

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("search_form.php", ["title" => "Get TF"]);
    }
    
    // if form was submitted
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // validate submission
        if (empty($_POST["fullname"]))
        {
            apologize("You must provide a name.");
        }

        // look up faculty member
        $faculty = query("SELECT * FROM faculty WHERE fullname = ?", $_POST["fullname"]);

        if ($faculty == false)
        {
            apologize("TF not found.");
        }
        

        foreach ($faculty as $teacher)
        {
            // update database to show TF office hours
            $result = query("INSERT INTO students (identity, fullname, faculty, course, day, start, end) 
            VALUES(?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE course = VALUES(course), start = VALUES(start), end = VALUES(end)", $_SESSION["user"]["identity"], $_SESSION["user"]["fullname"], $teacher["fullname"], $teacher["course"], $teacher["day"], $teacher["start"], $teacher["end"]);                     
        
            if ($result === false)
            {
                apologize("These office hours were not added to your portfolio.");
            }          
        } 
    
        // get user's portfolio
        $rows = query("SELECT * FROM students WHERE identity = ?", $_SESSION["user"]["identity"]);

        if ($rows === false)
        {
            apologize("Can't find your portfolio.");
        }

        // assemble faculty office hours for insertion to portfolio
        $positions = [];
        foreach ($rows as $row)
        {
            $positions[] = [
                "faculty" => $row["faculty"],
                "course" => $row["course"],
                "day" => $row["day"],
                "start" => $row["start"],
                "end" => $row["end"]
            ];
        }

        // render portfolio
        $students = query("SELECT * FROM students WHERE identity = ?", $_SESSION["user"]["identity"]);
        $faculty = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);
        render("portfolio.php", ["positions" => $positions, "faculty" => $faculty, "students" => $students, "title" => "Portfolio"]);
     
    }

