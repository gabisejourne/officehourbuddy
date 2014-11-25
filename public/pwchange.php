<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("pwchange_form.php", ["title" => "Change Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (empty($_POST["old-password"]))
        {
            apologize("You must provide your old password.");
        }
        else if (empty($_POST["new-password"]))
        {
            apologize("You must provide a new password.");
        }
        else if ($_POST["new-password"] != $_POST["confirmation"])
        {
            apologize("Password and confirmation must match.");
        }
        
        // query database for old password
        $oldhash = query("SELECT hash FROM users WHERE id = ?", $_SESSION["id"]);
        $inputhash = crypt($_POST["old-password"], $oldhash[0]["hash"]);
        $newhash = crypt($_POST["new-password"], $oldhash[0]["hash"]);
        
        // compare hash of user's input against hash that's in database
        if ($inputhash == $oldhash[0]["hash"])
        {            
            // update password
            $result = query("UPDATE users SET hash = ? WHERE id = ?", $newhash, $_SESSION["id"]);
            
            if ($result !== false)
            {
                render("success.php", ["message" => "Password changed."]);
            }
            else
            {
                apologize("Password unchanged.");
            }
        }
        
        // apologize if old password entry is incorrect
        else
        {
            apologize("Incorrect password.");
        }
        
    }


?>
