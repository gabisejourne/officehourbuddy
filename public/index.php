<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (isset($_SESSION["user"]))
        {  
            // query databases for user
            $students = query("SELECT * FROM students WHERE identity = ?", $_SESSION["user"]["identity"]);
            $faculty = query("SELECT * FROM faculty WHERE identity = ?", $_SESSION["user"]["identity"]);

            // if user is not stored
            if ($students == false && $faculty == false)
            {
                // render form
                render("student_faculty.html");
            }
            
            // if user is student
            else if ($students != false)
            {
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

            
            else if ($faculty != false && $students == false)
            {
                // look up faculty member
                $faculty = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);

                $students = query("SELECT * FROM students WHERE identity = ?", $_SESSION["user"]["identity"]);
                render("hours.php", ["faculty" => $faculty, "students" => $students, "title" => "Your Hours"]);
            }
          
        }
        
        else
            render("login_form.php");
    }
?>
