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
        
        if ($faculty === false)
        {
            apologize("TF not found");
        }
        
        else
        {
            // render search
            render("add_form.php", ["faculty" => $faculty[0], "title" => "Office Hours"]);
        }
    }



