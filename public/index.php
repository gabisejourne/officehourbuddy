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
            
            // if user is student AND faculty member
            else if (count($students) == 1 && count($faculty) == 1)
            {
                render("portfolio.php");
            }
            
            // if user is student
            else if (count($students) == 1 && $faculty == false)
            {
                render("portfolio.php");
            }
            
            else if (count($faculty) == 1 && $students == false)
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
