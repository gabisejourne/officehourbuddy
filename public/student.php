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
        
        redirect("search.php");

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
            
        // redirect to search
        redirect("search.php");
    
    }  

