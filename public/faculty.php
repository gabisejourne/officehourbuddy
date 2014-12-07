<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (empty($_SESSION["user"]["fullname"]))
        {
            // render form
            render("name_form.php", ["title" => "Name?"]); 
        }
        
        else
        {
            // find all registered office hours of current user
            $rows = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);
        
            if ($rows == false)
            {
                // update users              
                $result = query("INSERT INTO faculty (identity, fullname) VALUES(?, ?)", $_SESSION["user"]["identity"], $_SESSION["user"]["fullname"]);
            }     

            // redirect to hours
            redirect("hours.php");
        }

    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
 
        if (empty($_SESSION["user"]["fullname"]))
        {
            // validate input
            if (empty($_POST["fullname"]))
            {
                apologize("You must provide your full name.");
            }
            else
            {
                $_SESSION["user"]["fullname"] = $_POST["fullname"];
            }
        }
        
        // find all updated office hours of current user
        $rows = query("SELECT * FROM faculty WHERE fullname = ?", $_SESSION["user"]["fullname"]);
    
        if ($rows == false)
        {
            // update users              
            $result = query("INSERT INTO faculty (identity, fullname) VALUES(?, ?)", $_SESSION["user"]["identity"], $_SESSION["user"]["fullname"]);
        }     

        // redirect to hours
        redirect("hours.php");

    
    }
?>
        
