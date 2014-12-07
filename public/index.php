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


                // add saved faculty members to portfolio
                $positions = [];
                foreach ($rows as $row)
                {
                    $faculty = query("SELECT * FROM faculty WHERE fullname = ? AND course = ?", $row["faculty"], $row["course"]);
                    $positions[] = [
                        "faculty" => $faculty[0]["fullname"],
                        "course" => $faculty[0]["course"],
                        "day" => $faculty[0]["day"],
                        "start" => $faculty[0]["start"],
                        "end" => $faculty[0]["end"]
                    ];
                }

                // render portfolio
                render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);
             
            }

            
            else if ($faculty != false && $students == false)
            {
                // look up faculty member
                $faculty = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);
                render("hours.php", ["faculty" => $faculty[0], "title" => "Your Hours"]);
            }
          
        }
        
        else
            render("login_form.php");
    }
?>
