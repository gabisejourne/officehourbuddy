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
        $result = query("INSERT INTO students (identity, fullname, faculty, day, start, end) 
        VALUES(?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE day = VALUES(day), start = VALUES(start), end = VALUES(end)", $_SESSION["user"]["identity"], $_SESSION["user"]["fullname"], $_POST["faculty"], $_POST["day"], $_POST["start"], $_POST["end"]);                     

        if ($result === false)
        {
            apologize("These office hours were not added to your portfolio.");
        }    
    
        // get user's portfolio
        $rows = query("SELECT * FROM students WHERE identity = ?", $_SESSION["user"]["identity"]);
        if ($rows === false)
        {
            apologize("Can't find your portfolio.");
        }

        // look up stocks' names and prices
        $positions = [];
        foreach ($rows as $row)
        {
            $positions[] = [
                "faculty" => $row["faculty"],
                "day" => $row["day"],
                "start" => $row["start"],
                "end" => $row["end"]
            ];
        }

        // render portfolio
        render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);
     
    }
      
    
?>
