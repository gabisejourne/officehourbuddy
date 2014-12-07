<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // find office hours for current user
        $faculty = query("SELECT * FROM faculty WHERE identity = ?", $_SESSION["user"]["identity"]);   

        // render form
        render("delete_form.php", ["faculty" => $faculty, "title" => "Delete"]);

    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
        if (empty($_POST["day"]))
        {
            apologize("You must select a day of the week.");
        }  

        // delete user's hours on selected day from database
        $result = query("DELETE FROM faculty WHERE identity = ? AND day = ?", $_SESSION["user"]["identity"], $_POST["day"]); 
        
        if ($result === false)
        {
            apologize("No office hours to delete.");
        }    
        
        // find office hours for current user
        $faculty = query("SELECT * FROM faculty WHERE identity = ?", $_SESSION["user"]["identity"]);   

        // render form
        $students = query("SELECT * FROM students WHERE identity = ?", $_SESSION["user"]["identity"]);
        render("hours.php", ["faculty" => $faculty, "students" => $students, "title" => "Your Hours"]);
     
    }
      
    
?>
