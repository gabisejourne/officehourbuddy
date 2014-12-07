<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render hours report
        $faculty = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);
        $students = query("SELECT * FROM students WHERE identity = ?", $_SESSION["user"]["identity"]);
        render("hours.php", ["faculty" => $faculty, "students" => $students, "title" => "Your Hours"]);
    }

